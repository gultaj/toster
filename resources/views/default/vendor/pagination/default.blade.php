@if ($paginator->hasPages())
    <ul class="pagination">
        @if (!$paginator->onFirstPage())
            <li><a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="pagination__link">← Предыдущие</a></li>
        @endif

        @foreach ($elements as $element)
            @if (is_string($element))
                <li class="uk-disabled"><span>{{ $element }}</span></li>
            @endif

            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="pagination__current"><span class="pagination__link">{{ $page }}</span></li>
                    @else
                        <li><a href="{{ $url }}" class="pagination__link">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach

        @if ($paginator->hasMorePages())
            <li><a href="{{ $paginator->nextPageUrl() }}" rel="next" class="pagination__link">Следующие →</a></li>
        @endif
    </ul>
@endif
