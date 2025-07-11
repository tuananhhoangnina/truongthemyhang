@extends('layout')
@section('content')

<div class="gioithieu-wrapper" >
    <div class="wrap-content">
      <div class="d-flex flex-wrap justify-content-between">
         <div class="gioithieu-box">
            <p class="gioithieu-title">Welcome to</p>
            <p class="gioithieu-name"> {{ $gioithieu["name$lang"] }} </p>
            <div class="gioithieu-desc text-split">{{ $gioithieu["desc$lang"] }}</div>
   
            <a href="gioi-thieu" class="gioithieu-btn hover_xemthem">
               <span>Xem thêm</span>
               <img src="assets/images/gt-btn.png" alt="gt-btn.png">
            </a>
         </div>
         <a href="" class="gioithieu-pic  d-block">
            @component('component.image', [
               'class' => 'lazy',
               'w' => 736,
               'h' => 674,
               'destination' => 'news',
               'image' => $gioithieu['photo'] ?? '',
               'alt' => $gioithieu['name' . $lang] ?? '',
            ])
            @endcomponent
         </a>
      </div>
      <div class="gioithieu-gallery">
         @foreach ($gioithieuPhotos as $v)
            <div class="gioithieu-img">
               <a href="gioi-thieu" class=" d-block w-100 h-100">
                  <span class="d-block w-100 h-100 scale-img">
                     <img 
                     class="w-100 h-100"
                     onerror="this.src='{{ thumbs('assets/images/noimage.png') }}';"
                     src="{{ assets_photo('news', '', $v->photo,'') }}" alt="{{ $v->namevi }}">
                  </span>
               </a>
            </div>
         @endforeach
      </div>
    </div>
</div>

@if($video->isNotEmpty())
    <div class="video-wrapper">
        <div class="wrap-content">
            <div class="video-swiper">
               <div class="swiper swiper-auto"
                  data-swiper="slidesPerView:1|spaceBetween:10|breakpoints:{370:{slidesPerView:1,spaceBetween:10},575:{slidesPerView:1,spaceBetween:20},768:{slidesPerView:1,spaceBetween:20},992:{slidesPerView:1,spaceBetween:20}}|autoplay:{delay:5000,pauseOnMouseEnter:true,disableOnInteraction:false}|speed:1000|navigation:{nextEl:'.-next',prevEl:'.-prev'}">
                  <div class="swiper-wrapper">
                     @foreach($video as $k => $v)
                        <div class="swiper-slide">
                           <div class="video-item">
                              <a class="" data-fancybox="video"
                              href="<?= Func::get_youtube_shorts($v['link'] ?? "") ?>"
                              >
                                 @component('component.image', [
                                    'class' => 'lazy',
                                    'w' => 1187,
                                    'h' => 579,
                                    'destination' => 'news',
                                    'image' => $v['photo'] ?? '',
                                    'alt' => $v['name' . $lang] ?? '',
                                 ])
                                 @endcomponent
                              </a>
                           </div>
                        </div>
                     @endforeach
                  </div>
               </div>
            </div>
        </div>
    </div>
@endif

