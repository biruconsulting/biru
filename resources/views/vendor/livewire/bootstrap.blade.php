<div class="row">
    @if ($paginator->hasPages())
    <div class="col-12 col-md-6 d-flex justify-content-md-start justify-content-center">
        <p>
            <span>Showing</span>
            <span class="font-medium">{{ $paginator->firstItem() }}</span>
            <span>to</span>
            <span class="font-medium">{{ $paginator->lastItem() }}</span>
            <span>of</span>
            <span class="font-medium">{{ $paginator->total() }}</span>
            <span>results</span>
        </p>
    </div>
    <div class="col-12 col-md-6 d-flex justify-content-md-end justify-content-center">
        <nav>
            <ul class="pagination">
                {{-- First Page Link --}}
                @if ($paginator->onFirstPage())
                    <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.first')">
                        <span class="page-link" aria-hidden="true">&lsaquo;&lsaquo;</span>
                    </li>
                @else
                    <li class="page-item">
                        <button type="button" dusk="previousPage" class="page-link" wire:click="gotoPage(1)" wire:loading.attr="disabled" rel="prev" aria-label="@lang('pagination.first')">&lsaquo;&lsaquo;</button>
                    </li>
                @endif

                {{-- Previous Page Link --}}
                @if ($paginator->onFirstPage())
                    <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                        <span class="page-link" aria-hidden="true">&lsaquo;</span>
                    </li>
                @else
                    <li class="page-item">
                        <button type="button" dusk="previousPage" class="page-link" wire:click="previousPage" wire:loading.attr="disabled" rel="prev" aria-label="@lang('pagination.previous')">&lsaquo;</button>
                    </li>
                @endif

                {{-- Pagination Elements --}}
                @foreach ($elements as $element)
                    {{-- "Three Dots" Separator --}}
                    @if (is_string($element))
                        <li class="page-item disabled" aria-disabled="true"><span class="page-link">{{ $element }}</span></li>
                    @endif

                    {{-- Array Of Links --}}
                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            <!--  Use three dots when current page is greater than 3.  -->
                            @if ($paginator->currentPage() > 3 && $page === 2)
                                <div class="text-blue-800 mx-1">
                                    <span class="font-bold">.</span>
                                    <span class="font-bold">.</span>
                                    <span class="font-bold">.</span>
                                </div>
                            @endif

                            @if ($page == $paginator->currentPage())
                                <li class="page-item active" wire:key="paginator-page-{{ $page }}" aria-current="page"><span class="page-link">{{ $page }}</span></li>
                            @elseif ($page === $paginator->currentPage() + 1 || $page === $paginator->currentPage() + 2 || $page === $paginator->currentPage() - 1 || $page === $paginator->currentPage() - 2)
                                <li class="page-item" wire:key="paginator-page-{{ $page }}"><button type="button" class="page-link" wire:click="gotoPage({{ $page }})">{{ $page }}</button></li>
                            @endif

                            <!--  Use three dots when current page is away from end.  -->
                            @if ($paginator->currentPage() < $paginator->lastPage() - 2  && $page === $paginator->lastPage() - 1)
                                <div class="text-blue-800 mx-1">
                                    <span class="font-bold">.</span>
                                    <span class="font-bold">.</span>
                                    <span class="font-bold">.</span>
                                </div>
                            @endif

                        @endforeach
                    @endif
                @endforeach

                {{-- Next Page Link --}}
                @if ($paginator->hasMorePages())
                    <li class="page-item">
                        <button type="button" dusk="nextPage" class="page-link" wire:click="nextPage" wire:loading.attr="disabled" rel="next" aria-label="@lang('pagination.next')">&rsaquo;</button>
                    </li>
                @else
                    <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                        <span class="page-link" aria-hidden="true">&rsaquo;</span>
                    </li>
                @endif

                {{-- Last Page Link --}}
                @if ($paginator->hasMorePages())
                    <li class="page-item">
                        <button type="button" dusk="nextPage" class="page-link" wire:click="gotoPage({{ $paginator->lastPage() }})" wire:loading.attr="disabled" rel="next" aria-label="@lang('pagination.last')">&rsaquo;&rsaquo;</button>
                    </li>
                @else
                    <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.last')">
                        <span class="page-link" aria-hidden="true">&rsaquo;&rsaquo;</span>
                    </li>
                @endif
            </ul>
        </nav>
    </div>
    @endif
</div>
