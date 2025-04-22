<header class="header-wrapper">
    <div class="header-top">
        <div class="wrap-content">
            <p class="header-slogan"> {{$sloganHeader["name$lang"]}} </p>
    
            <ul class="social-ul">
                @foreach ($social as $v)
                    <li>
                        <a href="{{$v["link"]}}" class="d-block">
                            <img src="{{ assets_photo('photo', '', $v->photo) }}" alt="{{ $v->namevi }}">
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
    <div class="header-bottom">
        <div class="wrap-content">
            <div id="hamburger" data-bs-toggle="offcanvas" data-bs-target="#menu-mobile"><span></span></div>
            <div class="header-logo">
                <a class="d-block" href="">
                    @component('component.image', [
                        'class' => 'lazy',
                        'w' => 80,
                        'h' => 80,
                        'destination' => 'photo',
                        'image' => $logoPhoto['photo'] ?? '',
                        'alt' => $logoPhoto['name' . $lang] ?? '',
                    ])
                    @endcomponent
                </a>
                <span> {{$logoPhoto->namevi}} </span>
            </div>
            <div class="header-banner">
                @component('component.image', [
                    'class' => 'lazy',
                    'w' => 590,
                    'h' => 97,
                    'destination' => 'photo',
                    'image' => $bannerPhoto['photo'] ?? '',
                    'alt' => $bannerPhoto['name' . $lang] ?? '',
                ])
                @endcomponent
            </div>
            <div class="header-hotline">
                <img src="assets/images/phone.png" alt="phone.png">
                <div class="info">
                    <p>Hotline 24/7</p>
                    <b> {{$optSetting["hotline"]}} </b>
                    <b> {{$optSetting["phone"]}} </b>
                </div>
            </div>

            <div class="search">
                <input type="text" id="keyword" class="search-auto flex-1"
                    placeholder="Tên sản phẩm" onkeypress="doEnter(event,'keyword');">
                <label for="keyword" class="mb-0" onclick="onSearch('keyword');">Tìm </label>
            </div>
            <a href="gio-hang" class="cart-head">
                <i class="fa-solid fa-cart-shopping mr-5"></i> 
                <span class="text-cart">Giỏ hàng</span> 
                <span class="count-cart">{{ Cart::count() }}</span>
            </a>
        </div>
    </div>
</header>