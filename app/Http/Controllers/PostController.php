<?php

namespace App\Http\Controllers;

use http\Env\Response;
use Illuminate\Http\Request;
use App\Models\ParentCategory;
use App\Models\Category;
use App\Models\Post;

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

    public function createPost(Request $request){
        $request->validate([
            'title'=>'required|unique:posts,title',
            'content'=>'required',
            'category'=>'required|exists::categories,id',
            'featured_image'=>'required|mimes:png,jpg,jpeg|max:2048'
        ]);

        if($request->hasFile('featured_image')){
            $path = "images/posts/";
            $file = $request->file('featured_image');
            $file_name = time().'_'.$file->getClientOriginalName();
            $new_filename = time().'_'.$file_name;

            $upload = $file->move($path, $new_filename);

            if($upload){
                $post = new Post();
                $post->author_id = auth()->user()->id;
                $post->category = $request->category;
                $post->title = $request->title;
                $post->content = $request->content;
                $post->featured_image = $new_filename;
                $post->tags = $request->tags;
                $post->meta_keywords = $request->meta_keywords;
                $post->meta_description = $request->meta_description;
                $post->visibility = $request->visibility;
                $saved = $post->save();

                if($saved){
                    return response()->json(['status'=>0, 'message'=>'Algo de errado aconteceu ao salvar o post']);
                }
            } else {
                return response()->json(['status'=>'error', 'message'=>'Erro ao fazer upload da imagem']);
            }
        }
    }
}
