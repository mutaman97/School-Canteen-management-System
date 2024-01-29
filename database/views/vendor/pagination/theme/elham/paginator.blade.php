@if ($paginator->hasPages())
    <nav aria-label="{{ __('Pagination') }}">
        <ul class="pagination">
                <!-- Previous Page Link -->
            @if (!$paginator->onFirstPage())
            {{-- <li>
                <a href="{{ $paginator->firstPageUrl() }}" aria-label="">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li> --}}
            <li>
                <a href="{{ $paginator->previousPageUrl() }}" aria-label=""><span aria-hidden="true">&laquo;</span></a>
            </li>
            @endif


            <!-- Pagination Elements -->
            @foreach ($elements as $element)
                <!-- "Three Dots" Separator -->
                @if (is_string($element))
                    <li class="disabled" aria-disabled="true"><span aria-hidden="true">{{ $element }}</span></li>
                @endif

                <!-- Array Of Links -->
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="active"><a href="{{ $url }}">{{ $page }}</a></li>
                        @else
                            <li><a href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach


            <!-- Next Page Link -->
            @if ($paginator->hasMorePages())
            <li>
                <a href="{{ $paginator->nextPageUrl() }}" aria-label=""><span aria-hidden="true">&raquo;</span></a>
            </li>
            {{-- <li>
                <a href="{{ $paginator->lastPageUrl() }}" aria-label=""><span aria-hidden="true">&raquo;</span></a>
            </li> --}}
            @endif

        </ul>
    </nav>
@endif
