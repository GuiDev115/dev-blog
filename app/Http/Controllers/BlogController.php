<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Artesaos\SEOTools\Facades\SEOTools;
use Artesaos\SEOTools\Facades\SEOMeta;
use App\Models\Post;
use App\Models\Category;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        $title = isset(settings()->site_title) ? settings()->site_title : '';
        $description = isset(settings()->site_meta_description) ? settings()->site_meta_description : '';
        $imgURL = isset(settings()->site_logo) ? asset('/images/site/'.settings()->site_logo) : '';
        $keywords = isset(settings()->site_meta_keywords) ? settings()->site_meta_keywords : '';
        $currentURL = url()->current();

        //Meta SEO
        SEOTools::setTitle($title, false);
        SEOTools::setDescription($description);
        SEOMeta::setKeywords($keywords);

        //OpenGraph
        SEOTools::opengraph()->setUrl($currentURL);
        SEOTools::opengraph()->addImage($imgURL);
        SEOTools::opengraph()->addProperty('type', 'articles');

        //Twitter
        SEOTools::twitter()->addImage($imgURL);
        SEOTools::twitter()->setUrl($currentURL);
        SEOTools::twitter()->setSite('@guidev115');
        $data = [
            'pageTitle'=>$title
        ];
        return view('front.pages.index', $data);
    } //fim do metodo

    public function categoryPosts(Request $request, $slug = null){
        $category = Category::where('slug', $slug)->firstOrFail();
        $posts = Post::where('category', $category->id)->paginate(8);

        $title = 'Post em Categoria: '.$category->name;
        $description = 'Navegue pelas últimas postagens na seção'.$category->name.' categoria. mantenha-se atualizado com artigos, insights e tutoriais.';

        SEOTools::setTitle($title, false);
        SEOTools::setDescription($description);
        SEOTools::opengraph()->setUrl(url()->current());

        $data = [
            'pageTitle'=>$category->name,
            'posts'=>$posts
        ];
        return view('front.pages.category_posts', $data);
    }
}
