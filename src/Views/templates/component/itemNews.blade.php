<div class="newsHot-item">
    <a href="{{$news["slug$lang"]}}" class="newsHot-pic d-block hover_sang3">
        @component('component.image', [
            'class' => 'w-100 lazy',
            'w' => 540,
            'h' => 540,
            'z' => 1,
            'is_watermarks' => false,
            'destination' => 'news',
            'image' => $news['photo'] ?? '',
            'alt' => $news['name' . $lang] ?? '',
        ])
        @endcomponent
    </a>
    <div class="newsHot-info">
        <div class="newsHot-deco">
            <b>Tin tức MiaTown</b>
            <span> {{date("d/m/Y", $news["date_created"])}} </span>
        </div>
        <h3 class="newsHot-name">
            <a class="text-split" href="{{$news["slug$lang"]}}">  {{$news["name$lang"]}} </a>
        </h3>
        <div class="newsHot-desc text-split"> {{$news["desc$lang"]}} </div>
        <a href="{{$news["slug$lang"]}}" class="newsHot-btn hover_xemthem"> 
            <span>/ Xem chi tiết</span> 
            <img src="assets/images/tt-btn.png" alt="tt-btn.png">
        </a>
    </div>
</div>
