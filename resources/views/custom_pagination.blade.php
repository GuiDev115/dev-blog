<div style="overflow-x: auto; white-space:nowrap">
    @if ($paginator->hasPages())
        <nav aria-label="Page navigation">
            <ul class="pagination justify-content-center">
                <!-- Previous -->
                @if ($paginator->onFirstPage())
                    <li class="page-item disabled">
                        <a class="page-link" href="#!" tabindex="-1"><i class="ti-arrow-left"></i></a>
                    </li>
                @else
                    <li class="page-item">
                        <a class="page-link" href="{{ $paginator->previousPageUrl() }}" tabindex="-1"><i class="ti-arrow-left"></i></a>
                    </li>
                @endif

                @if($paginator->currentPage() > 3)
                    <li class="page-item"><a class="page-link" href="{{ $paginator->url(1) }}">1</a></li>
                @endif
                @if($paginator->currentPage() > 4)
                    <li class="page-item disabled"><a class="page-link" href="#!">...</a></li>
                @endif

                @foreach(range(1, $paginator->lastPage()) as $i)
                    @if($i >= $paginator->currentPage() - 2 && $i <= $paginator->currentPage() + 2)
                        @if ($i == $paginator->currentPage())
                            <li class="page-item active">
                                <a class="page-link" href="#!">{{ $i }}</a>
                            </li>
                        @else
                            <li class="page-item"><a class="page-link" href="{{ $paginator->url($i) }}">{{ $i }}</a></li>
                        @endif
                    @endif
                @endforeach
                <!-- Active page -->
                @if($paginator->currentPage() < $paginator->lastPage() - 3)
                    {{-- <li><a>...</a></li> --}}
                    <li class="page-item disabled"><a class="page-link" href="#!">...</a></li>
                @endif
                @if($paginator->currentPage() < $paginator->lastPage() - 2)
                    <li class="page-item"><a class="page-link" href="{{ $paginator->url($paginator->lastPage()) }}">{{ $paginator->lastPage() }}</a></li>
                @endif

                <!-- Next -->
                @if ($paginator->hasMorePages())
                    <li class="page-item">
                        <a class="page-link" href="{{ $paginator->nextPageUrl() }}"><i class="ti-arrow-right"></i></a>
                    </li>
                @else
                    <li class="page-item disabled">
                        <a class="page-link" href="#!"><i class="ti-arrow-right"></i></a>
                    </li>
                @endif

            </ul>
        </nav>
    @endif

</div>
