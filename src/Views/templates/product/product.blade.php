@extends('layout')
@section('content')
    <section>
        <div class="wrap-content my-4">
            <div class="title-detail">
                <h1>{{ $titleMain }}</h1>
                <div class="filter"><i class="fa-solid fa-filter"></i>&nbsp; Lọc </div>
            </div>
            <div class="sort-select d-none" x-data="{ open: false }">
                <p class="click-sort" @click="open = ! open">Sắp xếp: <span class="sort-show">Mới nhất</span></p>
                <div class="sort-select-main sort" x-show="open">
                    <p><a data-sort="1"
                            class="{{ Request()->sort == 1 || empty(Request()->sort) ? 'check' : '' }}"><i></i>Mới
                            nhất</a></p>
                    <p><a data-sort="2" class="{{ Request()->sort == 2 ? 'check' : '' }}"><i></i>Cũ nhất</a></p>
                    <p><a data-sort="3" class="{{ Request()->sort == 3 ? 'check' : '' }}"><i></i>Giá cao đến thấp</a></p>
                    <p><a data-sort="4" class="{{ Request()->sort == 4 ? 'check' : '' }}"><i></i>Giá thấp đến cao</a></p>
                    <input type="hidden" name="url" class="url-search" value="{{ Request()->url() }}" />
                </div>
            </div>
            <div class="flex-product-main">
                @if (!empty($listProperties) && $listProperties->isNotEmpty())
                    <div class="left-product">
                        @foreach ($listProperties as $list)
                            <div class="wr-search p-0">
                                <p class="text-split transition">{{ $list[0]['name'.$lang] }}</p>
                                <ul class="p-0">
                                    @foreach ($list[1] as $key => $value)
                                        @php
                                            $listP = $list[0]['slug'.$lang];
                                            $arrayC = !empty(Request()->$listP) ? explode(',', Request()->$listP) : [];
                                        @endphp
                                        <li class="item-search mb-2">
                                            <input {{ in_array($value['id'], $arrayC) ? 'checked' : '' }}
                                                class="ip-search mx-2" id="{{ $list[0]['slug'.$lang] }}-{{ $list[0]['id'] }}"
                                                type="checkbox" data-list="{{ $list[0]['slug'.$lang] }}" name="ip-search"
                                                value="{{ $value['id'] }}">
                                            <label for="{{ $list[0]['id'] }}">{{ $value['name'.$lang] }}</label>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        @endforeach

                    </div>
                @endif
                <div class="w-100 right-product {{ !empty($listProperties) ? '' : 'w-100' }}">
                    @if (!empty($product))
                        <div class="grid-product">
                            @foreach ($product as $v)
                                @include('component.itemProduct', ['product' => $v])
                            @endforeach
                        </div>
                    @endif
                    {!! $product->appends(request()->query())->onEachSide(3)->links() !!}
                </div>
            </div>
        </div>
    </section>
@endsection