@if($sukienHot->isNotEmpty())
    <div class="sukienHot-wrapper" style="overflow:hidden;">
        <div class="wrap-content">
            <div class="sukienHot-heading">
               <h2 class="sukienHot-title">
                  <span>
                     <span>Sự kiện nổi bật</span>
                  </span>
               </h2>
            </div>
            <p class="sukienHot-slogan"> {{$sukienSlogan["name$lang"]}} </p>

            <div class="d-flex flex-wrap justify-content-between">
               <div class="sukienHot-vertical">
                  <div class="swiper swiper-auto sukienHot-thumbs"
                     data-swiper="slidesPerView:1|spaceBetween:10|breakpoints:{370:{slidesPerView:2,spaceBetween:10},575:{slidesPerView:2,spaceBetween:20},768:{slidesPerView:3,spaceBetween:20},992:{slidesPerView:3,spaceBetween:20},1025:{slidesPerView:3,spaceBetween:20, direction:'vertical'}}
                     |autoplay:{delay:5000,pauseOnMouseEnter:true,disableOnInteraction:false}|speed:1000|navigation:{nextEl:'.-next',prevEl:'.-prev'}">
                     <div class="swiper-wrapper">
                        @foreach($sukienHot as $k => $v)
                           <div class="swiper-slide">
                              <div class="item">
                                 <div class="sukienHot-item">
                                    <img src="assets/images/sk-star.png" alt="sk-star.png">
                                       <h3 class="sukienHot-name"> {{$v["name$lang"]}}</h3>
                                 </div>
                              </div>
                           </div>
                        @endforeach
                     </div>
                  </div>
                  <div class="sukienHot-deco">
                     <img src="assets/images/sk-deco.png" alt="sk-deco.png">
                  </div>
               </div>
               <div class="sukienHot-horizontal">
                  <div class="swiper swiper-auto sukienHot-main"
                     data-swiper="slidesPerView:1|spaceBetween:10|breakpoints:{370:{slidesPerView:1,spaceBetween:10},575:{slidesPerView:1,spaceBetween:20},768:{slidesPerView:1,spaceBetween:20},992:{slidesPerView:1,spaceBetween:20}}|thumbs:{
                        swiper: '.sukienHot-thumbs',
                     }|autoplay:{delay:5000,pauseOnMouseEnter:true,disableOnInteraction:false}|speed:1000|navigation:{nextEl:'.sukienHot-next',prevEl:'.sukienHot-prev'}">
                     <div class="swiper-wrapper">
                        @foreach($sukienHot as $k => $v)
                           <div class="swiper-slide">
                              <div class="sukienHot-bg">
                                 <div class="sukienHot-border">
                                    <a href="{{$v["slug$lang"]}}" class="sukienHot-pic  scale-img hover_sang3">
                                       @component('component.image', [
                                          'class' => 'w-100 lazy',
                                          'w' => 740,
                                          'h' => 415,
                                          'destination' => 'news',
                                          'image' => $v['photo'] ?? '',
                                          'alt' => $v['name' . $lang] ?? '',
                                       ])
                                       @endcomponent
                                    </a>
                                 </div>
                                 <div class="sukienHot-bottom">
                                    <div class="sukienHot-info">
                                       <p class="sukienHot-name1">Đánh giá trên google</p>
                                       <p class="sukienHot-name2">Chương trình ưu đãi sốc</p>
                                    </div>
                                    <img src="assets/images/sk-sun.png" alt="sk-sun.png">
                                 </div>
                              </div>
                           </div>
                        @endforeach
                     </div>
                  </div>
                  <div class="sukienHot-prev">
                     <img src="assets/images/prev.png" alt="prev.png">
                  </div>
                  <div class="sukienHot-next">
                     <img src="assets/images/next.png" alt="next.png">
                  </div>
               </div>
            </div>
        </div>
    </div>
@endif

@if($albumHot->isNotEmpty())
    <div class="albumHot-wrapper" style="overflow:hidden;">
        <div class="wrap-content">
            <div class="title-main">
               <h2>HÌNH ẢNH KHÔNG GIAN</h2>
               <p class="slogan"> {{$albumSlogan["name$lang"]}} </p>
            </div>
            
            <div class="albumHot-grid">
               @foreach ($albumHot as $k => $v)
                  @php 
                     $thumb = [
                        '310x260x1',   
                        '440x340x1',   
                        '400x240x1',   
                        '300x280x1',   
                        '330x300x1',   
                        '380x360x1',   
                     ];
                  @endphp
                   <a href="{{$v["slug$lang"]}}" class="albumHot-pic albumHot{{$k}}  scale-img hover_sang2">
                     <img
                     class="w-100 h-100" style="object-fit:cover;"
                     onerror="this.src='{{ thumbs('assets/images/noimage.png') }}';"
                     src="{{ assets_photo('product', $thumb[$k], $v->photo,'thumbs') }}" alt="{{ $v->namevi }}">
                   </a>
               @endforeach
            </div>
        </div>
    </div>
