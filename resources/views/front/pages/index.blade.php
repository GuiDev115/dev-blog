@extends('front.layout.pages-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Document Title')
@section('meta_tags')
{!! SEO::generate() !!}
@endsection
@section('content')

            <div class="row">
                <div class="col-lg-8  mb-5 mb-lg-0">

                    <article class="row mb-5">
                        <div class="col-12">
                            <div class="post-slider">
                                <div class="slider-item">
                                    <img loading="lazy" src="/front/images/posts/11.png" class="img-fluid" alt="post-thumb">
                                    <div class="slider-content">
                                        <h2 class="animate__animated">JavaScript ES6: Arrow Functions Explained</h2>
                                    </div>
                                </div>
                                <div class="slider-item">
                                    <img loading="lazy" src="/front/images/posts/02.png" class="img-fluid" alt="post-thumb">
                                    <div class="slider-content">
                                        <h2 class="animate__animated">CSS Flexbox: Aligning Elements Like a Pro
                                        </h2>
                                    </div>
                                </div>
                                <div class="slider-item">
                                    <img loading="lazy" src="/front/images/posts/03.png" class="img-fluid" alt="post-thumb">
                                    <div class="slider-content">
                                        <h2 class="animate__animated">Optimizing Applications for Speed</h2>
                                    </div>
                                </div>
                            </div>
                        </div>

                        @if( !empty(latest_posts(0, 1)) )
                            @foreach(latest_posts(0, 1) as $post)
                                <div class="col-12 mx-auto">
                                    <h3>
                                        <a class="post-title" href="{{ route('read_post', $post->slug) }}">
                                            {{ $post->title }}
                                        </a>
                                    </h3>
                                    <ul class="list-inline post-meta mb-4">
                                        <li class="list-inline-item"><i class="ti-user mr-1"></i>
                                            <a href="{{ route('author_posts', $post->author->username) }}">{{ $post->author->name }}</a>
                                        </li>
                                        <li class="list-inline-item"><i class="ti-calendar mr-1"></i> {{ date_formatter($post->created_at) }}</li>
                                        <li class="list-inline-item">Categoria : <a href="{{ route('category_posts', $post->post_category->slug) }}" class="ml-1">{{ $post->post_category->name }} </a>
                                        </li>
                                        <li class="list-inline-item"><i class="ti-timer mr-1"></i> {{ readDuration($post->title, $post->contents) }} @choice('min|mins', readDuration($post->title,$post->contents))
                                        </li>
                                    </ul>
                                    <p>
                                        {!! Str::ucfirst(words($post->contents, 45)) !!}
                                    </p>
                                    <a href="{{ route('read_post',$post->slug)}}" class="btn btn-outline-primary">Leia mais...</a>
                                </div>
                            @endforeach
                        @endif

                    </article>

                    @if( !empty(latest_posts(1, 3)) )
                        @foreach(latest_posts(1, 3) as $post)

                    <section id="home__latest-posts">


                        <article class="row mb-5">
                            <div class="col-md-4 mb-4 mb-md-0">
                                <div class="post-img-box">
                                    <img src="/images/posts/resized/resized_{{ $post->featured_image }}" class="img-fluid rounded-lg" alt="post-thumb">
                                </div>
                            </div>
                            <div class="col-md-8">
                                <h4>
                                    <a class="post-title" href="{{ route('read_post', $post->slug) }}">
                                        {{ $post->title }}
                                    </a>
                                </h4>
                                <ul class="list-inline post-meta mb-2">
                                    <li class="list-inline-item"><i class="ti-user mr-2"></i><a href="{{ route('author_posts', $post->author->username) }}">{{ $post->author->name }}</a>
                                    </li>
                                    <li class="list-inline-item"><i class="ti-calendar mr-1"></i> {{ date_formatter($post->created_at) }}</li>
                                    <li class="list-inline-item">Categoria : <a href="{{ route('category_posts', $post->post_category->slug) }}" class="ml-1">{{ $post->post_category->name }} </a>
                                    </li>
                                    <li class="list-inline-item"><i class="ti-timer mr-1"></i> {{ readDuration($post->title, $post->contents) }} @choice('min|mins', readDuration($post->title,$post->contents))
                                    </li>
                                </ul>
                                <p>
                                    {!! Str::ucfirst(words($post->contents, 30)) !!}                                </p>
                                <a href="{{ route('read_post', $post->slug) }}" class="btn btn-outline-primary">Leia mais...</a>
                            </div>
                        </article>

                        @endforeach
                        @endif

                    </section>


                </div>
                <aside class="col-lg-4">
                    <!-- Search -->
                    <div class="widget">
                        <h5 class="widget-title"><span>Search</span></h5>
                        <form action="" class="widget-search">
                            <input id="search-query" name="s" type="search" placeholder="Type to discover articles, guide &amp; tutorials...">
                            <button type="submit"><i class="ti-search"></i>
                            </button>
                        </form>
                    </div>
                    <!-- categories -->
                    <x-sidebar-categories></x-sidebar-categories>
                    <!-- tags -->
                    <x-sidebar-tags></x-sidebar-tags>
                    <!-- latest post -->
                    <div class="widget">
                        <h5 class="widget-title"><span>Latest Article</span></h5>
                        <!-- post-item -->
                        <ul class="list-unstyled widget-list">
                            <li class="media widget-post align-items-center">
                                <a href="post-details.html">
                                    <img loading="lazy" class="mr-3" src="/front/images/posts/05.png">
                                </a>
                                <div class="media-body">
                                    <h6 class="mb-0">
                                        <a href="post-details.html">Optimizing CodeIgniter Applications for Speed.</a>
                                    </h6>
                                    <small>June 10, 2024</small>
                                </div>
                            </li>
                        </ul>
                        <ul class="list-unstyled widget-list">
                            <li class="media widget-post align-items-center">
                                <a href="post-details.html">
                                    <img loading="lazy" class="mr-3" src="/front/images/posts/06.png">
                                </a>
                                <div class="media-body">
                                    <h6 class="mb-0"><a href="post-details.html">CSS Animations: Adding Life to Your Web Page</a>
                                    </h6>
                                    <small>June 27, 2024</small>
                                </div>
                            </li>
                        </ul>
                        <ul class="list-unstyled widget-list">
                            <li class="media widget-post align-items-center">
                                <a href="post-details-2.html">
                                    <img loading="lazy" class="mr-3" src="/front/images/posts/07.png">
                                </a>
                                <div class="media-body">
                                    <h6 class="mb-0"><a href="post-details-2.html">PHP Error Handling: Best Practices for Beginners</a>
                                    </h6>
                                    <small>June 03, 2024</small>
                                </div>
                            </li>
                        </ul>
                        <ul class="list-unstyled widget-list">
                            <li class="media widget-post align-items-center">
                                <a href="post-details-2.html">
                                    <img loading="lazy" class="mr-3" src="/front/images/posts/08.png">
                                </a>
                                <div class="media-body">
                                    <h6 class="mb-0"><a href="post-details-2.html">Secure User Authentication with PHP</a>
                                    </h6>
                                    <small>June 03, 2024</small>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="d-flex align-items-center justify-content-center" style="background-color: #655087; height: 200px;">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 300 600" class="w-100 h-100 rounded-lg">
                            <rect width="100%" height="100%" fill="#655087" />
                            <text x="50%" y="50%" fill="white" font-size="36" font-family="Arial, sans-serif" text-anchor="middle" dy=".3em">
                                Ad Space
                            </text>
                        </svg>
                    </div>
                </aside>
            </div>

@endsection
