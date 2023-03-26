<!-- Для создания кастомизированной пагинации, нужно добавить метод paginate() в контроллере, и передать необходимое значение
которое нужно выводить в метод (3).
Через смд вызвать библиотеку пагинации, и аналогично файлу default создать свой дизайн пагинации, оставив только php код и ссылки,
а стили свои.

Пагнация состоин из 3 блоков, if начало и конец и foreach как цикл для создания кол-ва страниц контента. -->


@if ($paginator->hasPages())

<nav aria-label="Page navigation example">
        <ul class="pagination">

            @if ($paginator->onFirstPage())
                <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">

                    <a class="page-link"><i class="far fa-long-arrow-left"></i></a>
                </li>
            @else
                <li class="page-item">
                    <a class="page-link" href="{{ $paginator->previousPageUrl() }}"
                    rel="prev" aria-label="@lang('pagination.previous')"><i
                    class="far fa-long-arrow-left"></i></a>
                </li>
            @endif


            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="page-item disabled" aria-disabled="true"><a
                    class="page-link" href="#">{{ $element }}</a></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="page-item active" aria-current="page">
                                <a class="page-link" href="#">{{ $page }}</a></li>
                        @else
                            <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="page-item">
                    <a class="page-link" href="{{ $paginator->nextPageUrl() }}"
                    rel="next" aria-label="@lang('pagination.next')"><i class="far fa-long-arrow-right"></i></a>
                </li>
            @else
                <li class="disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                <a class="page-link"><i class="far fa-long-arrow-right"></i></a>
                </li>
            @endif

            </ul>
</nav>

@endif


<!-- <ul class="pagination">
                <li class="page-item"><a class="page-link" href="#"><i class="far fa-long-arrow-left"></i></a></li>

                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>

                <li class="page-item"><a class="page-link" href="#"><i class="far fa-long-arrow-right"></i></a></li>
</ul> -->