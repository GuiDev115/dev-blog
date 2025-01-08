<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Artesaos\SEOTools\Facades\SEOTools;
use Artesaos\SEOTools\Facades\SEOMeta;

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
    }
}
