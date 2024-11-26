<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ParentCategory;
use App\Models\Category;

class PostController extends Controller
{
    public function addPost(Request $request)
    {
        $categories_html = '';
        $pcategories = ParentCategory::whereHas('children')->orderBy('name', 'asc')->get();
        $categories = Category::where('parent', 0)->orderBy('name', 'asc')->get();

        if(count ($pcategories) > 0) {
            foreach ($pcategories as $item) {
                $categories_html.='<optgroup label="'.$item->name.'">';
                foreach ($item->children as $category) {
                    $categories_html.='<option value="'.$category->id.'">'.$category->name.'</option>';
                }
                $categories_html .= '</optgroup>';
            }
        }

        if (count($categories) > 0) {
            foreach ($categories as $item) {
                $categories_html .= '<option value="' . $item->id . '">' . $item->name . '</option>';
            }
        }

        $data = [
            'pageTitle'=>'Adicionar Post',
            'categories_html'=>$categories_html
        ];

        return view('back.pages.add_post', $data);
    }
}
