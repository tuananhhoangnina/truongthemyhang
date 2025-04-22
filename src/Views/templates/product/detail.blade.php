@extends('layout')
@section('content')
<section x-data>
    <div class="wrap-content my-4">
        <div class="title-detail">
            <h1>{{ $rowDetail['name'.$lang] }}</h1>
        </div>
        <div class="grid-pro-detail">
            <div class="left-pro-detail">

                <div class="overflow-hidden">
                    <a id="Zoom-1" class="MagicZoom"
                        data-options="zoomMode: false; hint: off; rightClick: true; selectorTrigger: click; expandCaption: false; history: false;"
                        href="{{ assets_photo('product', '', $rowDetail['photo']) }}" title="{{ $rowDetail['name'.$lang] }}">
                        <img class=""
                            onerror="this.src='{{ thumbs('thumbs/710x440x1/assets/images/noimage.png') }}';"
                            src="{{ assets_photo('product', '710x440x1', $rowDetail['photo'], 'thumbs') }}"
                            alt="{{ $rowDetail['name'.$lang] }}">
                    </a>
                </div>

                <div class="album-product my-2 mt-2">
                    <div class="swiper swiper-auto" data-swiper="slidesPerView:3|spaceBetween:5|breakpoints:{370: {slidesPerView:3,spaceBetween:5},575: {slidesPerView:3,spaceBetween:5},768: {slidesPerView:4,spaceBetween:5},992: {slidesPerView:5,spaceBetween:5}}|autoplay:{delay: 5000,pauseOnMouseEnter:true,disableOnInteraction:false}|speed:1000|allowTouchMove: false|navigation:{nextEl:'.-next',prevEl:'.-prev'}|">
                        <div
                            class="swiper-wrapper row row-product row-cols-3 row-cols-sm-3 row-cols-md-4 row-cols-lg-5 flex-nowrap gutter-x-5">
                            <a class="swiper-slide col thumb-pro-detail border-[1px]" data-zoom-id="Zoom-1"
                                href="{{ assets_photo('product', '', $rowDetail['photo']) }}"
                                title="{{ $rowDetail['name'.$lang] }}"
                                data-image="{{ assets_photo('product', '710x440x1', $rowDetail['photo'], 'thumbs') }}"><img
                                    class=" !mb-0 !pb-0 !border-0"
                                    onerror="this.src='{{ thumbs('thumbs/710x440x1/assets/images/noimage.png') }}';"
                                    src="{{ assets_photo('product', '710x440x1', $rowDetail['photo'], 'thumbs') }}"
                                    alt="{{ $rowDetail['name'.$lang] }}"></a>
                            @foreach ($rowDetailPhoto as $v)
                            <a class="swiper-slide col thumb-pro-detail border-[1px]" data-zoom-id="Zoom-1"
                                href="{{ assets_photo('product', '', $v['photo']) }}"
                                title="{{ $rowDetail['name'.$lang] }}"
                                data-image="{{ assets_photo('product', '710x440x1', $v['photo'], 'thumbs') }}"><img
                                    class=" !mb-0 !pb-0 !border-0"
                                    onerror="this.src='{{ thumbs('thumbs/710x440x1/assets/images/noimage.png') }}';"
                                    src="{{ assets_photo('product', '710x440x1', $v['photo'], 'thumbs') }}"
                                    alt="{{ $rowDetail['name'.$lang] }}"></a>
                            @endforeach
                        </div>
                        <div class="swiper-pagination -pagination"></div>
                        <div class="swiper-button-prev -prev"></div>
                        <div class="swiper-button-next -next"></div>
                    </div>
                </div>
            </div>

            <div class="right-pro-detail">

                @if (!empty($listProperties))
                @foreach ($listProperties as $key => $list)
                @if (count($list[1]) > 0)
                <div class="grid-properties mb-4">
                    @foreach ($list[1] as $key => $value)
                    <span class="properties {{ $key == 0 ? 'active' : '' }}"
                        data-product="{{ $rowDetail['id'] }}" data-id="{{ $value['id'] }}"
                        data-list="{{ $list[0]['id'] }}">{{ $value['name'.$lang] }}</span>
                    @endforeach
                </div>
                @endif
                @endforeach
                @endif

                <div class="text-center flex d-none">
                    <div class="comment-star">
                        <i class="far fa-star"></i>
                        <i class="far fa-star"></i>
                        <i class="far fa-star"></i>
                        <i class="far fa-star"></i>
                        <i class="far fa-star"></i>
                        <span style="width: {{ Comment::avgStar($rowDetail['id'], $rowDetail['type']) }}%">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </span>
                    </div>
                    <div class="comment-count"><a>({{ $countComment }} đánh giá)</a></div>
                </div>

                <ul class="attr-pro-detail">
                    <li class="flex mb-2 items-baseline">
                        <p class="attr-label-pro-detail font-medium mr-[5px]">Giá:</p>
                        <div class="attr-content-pro-detail">
                            @if ($rowDetail['sale_price'])
                            <span
                                class="price-new-pro-detail">{{ Func::formatMoney($rowDetail['sale_price']) }}</span>
                            <span
                                class="price-old-pro-detail">{{ Func::formatMoney($rowDetail['regular_price']) }}</span>
                            @else
                            <span
                                class="price-new-pro-detail">{{ $rowDetail['regular_price'] ? Func::formatMoney($rowDetail['regular_price']) : 'Liên hệ' }}</span>
                            @endif
                        </div>
                    </li>

                </ul>

                
                @if(!empty(config('type.order')))
                    <div class="cart-pro-detail">
                        <div class="attr-content-pro-detail d-block">
                            <label class="mb-3" for="qty-pro">Số lương: </label>
                            <div class="quantity-pro-detail">
                                <span class="quantity-minus-pro-detail">-</span>
                                <input type="text" id="qty-pro" class="qty-pro !outline-none !shadow-none !ring-0" min="1"
                                    value="1" readonly="">
                                <span class="quantity-plus-pro-detail">+</span>
                            </div>
                        </div>
                    </div>
                    <div class="cart-pro-detail">
                        <a class="transition addcart text-decoration-none addnow" data-id="{{ $rowDetail['id'] }}"
                            data-action="addnow">Thêm vào giỏ hàng</a>
                        <a class="transition addcart text-decoration-none buynow" data-id="{{ $rowDetail['id'] }}"
                            data-action="buynow">Mua ngay</a>
                    </div>
                @endif

                <div class="">
                    {!! Func::decodeHtmlChars($rowDetail['desc' . $lang]) !!}
                </div>

                <div class="social-plugin w-clear">
                    @component('component.share')
                    @endcomponent
                </div>
            </div>
        </div>

        <div class="tabs-pro-detail mt-4">
            <ul class="nav nav-tabs" id="tabsProDetail" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="info-pro-detail-tab" data-bs-toggle="tab" href="#info-pro-detail"
                        role="tab">Thông tin sản phẩm</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="album-pro-detail-tab" data-bs-toggle="tab" href="#album-pro-detail"
                        role="tab">Hình ảnh</a>
                </li>
            </ul>
            <div class="tab-content" id="tabsProDetailContent">
                <div class="tab-pane fade show active" id="info-pro-detail" role="tabpanel">
                    <div class="content-text">{!! Func::decodeHtmlChars($rowDetail['content' . $lang]) !!}</div>
                </div>
                <div class="tab-pane fade" id="album-pro-detail" role="tabpanel">

                    @if (!empty($rowDetailPhoto))
                    <div class="grid-product">
                        @foreach ($rowDetailPhoto as $v)
                        <div class="box-album" data-fancybox="gallery"
                            data-src="{{ assets_photo('news', '710x440x1', $v['photo'], '') }}">
                            <div class="scale-img">
                                @component('component.image', [
                                'class' => 'w-100',
                                'w' => 390,
                                'h' => 300,
                                'z' => 1,
                                'breakpoints' => [
                                412 => 390,
                                ],
                                'is_watermarks' => false,
                                'destination' => 'product',
                                'image' => $v['photo'] ?? '',
                                'alt' => $rowDetail['name' . $lang] ?? '',
                                ])
                                @endcomponent
                            </div>
                        </div>
                        @endforeach
                    </div>
                    @endif
                </div>
            </div>
        </div>

        @if(!empty(config('type.comment')))
            <div class="py-3">
                @component('component.comment.comment', ['rowDetail' => $rowDetail])
                @endcomponent
            </div>
        @endif

        @if (!empty($product))
        <div class="title-main mb-3 mt-3"><span>Sản phẩm tương tự</span></div>
        <div class="swiper swiper-auto"
            data-swiper="slidesPerView:1|spaceBetween:10|breakpoints:{370: {slidesPerView:2,spaceBetween:10},575: {slidesPerView:2,spaceBetween:20},768: {slidesPerView:3,spaceBetween:20},992: {slidesPerView:4,spaceBetween:20}}|autoplay:{delay: 5000,pauseOnMouseEnter:true,disableOnInteraction:false}|speed:1000">
            <div
                class="swiper-wrapper row row-product row-cols-2 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 flex-nowrap g-2">
                @foreach ($product as $v)
                <div class="swiper-slide col">
                    @include('component.itemProduct', ['product' => $v])
                </div>
                @endforeach
            </div>
        </div>
        @endif

    </div>
</section>
@endsection

@push('styles')
<link rel="stylesheet" href="@asset('assets/magiczoomplus/magiczoomplus.css')">
@endpush
@push('scripts')
<script src="@asset('assets/magiczoomplus/magiczoomplus.js')"></script>
@endpush