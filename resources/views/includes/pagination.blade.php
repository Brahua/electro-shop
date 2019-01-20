@if ($paginator->hasPages())
    <ul class="reviews-pagination" role="navigation">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li class="disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                <span aria-hidden="true" class="button disabled"><i class="fa fa-angle-left"></i></span>
            </li>
        @else
            <li>
                <a href="{{ $paginator->previousPageUrl() }}" class="button" rel="prev" aria-label="@lang('pagination.previous')" ><i class="fa fa-angle-left"></i></a>
            </li>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <li class="disabled" aria-disabled="true" ><span class="page disabled" >{{ $element }}</span></li>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="active" aria-current="page"><span class="page active">{{ $page }}</span></li>
                    @else
                        <li><a href="{{ $url }}" class="page">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li>
                <a href="{{ $paginator->nextPageUrl() }}" class="button" rel="next" aria-label="@lang('pagination.next')"><i class="fa fa-angle-right"></i></a>
            </li>
        @else
            <li class="disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                <span aria-hidden="true" class="button disabled"><i class="fa fa-angle-right"></i></span>
            </li>
        @endif
    </ul>
@endif
