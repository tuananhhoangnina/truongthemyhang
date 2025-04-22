<div class="offcanvas offcanvas-start" id="menu-mobile">
    <div class="offcanvas-body">
        <span class="btn-close btn-close-menu" data-bs-dismiss="offcanvas"></span>
        <nav class="menu-mobile">
            <div class="head-menu">
                <a class="logo-header" href="">
                    <img src="{{ assets_photo('photo', '', $logoPhoto['photo']) }}"
                        alt="{{ $setting['name' . $lang] }}">
                </a>
                <div class="search-menu">
                    <label for="keyword-mobile" class="mb-2">Bạn cần tìm sản phẩm gì</label>
                    <div class="form-floating form-floating-cus">
                        <input type="text" id="keyword-mobile" class="" placeholder="Bạn cần tìm sản phẩm gì"
                            onkeypress="doEnter(event,'keyword-mobile');">
                    </div>
                    <p class="mb-0" onclick="onSearch('keyword-mobile');"><i class="fal fa-search"></i></p>
                </div>
            </div>
            <ul>
                <li><a class="transition {{ ($com ?? '') == 'home' ? 'active' : '' }}" href="{{ url('home') }}" title="Trang chủ"><i class="fa-solid fa-house"></i> Trang chủ</a></li>
                
                <li>
                    <a class="transition {{ ($com ?? '') == 'gioi-thieu' ? 'active' : '' }}" href="{{ url('gioi-thieu') }}" title="Giới thiệu"><i class="fa-solid fa-address-card"></i> Giới thiệu</a>
                </li>
                
                <li>
                    <a class="transition {{ ($com ?? '') == 'video' ? 'active' : '' }}" href="{{ url('video') }}" title="Video"><i class="fa-solid fa-video"></i> Video</a>
                </li>
            
                <li>
                    <a class="transition {{ ($com ?? '') == 'dich-vu' ? 'active' : '' }}" href="{{ url('dich-vu') }}" title="Dịch vụ"><i class="fa-solid fa-concierge-bell"></i> Dịch vụ</a>
                    <span data-bs-toggle="collapse" data-bs-target="#menu-dichvu" class="scroll"><i class="ml-auto fa-solid fa-angle-right"></i></span>
                    <ul class="collapse" id="menu-dichvu">
                        @foreach ($dichvuListMenu ?? [] as $vlist)
                            <li>
                                <a href="{{ $vlist['slug'.$lang] }}" title="{{ $vlist['name'.$lang] }}">{{ $vlist['name'.$lang] }}</a>
                            </li>
                        @endforeach
                    </ul>
                </li>
            
                <li>
                    <a class="transition {{ ($com ?? '') == 'thu-vien-anh' ? 'active' : '' }}" href="{{ url('thu-vien-anh') }}" title="Không gian"><i class="fa-solid fa-image"></i> Không gian</a>
                </li>
            
                <li>
                    <a class="transition {{ ($com ?? '') == 'su-kien' ? 'active' : '' }}" href="{{ url('su-kien') }}" title="Sự kiện"><i class="fa-solid fa-calendar-days"></i> Sự kiện</a>
                </li>
            
                <li>
                    <a class="transition {{ ($com ?? '') == 'uu-dai' ? 'active' : '' }}" href="{{ url('uu-dai') }}" title="Ưu đãi"><i class="fa-solid fa-gift"></i> Ưu đãi</a>
                </li>
            
                <li>
                    <a class="transition {{ ($com ?? '') == 'san-pham' ? 'active' : '' }}" href="{{ url('san-pham') }}" title="Sản phẩm"><i class="fa-brands fa-product-hunt"></i> Sản phẩm</a>
                    <span data-bs-toggle="collapse" data-bs-target="#menu-product" class="scroll"><i class="ml-auto fa-solid fa-angle-right"></i></span>
                    <ul class="collapse" id="menu-product">
                        @foreach ($productListMenu ?? [] as $vlist)
                            <li>
                                <a href="{{ $vlist[$sluglang] }}" title="{{ $vlist['name' . $lang] }}">{{ $vlist['name' . $lang] }}</a>
                                @if ($vlist->getCategoryCats->isNotEmpty())
                                    <span data-bs-toggle="collapse" data-bs-target="#product-list-{{$vlist['id']}}" class="scroll"><i class="ml-auto fa-solid fa-angle-right"></i></span>
                                    <ul class="collapse" id="product-list-{{$vlist['id']}}">
                                        @foreach ($vlist->getCategoryCats as $vcat)
                                            <li>
                                                <a href="{{ $vcat[$sluglang] }}" title="{{ $vcat['name' . $lang] }}">{{ $vcat['name' . $lang] }}</a>
                                                @if ($vcat->getCategoryItems->isNotEmpty())
                                                    <span data-bs-toggle="collapse" data-bs-target="#product-cat-{{$vcat['id']}}" class="scroll"><i class="ml-auto fa-solid fa-angle-right"></i></span>
                                                    <ul class="collapse" id="product-cat-{{$vcat['id']}}">
                                                        @foreach ($vcat->getCategoryItems as $vitem)
                                                            <li>
                                                                <a class="item" href="{{ $vitem[$sluglang] }}" title="{{ $vitem['name' . $lang] }}">{{ $vitem['name' . $lang] }}</a>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                @endif
                                            </li>
                                        @endforeach
                                    </ul>
                                @endif
                            </li>
                        @endforeach
                    </ul>
                </li>
            
                <li>
                    <a class="transition {{ ($com ?? '') == 'tin-tuc' ? 'active' : '' }}" href="{{ url('tin-tuc') }}" title="Tin tức"><i class="fa-solid fa-newspaper"></i> Tin tức</a>
                </li>
            
                <li>
                    <a class="transition {{ ($com ?? '') == 'lien-he' ? 'active' : '' }}" href="{{ url('lien-he') }}" title="Liên hệ"><i class="fa-solid fa-address-book"></i> Liên hệ</a>
                </li>
            </ul>
            
            <div class="company">
                <p>Địa chỉ: <span>{{$setting['address' . $lang]}}</span></p>
                <p>Điện thoại: <span>{{$optSetting['hotline']}}</span></p>
                <p>Email: <span>{{$optSetting['email']}}</span></p>
                <p>Website: <span>{{$optSetting['website']}}</span></p>
            </div>
        </nav>
    </div>
</div>