@endif

<div class="monan-wrapper">
   <div class="wrap-content">
      <div class="monan-rocket">
         <img src="assets/images/monan-rocket.png" alt="monan-rocket.png">
         <div class="rocket-pos">
            <div class="rocket-flame">
              <div class="red flame"></div>
              <div class="orange flame"></div>
              <div class="yellow flame"></div>
              <div class="white flame"></div>
              <div class="blue circle"></div>
              <div class="black circle"></div>
            </div>
       </div>
      </div>
      <div class="monan-inner">
         <div class="monan-flex">
            <div class="monan-left">
               <div class="monan-vertical">
                  <div class="swiper swiper-auto monan-thumbs"
                     data-swiper="slidesPerView:1|spaceBetween:0|breakpoints:{370:{slidesPerView:1,spaceBetween:0},575:{slidesPerView:1,spaceBetween:0},768:{slidesPerView:1,spaceBetween:0},992:{slidesPerView:1,spaceBetween:0},1025:{slidesPerView:1,spaceBetween:0}}
                     |autoplay:{delay:5000,pauseOnMouseEnter:true,disableOnInteraction:false}|speed:1000|navigation:{nextEl:'.-next',prevEl:'.-prev'}">
                     <div class="swiper-wrapper">
                        @foreach($menumonan as $k => $v)
                           <div class="swiper-slide">
                              <div class="monan-pic">
                                 @component('component.image', [
                                    'class' => 'w-100 lazy',
                                    'w' => 750,
                                    'h' => 400,
                                    'destination' => 'photo',
                                    'image' => $v['photo'] ?? '',
                                    'alt' => $v['name' . $lang] ?? '',
                                 ])
                                 @endcomponent
                              </div>
                           </div>
                        @endforeach
                     </div>
                  </div>
               </div>
               <div class="monan-horizontal">
                  <div class="swiper swiper-auto monan-main"
                     data-swiper="slidesPerView:2|spaceBetween:10|breakpoints:{370:{slidesPerView:2,spaceBetween:10},575:{slidesPerView:2,spaceBetween:10},768:{slidesPerView:2,spaceBetween:10},992:{slidesPerView:2,spaceBetween:10}}|thumbs:{
                        swiper: '.monan-thumbs',
                     }|autoplay:{delay:5000,pauseOnMouseEnter:true,disableOnInteraction:false}|speed:1000|navigation:{nextEl:'.monan-next',prevEl:'.monan-prev'}">
                     <div class="swiper-wrapper">
                        @foreach($menumonan as $k => $v)
                           <div class="swiper-slide">
                              <a href="{{$v["slug$lang"]}}" class="monan-pic  scale-img hover_sang3">
                                 @component('component.image', [
                                    'class' => 'w-100 lazy',
                                    'w' => 320,
                                    'h' => 180,
                                    'destination' => 'photo',
                                    'image' => $v['photo'] ?? '',
                                    'alt' => $v['name' . $lang] ?? '',
                                 ])
                                 @endcomponent
                              </a>
                           </div>
                        @endforeach
                     </div>
                  </div>
               </div>
            </div>
            <div class="monan-right">
               <h2 class="monan-title">
                  <span> Menu món ăn </span>
               </h2>
               <h3 class="monan-name text-split"> {{$monanSlogan["name$lang"]}} </h3>
               <div class="monan-desc text-split"> 
                  {{$monanSlogan["desc$lang"]}}
               </div>
               <a href="mon-an" class="monan-btn gioithieu-btn hover_xemthem">
                  <span>Xem thêm</span>
                  <img src="assets/images/gt-btn.png" alt="gt-btn.png">
               </a>

               <div class="monan-sun_thucung">
                  <img src="assets/images/monan-sun_thucung.png" alt="monan-sun_thucung.png">
               </div>
            </div>
         </div>
         @if($douongHot->isNotEmpty())
            <div class="douongHot-flex d-flex flex-wrap justify-content-between">
               <div class="douongHot-info">
                  <h2 class="douongHot-title">
                     <span>ĐỒ ĂN</span>
                     <span>ĐỒ UỐNG</span>
                  </h2>
                  <div class="douongHot-pagin">
                     <div class="custom-counter">
                        <span id="current-slide">1</span> 
                        <div class="total">
                           <span class="slash"> / </span>
                           <span id="total-slides"></span>
                        </div>
                     </div>
                     <div class="douongHot-arrow">
                        <div class="douongHot-prev"><img src="assets/images/prev.png" alt="prev.png"></div>
                        <div class="douongHot-next"><img src="assets/images/next.png" alt="next.png"></div>
                     </div>
                  </div>
               </div>
               <div class="douongHot-slick">
                  @foreach($douongHot as $k => $v)
                     <div>
                        @component('component.itemProduct', ['product' => $v])
                        @endcomponent
                     </div>
                  @endforeach
               </div>
            </div>
         @endif
      </div>
   </div>
