@extends('front.layout.pages-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Document Title')
@section('meta_tags')
    {!! SEO::generate() !!}
@endsection

@section('content')

    <div class="row">
        <div class="col-lg-8  mb-5 mb-lg-0 mx-auto">
            <article class="row mb-4">
                <div class="col-lg-12 mb-2 text-center">
                    <h2 class="mb-3">{{ $post->title }}</h2>
                    <ul class="list-inline post-meta">
                        <li class="list-inline-item"><i class="ti-user mr-2"></i><a href="{{ route('author_posts', $post->author->username) }}">{{ $post->author->name }}</a>
                        </li>
                        <li class="list-inline-item">Data : {{ date_formatter($post->created_at) }}</li>
                        <li class="list-inline-item">Categoria : <a href="{{ route('category_posts', $post->post_category->slug) }}" class="ml-1">{{ $post->post_category->name }} </a>
                        </li>
                        <li class="list-inline-item"> Duração:
                            <i class="ti-tim mr-1"></i>{{ readDuration($post->title, $post->contents) }} @choice('min|mins', readDuration($post->title, $post->content))
                        </li>
                    </ul>
                </div>
                <div class="col-12 mb-3 text-center">
                    <img src="/images/posts/{{ $post->featured_image }}" alt="" class="img-fluid rounded-lg">
                </div>
                <!-- SHARE BUTTONS -->
                <div class="share-buttons">
                    <span class="title-color">Share: </span>
                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(route('read_post', $post->slug)) }}" target="_blank" class="btn-facebook">
                        <i class="ti-facebook"></i>
                    </a>
                    <a href="https://twitter.com/intent/tweet?url={{ urlencode(route('read_post', $post->slug)) }}&amp;text={{ urlencode($post->title) }}" target="_blank" class="btn-twitter">
                        <i class="ti-twitter-alt"></i>
                    </a>
                    <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode(route('read_post',$post->slug)) }}" target="_blank" class="btn-linkedin">
                        <i class="ti-linkedin"></i>
                    </a>
                    <a href="mailto:?subject={{ urlencode('Veja este post: '. $post->title) }}&amp;body={{ urlencode('Encontrei esse artigo interessante: '. route('read_post', $post->slug)) }}" target="_blank" class="btn-email">
                        <i class="ti-email"></i>
                    </a>
                </div>
                <!-- SHARE BUTTONS -->
                <div class="col-lg-12">
                    <div class="content">
                        <p class="text-justify" style="font-size: 1.1rem; line-height: 1.8;">
                            {!! $post->contents !!}
                        </p>
                    </div>
                </div>
            </article>
            <div class="prev-next-posts mt-3 mb-3">
                <div class="row justify-content-between p-4">
                    <div class="col-md-6 mb-2">

                        @if ( $prevPost )
                        <div>
                            <h6>« Previous</h6>
                            <a href="{{ route('read_post', $prevPost->slug) }}">{{ $prevPost->title }}</a>
                        </div>
                        @endif
                    </div>
                    <div class="col-md-6 mb-2 text-md-right">

                        @if ( $nextPost )
                        <div>
                            <h6>Next »</h6>
                            <a href="{{ route('read_post', $nextPost->slug) }}">{{ $nextPost->title }}</a>
                        </div>
                        @endif
                    </div>
                </div>
            </div>

            <!--
            @if ( $relatedPosts )
            <section>
                <h4>Posts Relacionado</h4>
                <hr>
                @foreach( $relatedPosts as $related )
                <article class="row mb-5 mt-4">
                    <div class="col-md-4 mb-4 mb-md-0">
                        <div class="post-img-box">
                            <img src="/images/posts/resized/resized_{{ $related->featured_image }}" class="img-fluid rounded-lg" alt="post-thumb">
                        </div>
                    </div>
                    <div class="col-md-8">
                        <h4>
                            <a class="post-title" href="{{ route('read_post', $related->slug) }}">
                                {{ $related->title }}
                            </a>
                        </h4>
                        <ul class="list-inline post-meta mb-2">
                            <li class="list-inline-item">
                                <i class="ti-user mr-1"></i><a href="{{ route('author_posts', $related->author->username) }}"> {{ $related->author->name }}</a>
                            </li>
                            <li class="list-inline-item">
                                <i class="ti-calendar mr-1"></i>{{ date_formatter($related->created_at) }}
                            </li>
                            <li class="list-inline-item">
                                Category : <a href="{{ route('category_posts', $related->post_category->slug) }}" class="ml-1"> {{ $related->post_category->name }} </a>
                            </li>
                            <li class="list-inline-item">
                                <i class="ti-timer mr-1"></i> {{ readDuration($related->title, $related->contents)}} @choice('min|mins', readDuration($related->title, $related->contents))
                            </li>
                        </ul>
                        <p>
                            {{ Str::ucfirst(words($related->contents, 28)) }}
                        </p>
                        <a href="{{ route('read_post', $related->slug) }}" class="btn btn-outline-primary">Leia Mais...</a>
                    </div>
                </article>
            @endforeach
            </section>
            -->
            @endif
            <section class="comments">
                <div id="disqus_thread"></div>
                <script>
                    /**
                     *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
                     *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables    */

                    var disqus_config = function () {
                    this.page.url = "{{ route('read_post', $post->id) }}";  // Replace PAGE_URL with your page's canonical URL variable
                    this.page.identifier = "PID_"+"{{ $post->id }}"; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
                    };

                    (function() { // DON'T EDIT BELOW THIS LINE
                        var d = document, s = d.createElement('script');
                        s.src = 'https://blog-guidev.disqus.com/embed.js';
                        s.setAttribute('data-timestamp', +new Date());
                        (d.head || d.body).appendChild(s);
                    })();
                </script>
                <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
            </section>


        </div>
    </div>

@endsection

@push('scripts')
    <script>
        $(document).on('click', '.share-buttons > a', function(e) {
            e.preventDefault();
            window.open($(this).attr('href'), '', 'width=600,height=500,top='+($(window).height() / 2 - 200)+', left='+($(window).width() / 2 - 300+', toolbar=0, location=0, directories=0, menubar=0, scrollbars=0'));
            return false;
        });
    </script>
@endpush
