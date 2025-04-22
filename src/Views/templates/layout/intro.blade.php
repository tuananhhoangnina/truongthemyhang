@extends('intro')
@section('content')
<div class="intro-deco intro-deco1">
   <img src="assets/images/intro-top-left.png" alt="intro-top-left.png">
</div>
<div class="intro-deco intro-deco2">
   <img src="assets/images/intro-top-right.png" alt="intro-top-right.png">
</div>
<div class="intro-deco intro-deco3">
   <img src="assets/images/intro-bottom-left.png" alt="intro-bottom-left.png">
</div>
<div class="intro-deco intro-deco4">
   <img src="assets/images/intro-bottom-right.png" alt="intro-bottom-right.png">
</div>
   <div class="intro-wrapper">
      <div class="wrap-content">
         <a class="intro-logo" href="">
            @component('component.image', [
               'class' => 'lazy',
               'w' => 144,
               'h' => 144,
               'destination' => 'photo',
               'image' => $logoPhoto['photo'] ?? '',
               'alt' => $logoPhoto['name' . $lang] ?? '',
            ])
            @endcomponent
         </a>
         <div class="intro-grid">
            @foreach ($intro as $v)
                <div>
                  <div class="intro-item">
                     <div class="intro-pic">
                        <a href="{{$v["link"]}}" class="d-block">
                           <span class="hover_sang3 scale-img">
                             <picture>
                                 <source media="(max-width: 640px)" srcset="{{ assets_photo('photo','490x185x1',$v['photo'],'thumbs') }}">
                                 @component('component.image', [
                                    'class' => 'w-100 lazy',
                                    'w' => 330,
                                    'h' => 430,
                                    'z' => 1,
                                    'destination' => 'photo',
                                    'image' => $v['photo'] ?? '',
                                    'alt' => $v['name' . $lang] ?? '',
                                 ])
                                 @endcomponent
                           </picture>
                           </span>
                        </a>
                     </div>
                     <div class="intro-info">
                        <h3 class="intro-name">
                           <a href="{{$v["link"]}}"> {{$v["name$lang"]}} </a>
                        </h3>
                        <a href="{{$v["link"]}}" class="intro-contact d-none">
                           <span>Liên hệ Ngay</span>
                        </a>
                     </div>
                  </div>
                </div>
            @endforeach
         </div>
      </div>
   </div>
@endsection 