</div>

@if($newsHot->isNotEmpty())
    <div class="newsHot-wrapper">
      <div class="wrap-content">
         <div class="title-main">
            <h2>TIN TỨC</h2>
            <p class="slogan"> {{$albumSlogan["name$lang"]}} </p>
         </div>
         
         <div class="newsHot-flex d-flex flex-wrap justify-content-between">
            <div class="newsHot-swiper">
               <div class="swiper swiper-auto"
                  data-swiper="slidesPerView:2|spaceBetween:10|breakpoints:{370:{slidesPerView:2,spaceBetween:10},575:{slidesPerView:2,spaceBetween:20},768:{slidesPerView:2,spaceBetween:20},992:{slidesPerView:2,spaceBetween:20},1025:{slidesPerView:2,spaceBetween:30, direction:'vertical'}}|autoplay:{delay:5000,pauseOnMouseEnter:true,disableOnInteraction:false}|speed:1000|navigation:{nextEl:'.-next',prevEl:'.-prev'}">
                  <div class="swiper-wrapper">
                     @foreach($newsHot as $k => $v)
                        <div class="swiper-slide">
                           <div class="item">
                              @component('component.itemNews', ['news' => $v])
                              @endcomponent
                           </div>
                        </div>
                     @endforeach
                  </div>
               </div>
            </div>

            <div class="bannerQC-pic">
               <a href="{{$bannerQC["link"]}}">
                  @component('component.image', [
                     'class' => 'w-100 lazy',
                     'w' => 580,
                     'h' => 520,
                     'destination' => 'photo',
                     'image' => $bannerQC['photo'] ?? '',
                     'alt' => $bannerQC['name' . $lang] ?? '',
                  ])
                  @endcomponent
               </a>
            </div>
         </div>
      </div>
    </div>
@endif


@if($feedback->isNotEmpty())
    <div class="feedback-wrapper" style="overflow:hidden;">
        <div class="wrap-content">
            <div class="title-main">
               <h2>Feedback khách hàng</h2>
               <p class="slogan text-dark"> {{$feedbackSlogan["name$lang"]}} </p>
            </div>
            
            <div class="feedback-slick custom-pagin">
               @foreach($feedback as $k => $v)
                  <div>
                     <div class="feedback-item">
                        <div class="feedback-box">
                           <p class="feedback-content text-split">
                              {{$v["content$lang"]}}
                           </p>
                           <div class="feedback-flex d-flex flex-wrap justify-content-between">
                              <div class="feedback-pic">
                                 @component('component.image', [
                                    'class' => 'w-100 h-100',
                                    'w' => 84,
                                    'h' => 84,
                                    'destination' => 'news',
                                    'image' => $v['photo'] ?? '',
                                    'alt' => $v['name' . $lang] ?? '',
                                 ])
                                 @endcomponent
                              </div>
                              <div class="feedback-info">
                                 <h3 class="feedback-name"> {{$v["name$lang"]}} </h3>
                                 <p class="feedback-desc"> {{$v["desc$lang"]}} </p>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               @endforeach
               <div class="feedback-prev">
                  <img src="assets/images/prev.png" alt="prev.png">
               </div>
               <div class="feedback-next">
                  <img src="assets/images/next.png" alt="next.png">
               </div>
            </div>
        </div>
    </div>
