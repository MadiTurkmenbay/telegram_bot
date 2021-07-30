@if ($paginator->hasPages())
    <nav>
        <ul class="pagination">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                    <span aria-hidden="true"><button class="paginate_button">
                         <svg width="27" height="12" viewBox="0 0 27 12" fill="#909090"
                              xmlns="http://www.w3.org/2000/svg">
<rect x="26.3638" y="7" width="25" height="1" rx="0.5" transform="rotate(-180 26.3638 7)"/>
<rect x="5.65674" y="12" width="8" height="1" rx="0.5" transform="rotate(-135 5.65674 12)"/>
<rect x="6.36377" y="1.39343" width="8" height="1" rx="0.5" transform="rotate(135 6.36377 1.39343)"/>
</svg>

                        </button></span>
                </li>
            @else
                <li>
                    <a href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">
                        <button class="paginate_button">
                            <svg width="27" height="12" viewBox="0 0 27 12" fill="#909090"
                                 xmlns="http://www.w3.org/2000/svg">
                                <rect x="26.3638" y="7" width="25" height="1" rx="0.5"
                                      transform="rotate(-180 26.3638 7)"/>
                                <rect x="5.65674" y="12" width="8" height="1" rx="0.5"
                                      transform="rotate(-135 5.65674 12)"/>
                                <rect x="6.36377" y="1.39343" width="8" height="1" rx="0.5"
                                      transform="rotate(135 6.36377 1.39343)"/>
                            </svg>

                        </button>
                    </a>
                </li>
            @endif

            {{--            {{$paginator->count()}}--}}
            {{-- Pagination Elements --}}
            {{--            {!! json_encode($elements) !!}--}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="page-item dots_sep" aria-disabled="true"><span class="page-link">{{ $element }}</span>
                    </li>
                @endif
                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="active" aria-current="page">
                                <button class="paginate_button button_number active"><span>{{ $page }}</span></button>
                            </li>
                        @else
                            <li><a href="{{ $url }}">
                                    <button class="paginate_button button_number">{{ $page }}</button>
                                </a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li>
                    <a href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">
                        <button class="paginate_button">
                            <svg width="27" height="12" viewBox="0 0 27 12" fill="#909090"
                                 xmlns="http://www.w3.org/2000/svg">
                                <rect y="5" width="25" height="1" rx="0.5"/>
                                <rect x="20.707" width="8" height="1" rx="0.5" transform="rotate(45 20.707 0)"/>
                                <rect x="20" y="10.6066" width="8" height="1" rx="0.5"
                                      transform="rotate(-45 20 10.6066)"/>
                            </svg>
                        </button>
                    </a>
                </li>
            @else
                <li class="disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                    <span aria-hidden="true"><button class="paginate_button">
                                                         <svg width="27" height="12" viewBox="0 0 27 12" fill="#909090"
                                                              xmlns="http://www.w3.org/2000/svg">
                                <rect y="5" width="25" height="1" rx="0.5"/>
                                <rect x="20.707" width="8" height="1" rx="0.5" transform="rotate(45 20.707 0)"/>
                                <rect x="20" y="10.6066" width="8" height="1" rx="0.5"
                                      transform="rotate(-45 20 10.6066)"/>
                            </svg>
                        </button></span>
                </li>
            @endif
        </ul>
    </nav>
@endif
