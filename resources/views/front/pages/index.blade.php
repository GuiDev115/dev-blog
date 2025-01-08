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
                        <div class="col-12 mx-auto">
                            <h3>
                                <a class="post-title" href="post-details.html">
                                    CSS Animations: Adding Life to Your Web Pages
                                </a>
                            </h3>
                            <ul class="list-inline post-meta mb-4">
                                <li class="list-inline-item"><i class="ti-user mr-1"></i>
                                    <a href="author.html">William Freg</a>
                                </li>
                                <li class="list-inline-item"><i class="ti-calendar mr-1"></i>June 15, 2024</li>
                                <li class="list-inline-item">Category : <a href="#!" class="ml-1">Web Development </a>
                                </li>
                                <li class="list-inline-item">Tags : <a href="#!" class="ml-1">css </a> ,<a href="#!" class="ml-1">html </a>
                                </li>
                            </ul>
                            <p>
                                Eum omnis natus ex corrupti cum impedit adipisci minus, harum hic illum quasi iusto perspiciatis repellat! Dicta praesentium quae, voluptate, perferendis fugit quia eius consequuntur quaerat nulla eligendi iste totam deserunt obcaecati provident expedita vero nam natus iusto quod sit odit magnam laudantium.
                            </p>
                            <a href="post-elements.html" class="btn btn-outline-primary">Read more...</a>
                        </div>
                    </article>

                    <section id="home__latest-posts">
                        <article class="row mb-5">
                            <div class="col-md-4 mb-4 mb-md-0">
                                <div class="post-img-box">
                                    <img src="/front/images/posts/09.png" class="img-fluid rounded-lg" alt="post-thumb">
                                </div>
                            </div>
                            <div class="col-md-8">
                                <h4>
                                    <a class="post-title" href="post-details.html">
                                        Getting Started with Laravel: Your First Project Setup
                                    </a>
                                </h4>
                                <ul class="list-inline post-meta mb-2">
                                    <li class="list-inline-item"><i class="ti-user mr-2"></i><a href="author.html">Mark Wood</a>
                                    </li>
                                    <li class="list-inline-item">Date : June 11, 2024</li>
                                    <li class="list-inline-item">Category : <a href="#!" class="ml-1">Web design </a>
                                    </li>
                                    <li class="list-inline-item">Tags : <a href="#!" class="ml-1">Laravel </a> ,<a href="#!" class="ml-1">Framework </a>
                                    </li>
                                </ul>
                                <p>
                                    Learn the step-by-step process to install and configure your first Laravel project. From setting up the environment to creating your first controller, this guide will get you up and running with Laravel in no time …
                                </p>
                                <a href="post-details.html" class="btn btn-outline-primary">Read more...</a>
                            </div>
                        </article>

                        <article class="row mb-5">
                            <div class="col-md-4 mb-4 mb-md-0">
                                <div class="post-img-box">
                                    <img src="/front/images/posts/04.png" class="img-fluid rounded-lg" alt="post-thumb"   >
                                </div>
                            </div>
                            <div class="col-md-8">
                                <h4>
                                    <a class="post-title" href="post-details.html">Building a Simple CRUD Application with PHP and MySQL</a>
                                </h4>
                                <ul class="list-inline post-meta mb-2">
                                    <li class="list-inline-item"><i class="ti-user mr-2"></i><a href="author.html">Mark Wood</a>
                                    </li>
                                    <li class="list-inline-item">Date : June 22, 2024</li>
                                    <li class="list-inline-item">Category : <a href="#!" class="ml-1">Web design </a>
                                    </li>
                                    <li class="list-inline-item">
                                        Tags : <a href="#!" class="ml-1">Web </a> ,<a href="#!" class="ml-1">Php </a>
                                    </li>
                                </ul>
                                <p>In this guide, learn how to create a basic CRUD (Create, Read, Update, Delete) application with PHP and MySQL. It's a great project to solidify your PHP fundamentals and gain hands-on experience with databases …</p> <a href="post-details.html" class="btn btn-outline-primary">Read more...</a>
                            </div>
                        </article>
                        <article class="row mb-5">
                            <div class="col-md-4 mb-4 mb-md-0">
                                <div class="post-img-box">
                                    <img src="/front/images/posts/05.png" class="img-fluid rounded-lg" alt="post-thumb"   >
                                </div>
                            </div>
                            <div class="col-md-8">
                                <h4>
                                    <a class="post-title" href="post-details.html">
                                        Creating Responsive Navigation Bars with HTML and CSS
                                    </a>
                                </h4>
                                <ul class="list-inline post-meta mb-2">
                                    <li class="list-inline-item"><i class="ti-user mr-2"></i><a href="author.html">Mark Wood</a>
                                    </li>
                                    <li class="list-inline-item">Date : June 22, 2024</li>
                                    <li class="list-inline-item">Category : <a href="#!" class="ml-1">Web design </a>
                                    </li>
                                    <li class="list-inline-item">
                                        Tags : <a href="#!" class="ml-1">Web </a> ,<a href="#!" class="ml-1">Php </a>
                                    </li>
                                </ul>
                                <p>In this guide, learn how to create a basic CRUD (Create, Read, Update, Delete) application with PHP and MySQL. It's a great project to solidify your PHP fundamentals and gain hands-on experience with databases …</p> <a href="post-details.html" class="btn btn-outline-primary">Read more...</a>
                            </div>
                        </article>
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
                    <div class="widget">
                        <h5 class="widget-title"><span>Categories</span></h5>
                        <ul class="list-unstyled widget-list">
                            <li><a href="#!" class="d-flex">Frontend Frameworks
                                    <small class="ml-auto">(4)</small></a>
                            </li>
                            <li><a href="#!" class="d-flex">Mobile App Development
                                    <small class="ml-auto">(12)</small></a>
                            </li>
                            <li><a href="#!" class="d-flex">Cybersecurity Essentials
                                    <small class="ml-auto">(19)</small></a>
                            </li>
                            <li><a href="#!" class="d-flex">Data Structure and Algorithm
                                    <small class="ml-auto">(24)</small></a>
                            </li>
                            <li><a href="#!" class="d-flex">API Development and Integration
                                    <small class="ml-auto">(3)</small></a>
                            </li>
                            <li><a href="#!" class="d-flex">Database Management
                                    <small class="ml-auto">(8)</small></a>
                            </li>
                            <li><a href="#!" class="d-flex">Backend Development
                                    <small class="ml-auto">(3)</small></a>
                            </li>
                        </ul>
                    </div>
                    <!-- tags -->
                    <div class="widget">
                        <h5 class="widget-title"><span>Tags</span></h5>
                        <ul class="list-inline widget-list-inline">
                            <li class="list-inline-item"><a href="#!">Laravel</a>
                            </li>
                            <li class="list-inline-item"><a href="#!">CodingTips</a>
                            </li>
                            <li class="list-inline-item"><a href="#!">javascript</a>
                            </li>
                            <li class="list-inline-item"><a href="#!">AI</a>
                            </li>
                            <li class="list-inline-item"><a href="#!">frontend</a>
                            </li>
                            <li class="list-inline-item"><a href="#!">backend</a>
                            </li>
                            <li class="list-inline-item"><a href="#!">Framework</a>
                            </li>
                            <li class="list-inline-item"><a href="#!">Cybersecurity</a>
                            </li>
                            <li class="list-inline-item"><a href="#!">jquery</a>
                            </li>
                            <li class="list-inline-item"><a href="#!">php</a>
                            </li>
                        </ul>
                    </div>
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