@endif

<div class="newsletter-bg">
   <div class="newsletter-wrapper">
      <div class="wrap-content">
         <div class="newsletter-pic">
               @component('component.image', [
                  'class' => 'w-100 lazy',
                  'w' => 669,
                  'h' => 500,
                  'destination' => 'photo',
                  'image' => $nhantinQC['photo'] ?? '',
                  'alt' => $nhantinQC['name' . $lang] ?? '',
               ])
               @endcomponent
         </div>
   
         <div class="newsletter-box">
            <div class="newsletter-inner">
               <h2 class="newsletter-title">
                  <img src="assets/images/letter.png" alt="letter.pngs">
                  <span>Đăng ký tư vấn</span>
               </h2>
               <p class="newsletter-slogan">
                  Hãy để lại thông tin của bạn bên dưới để nhân viên chúng tôi liên hệ đặt lịch hẹn tư vấn chúng tôi!
               </p>
               <form id="form-newsletter" class="newsletter-form validation-newsletter"
                  novalidate method="POST" action="{{ url('letter') }}"
                  enctype="multipart/form-data">
                  <div class="newsletter-input">
                     <div class="form-floating form-floating-cus">
                        <input type="text" name="dataNewsletter[fullname]" class="form-control text-sm"
                              id="fullname-newsletter" placeholder="Họ & tên" required>
                        <label for="fullname-newsletter">Họ & tên</label>
                     </div>
                  </div>
               
                  <div class="newsletter-input">
                     <div class="form-floating form-floating-cus">
                        <input type="number" name="dataNewsletter[phone]" class="form-control text-sm" id="phone-newsletter"
                              placeholder="Điện thoại" required>
                        <label for="phone-newsletter">Điện thoại</label>
                     </div>
                  </div>
                  <div class="newsletter-input">
                     <div class="form-floating form-floating-cus">
                        <input type="email" name="dataNewsletter[email]" class="form-control text-sm" id="email-newsletter"
                              placeholder="Email" required>
                        <label for="email-newsletter">Email</label>
                     </div>
                  </div>
                  <div class="newsletter-input">
                     <div class="form-floating form-floating-cus">
                        <input type="text" name="dataNewsletter[address]" class="form-control text-sm" id="address-newsletter"
                           placeholder="Địa chỉ" required>
                        <label for="address-newsletter">Địa chỉ</label>
                     </div>
                  </div>
                  <div class="newsletter-textarea">
                     <div class="form-floating form-floating-cus">
                        <textarea class="form-control text-sm" id="content-newsletter" name="dataNewsletter[content]"
                              placeholder="Yêu cầu"></textarea>
                        <label for="content-newsletter">Yêu cầu</label>
                     </div>
                  </div>
               
                  <div class="newsletter-button">
                     <div>
                        <input type="hidden" name="csrf_token" value="{{ csrf_token() }}">
                        <input type="submit" class="" name="submit-newsletter" value="Đăng ký ngay"/>
                        <input type="hidden" class="" name="dataNewsletter[type]" value="dang-ky-nhan-tin" />
                        <input type="hidden" name="recaptcha_response_newsletter" id="recaptchaResponseNewsletter">
                     </div>
                  </div>
               </form>    
            </div>
         </div>
      </div>
   </div>
</div>

@endsection