<footer>
    <div class="footer-info">
        <div class="wrap-content">
            <div class="footer-flex">
                <div class="footer-box">
                    <a class="footer-logo" href="">
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
                     <div class="footer-desc text-split">
                        {!! Func::decodeHtmlChars($footer['desc' . $lang] ?? '') !!}
                     </div>

                    <ul class="social-ul">
                        @foreach ($social as $v)
                            <li>
                                <a href="{{$v["link"]}}" class="d-block">
                                    <img
                                        onerror="this.src='{{ thumbs('assets/images/noimage.png') }}';"
                                        src="{{ assets_photo('photo', '50x50x1', $v->photo,'thumbs') }}" alt="{{ $v->namevi }}">
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="footer-box">
                    <div class="footer-title"> Thông tin công ty </div>
                    <div class="footer-name">{{ $footer['name' . $lang] }}</div>
                    <div class="footer-content">
                        {!! Func::decodeHtmlChars($footer['content' . $lang] ?? '') !!}
                     </div>
                </div>
                <div class="footer-box">
                    <div class="footer-title">Google maps</div>
                    <div class="footer-map">
                        {!! Func::decodeHtmlChars($optSetting['coords_iframe'] ?? '') !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-powered">
        <div class="wrap-content">
            <p class="copyright  mb-0 text-center">{{ $setting['namevi'] }}. All rights reserved.</p>
        </div>
    </div>
</footer>