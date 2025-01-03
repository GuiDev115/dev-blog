<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Post;
use Livewire\WithPagination;
use App\Models\ParentCategory;
use App\Models\Category;

class Posts extends Component
{
    use WithPagination;

    public $perPage = 5;
    public $categories_html;

    public function mount(){
        $categories_html = '';

        $pcategories = ParentCategory::whereHas('children', function ($q) {
            $q->whereHas('posts');
        })->orderBy('name', 'asc')->get();

        $categories = Category::whereHas('posts')->where('parent', 0)->orderBy('name', 'asc')->get();

        if (count($pcategories) > 0) {
            foreach ($pcategories as $item) {
                $categories_html .= '<optgroup label="' . $item->name . '">';
                foreach ($item->children as $category) {
                    if ($category->posts->count() > 0) {
                        $categories_html .= '<option value="' . $category->id . '">' . $category->name . '</option>';
                    }
                }
                $categories_html .= '</optgroup>';
            }
        }

        if (count($categories) > 0) {
            foreach ($categories as $item) {
                $categories_html .= '<option value="' . $item->id . '">' . $item->name . '</option>';
            }
        }
        $this->categories_html = $categories_html;
    }
    public function render()
    {
        return view('livewire.admin.posts',[
            'posts' => auth()->user()->type == "superAdmin" ?
                Post::paginate($this->perPage) :
                Post::where('author_id', auth()->id())->paginate($this->perPage)
        ]);
    }
}
