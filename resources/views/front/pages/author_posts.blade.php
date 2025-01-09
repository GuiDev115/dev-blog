@extends('front.layout.pages-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Document Title')
@section('meta_tags')
    {!! SEO::generate() !!}
@endsection
@section('content')

    <section class="section-sm border-bottom pb-3 pt-3">
        <div class="container">
            <!-- Author Profile -->
            <div class="author-card">
                <img src=" {{ $author->picture }}" alt="Foto do Autor">
                <h3 class="mt-3 title-color">{{ $author->name }}</h3>
                <p>{{ $author->username }}</p>
                <p>
                    {{ $author->bio }}
                </p>

                @if( $author->social_links )
                <!-- Social Links -->
                <div class="social-links mt-3">
                    @if( $author->social_links->facebook_url )
                    <a href="{{ $author->social_links->facebook_url }}" target="_blank" title="Facebook"><i class="ti-facebook"></i></a>
                    @endif

                    @if( $author->social_links->instagram_url )
                        <a href="{{ $author->social_links->instagram_url }}" target="_blank" title="Instagram"><i class="ti-instagram"></i></a>
                    @endif

                    @if( $author->social_links->youtube_url )
                        <a href="{{ $author->social_links->youtube_url }}" target="_blank" title="Youtube"><i class="ti-youtube"></i></a>
                    @endif

                    @if( $author->social_links->linkedin_url )
                        <a href="{{ $author->social_links->linkedin_url }}" target="_blank" title="Linkedin"><i class="ti-linkedin"></i></a>
                    @endif

                    @if( $author->social_links->github_url )
                        <a href="{{ $author->social_links->github_url }}" target="_blank" title="Github"><i class="ti-github"></i></a>
                    @endif

                    @if( $author->social_links->twitter_url )
                        <a href="{{ $author->social_links->twitter_url }}" target="_blank" title="Twitter"><i class="ti-twitter"></i></a>
                    @endif

                </div>
                    @endif
            </div>
            <!-- Author's Posts -->
        </div>
    </section>

    <section class="section-sm mt-0 pt-4">
        <div class="container">
            <div class="row">

                @forelse($posts as $post)
                <div class="col-sm-6 col-md-4 col-lg-3 mb-2">
                    <article class="mb-2">
                        <div class="mb-2">
                            <img src="/images/posts/resized/resized_{{ $post->featured_image }}" alt="" class="img-fluid rounded-lg">
                        </div>

                        <h5>
                            <a class="post-title" href="{{ route('read_post', $post->slug) }}">
                                {{ $post->title }}
                            </a>
                        </h5>
                        <ul class="list-inline post-meta mb-2">
                            <li class="list-inline-item">Data : {{ date_formatter($post->created_at) }}</li>
                            <li class="list-inline-item">Categoria : <a href="{{ route('category_posts', $post->post_category->slug) }}" class="ml-1">{{ $post->post_category->name }} </a>
                            </li>
                        </ul>
                    </article>
                </div>

                @empty
                    <div class="col-12">
                        <span class="text-danger text-center">
                            Sem posts encontrado por esse autor
                        </span>
                    </div>
                @endforelse

            </div>
            <div class="pagination-block">
                {{ $posts->appends(request()->input())->links('custom_pagination') }}
            </div>
        </div>
    </section>

@endsection
