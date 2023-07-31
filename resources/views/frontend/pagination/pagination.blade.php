<nav class="navigation pagination">
    <h2 class="screen-reader-text">Posts navigation</h2>
    <div class="nav-links">
        <ul class="page-numbers">
            @if ($paginator->currentPage() > 1)
                <li><a class="page-numbers" href="{{ $paginator->previousPageUrl() }}">&laquo;</a></li>
            @endif

            @for ($i = 1; $i <= $paginator->lastPage(); $i++)
                <li>
                    @if ($i === $paginator->currentPage())
                        <span class="page-numbers current">{{ $i }}</span>
                    @else
                        <a class="page-numbers" href="{{ $paginator->url($i) }}">{{ $i }}</a>
                    @endif
                </li>
            @endfor

            @if ($paginator->hasMorePages())
                <li><a class="page-numbers" href="{{ $paginator->nextPageUrl() }}">&raquo;</a></li>
            @endif
        </ul>
    </div>
</nav>
