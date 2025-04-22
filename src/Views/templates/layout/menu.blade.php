<div class="menu-wrapper">
     <div class="wrap-content">
        <div id="hamburger" data-bs-toggle="offcanvas" data-bs-target="#menu-mobile"><span></span></div>
        <a class="header-logo" href="">
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

        <nav class="menu">
            <ul class="flex flex-wrap items-center justify-between ulmn">
                <li><a class="transition active" href="{{ url('home') }}" title="Trang chủ">Trang chủ</a></li>
                <li><a class="transition {{ ($com ?? '') == 'gioi-thieu' ? 'active' : '' }}" href="{{ url('gioi-thieu') }}"
                        title="Giới thiệu">Giới thiệu</a></li>
                
                <li class="group"><a class="transition  {{ ($com ?? '') == 'video' ? 'active' : '' }}" href="{{ url('video') }}" title="Video">Video</a></li>
    
                <li class="group">
                        <a class="transition  {{ ($com ?? '') == 'dich-vu' ? 'active' : '' }}" href="{{ url('dich-vu') }}" title="Dịch vụ">Dịch vụ</a>
                        <ul>
                                @foreach ($dichvuListMenu as $vlist)
                                    <li>
                                        <a class="transition" href="{{$vlist["slug$lang"]}}">
                                                {{$vlist["name$lang"]}}
                                        </a>
                                    </li>
                                @endforeach
                        </ul>
                </li>
    
                <li class="group"><a class="transition  {{ ($com ?? '') == 'thu-vien-anh' ? 'active' : '' }}" href="{{ url('thu-vien-anh') }}"
                        title="Không gian">Không gian</a></li>

                <li class="group"><a class="transition  {{ ($com ?? '') == 'su-kien' ? 'active' : '' }}" href="{{ url('su-kien') }}"
                        title="Sự kiện">Sự kiện</a></li>

                <li class="group"><a class="transition  {{ ($com ?? '') == 'uu-dai' ? 'active' : '' }}" href="{{ url('uu-dai') }}"
                title="Ưu đãi">Ưu đãi</a></li>

                <li class="group">
                        <a class="transition  {{ ($com ?? '') == 'san-pham' ? 'active' : '' }}" href="{{ url('san-pham') }}" title="Sản phẩm">Sản phẩm</a>
                        <ul>
                                @foreach ($productListMenu as $vlist)
                                        <li>
                                                <a class="transition" href="{{$vlist["slug$lang"]}}">
                                                        {{$vlist["name$lang"]}}
                                                </a>
                                        </li>
                                @endforeach
                        </ul>
                </li>                      

                <li class="group"><a class="transition  {{ ($com ?? '') == 'tin-tuc' ? 'active' : '' }}"
                        href="{{ url('tin-tuc') }}" title="Tin tức">Tin tức</a></li>
                <li class="group"><a class="transition  {{ ($com ?? '') == 'lien-he' ? 'active' : '' }}"
                        href="{{ url('lien-he') }}" title="Liên hệ">Liên hệ</a></li>
            </ul>
        </nav>
    </div>
</div>