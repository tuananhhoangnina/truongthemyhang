<div class="slideshow">
    <div class="swiper swiper-auto"
        data-swiper="autoplay:{delay: 5000,pauseOnMouseEnter:true,disableOnInteraction:false}|speed:1000|loop:true|navigation:{nextEl:'.-next',prevEl:'.-prev'}|effect:'fade'|fadeEffect: {crossFade: true}">
        <div class="swiper-wrapper">
            @foreach ($slider as $k => $v)
                <div class="swiper-slide">
                    <a class="slideshow-item position-relative"
                        href="{{ $v['link'] }}" title="{{ $v['name'.$lang] }}">
                        @component('component.image', [
                            'class' => 'w-100',
                            'w' => 1920,
                            'h' => 860,
                            'z' => 1,
                            'is_watermarks' => false,
                            'destination' => 'photo',
                            'image' => $v['photo'] ?? '',
                            'alt' => $v['name'.$lang] ?? '',
                        ])
                        @endcomponent
                    </a>
                </div>
            @endforeach
        </div>
        <div class="swiper-pagination -pagination"></div>
        <div class="swiper-button-prev -prev"></div>
        <div class="swiper-button-next -next"></div>
    </div>
</div>