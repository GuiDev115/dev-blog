<div>
    <div class="widget">
        <h5 class="widget-title"><span>Categorias</span></h5>
        <ul class="list-unstyled widget-list">
            @foreach( sidebar_categories() as $item )
                <li>
                    <a href="{{ route('category_posts', $item->slug) }}" class="d-flex">
                        {{ $item->name }} <small class="ml-auto">( {{ $item->posts->count() }} )</small></a>
                </li>
            @endforeach
        </ul>
    </div>
</div>
