<?php
use App\Models\GeneralSetting;
use App\Models\ParentCategory;
use App\Models\Category;

if(!function_exists('settings')){
    function settings(){
        $settings = GeneralSetting::take(1)->first();
        if(!is_null($settings)){
            return $settings;
        }
    }
}

if(!function_exists('navigations')){
    function navigations(){
        $navigations_html = '';

        $pcategories = ParentCategory::whereHas('children', function($q){
            $q->whereHas('posts');
        })->orderBy('name', 'asc')->get();

        $categories = Category::whereHas('posts')->where('parent', 0)->orderBy('name', 'asc')->get();

        if( count($pcategories) > 0){
            foreach( $pcategories as $item){
                $navigations_html .= '
                     <li class="nav-item dropdown">
                    <a class="nav-link" href="#!" role="button" data-toggle="dropdown" aria-haspopup="true"
                       aria-expanded="false">'.$item->name.' <i class="ti-angle-down ml-1"></i>
                    </a>
                    <div class="dropdown-menu">
                ';

                foreach( $item->children as $category){
                    if($category->posts->count() > 0){
                        $navigations_html .= '<a class="dropdown-item" href="#!"> '.$category->name.'</a>';
                    }
                }

                $navigations_html .= '
                        </div>
                    </li>
                ';
            }
        }

        if( count($categories) > 0){
            foreach ($categories as $item){
                $navigations_html .= '
                    <li class="nav-item">
                        <a class="nav-link" href="#!">'.$item->name.'</a>
                    </li>
                ';
            }
        }

        return $navigations_html;
    }
}

?>
