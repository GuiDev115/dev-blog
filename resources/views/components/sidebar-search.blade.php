<div>
    <div class="widget">
        <h5 class="widget-title"><span>Pesquisa</span></h5>
        <form action="{{ route('search_posts') }}" method="GET" class="widget-search">
            <input id="search-query" name="q" type="search" placeholder="Type to discover articles, guide &amp; tutorials..." value="{{ request('q') ? request('q') : '' }}">
            <button type="submit"><i class="ti-search"></i>
            </button>
        </form>
    </div>
</div>
