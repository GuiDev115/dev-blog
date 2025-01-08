

<!DOCTYPE html>
<html lang="en-us">
<head>
    <meta charset="utf-8">
    <title>@yield('pageTitle')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=5">
    <meta name="description" content="This is meta description">
    <meta name="author" content="SawaStacks">
    <link rel="shortcut icon" href="/front/images/favicon.png" type="image/x-icon">
    <link rel="icon" href="/front/images/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="/front/plugins/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="/front/css/animate.min.css">
    <link rel="stylesheet" href="/front/plugins/themify-icons/themify-icons.css">
    <link rel="stylesheet" href="/front/plugins/slick/slick.css">
    <link rel="stylesheet" href="/front/css/style.css">
    @stack('stylesheets')
</head>
<body>
<!-- navigation -->
<header class="sticky-top bg-white border-bottom border-default">
    <div class="container">

        <nav class="navbar navbar-expand-lg navbar-white">
            <a class="navbar-brand" href="index.html">
                <img class="img-fluid" width="150px" src="/front/images/logo.png" alt="SawaBlog">
            </a>
            <button class="navbar-toggler border-0" type="button" data-toggle="collapse" data-target="#navigation">
                <i class="ti-menu"></i>
            </button>

            <div class="collapse navbar-collapse text-center" id="navigation">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.html">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="about.html">About</a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                           aria-expanded="false">Pages <i class="ti-angle-down ml-1"></i>
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="author.html">Author</a>
                            <a class="dropdown-item" href="category-posts.html">Category posts</a>
                            <a class="dropdown-item" href="search-results.html">Search results</a>
                            <a class="dropdown-item" href="post-details.html">Post Details</a>
                            <a class="dropdown-item" href="privacy-policy.html">Privacy Policy</a>
                            <a class="dropdown-item" href="terms-conditions.html">Terms Conditions</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact.html">Contact</a>
                    </li>
                </ul>

                <!-- search -->
                <div class="search px-4">
                    <button id="searchOpen" class="search-btn"><i class="ti-search"></i></button>
                    <div class="search-wrapper">
                        <form action="javascript:void(0)" class="h-100">
                            <input class="search-box pl-4" id="search-query" name="s" type="search" placeholder="Type to discover articles, guide &amp; tutorials... ">
                        </form>
                        <button id="searchClose" class="search-close"><i class="ti-close text-dark"></i></button>
                    </div>
                </div>
                <!-- /search -->
            </div>
        </nav>
    </div>
</header>
<!-- /navigation -->

<section class="section">
    <div class="container">
        @yield('content')
    </div>
</section>

<footer class="section-sm pb-0 border-top border-default">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-md-3 mb-4">
                <a class="mb-4 d-block" href="index.html">
                    <img class="img-fluid" width="150px" src="/front/images/logo.png" alt="SawaBlog">
                </a>
                <p>Ratione illum tempore id voluptatem nemo fugit error nulla similique minima odit, pariatur eaque, perspiciatis cumque necessitatibus voluptates nostrum magnam enim.</p>
            </div>

            <div class="col-lg-2 col-md-3 col-6 mb-4">
                <h6 class="mb-4">Quick Links</h6>
                <ul class="list-unstyled footer-list">
                    <li><a href="contact.html">Contact</a></li>
                    <li><a href="about.html">About</a></li>
                    <li><a href="privacy-policy.html">Privacy Policy</a></li>
                    <li><a href="terms-conditions.html">Terms Conditions</a></li>
                </ul>
            </div>

            <div class="col-lg-2 col-md-3 col-6 mb-4">
                <h6 class="mb-4">Social Links</h6>
                <ul class="list-unstyled footer-list">
                    <li><a href="#">Facebook</a></li>
                    <li><a href="#">Twitter</a></li>
                    <li><a href="#">Github</a></li>
                    <li><a href="#">Linkedin</a></li>
                </ul>
            </div>

            <div class="col-md-3 mb-4">
                <h6 class="mb-4">Subscribe Newsletter</h6>
                <form class="subscription" action="javascript:void(0)" method="post">
                    <div class="position-relative">
                        <i class="ti-email email-icon"></i>
                        <input type="email" class="form-control" placeholder="Your Email Address">
                    </div>
                    <button class="btn btn-primary btn-block rounded" type="submit">Subscribe now</button>
                </form>
            </div>
        </div>
        <div class="scroll-top">
            <a href="javascript:void(0);" id="scrollTop"><i class="ti-angle-up"></i></a>
        </div>
        <div class="text-center">
            <p class="content">&copy; 2024 - Design &amp; Develop By Guidev</p>
        </div>
    </div>
</footer>


<script src="/front/plugins/jQuery/jquery.min.js"></script>
<script src="/front/plugins/bootstrap/bootstrap.min.js" async></script>
<script src="/front/plugins/slick/slick.min.js"></script>
<script src="/front/js/script.js"></script>
@stack('scripts')
</body>
</html>
