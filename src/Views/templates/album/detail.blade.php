@extends('layout')
@section('content')
<section>
    <div class="max-width py-3">
        <div class="title-detail">
            <h1>{{ $rowDetail["name$lang"] }}</h1>
        </div>

        <div class="d-flex flex-wrap justify-content-between">
            <div class="sanpham-right">
                @if (!empty($rowDetailAlbum))
                    <div class="grid-product">
                        @foreach ($rowDetailAlbum as $k => $v)
                            @php $time = 0; $time += $k/2 +  0.5;  @endphp
                            <div class="albumHot-item">
                                <a 
                                data-fancybox="album"
                                href="{{ assets_photo('product', '', $v->photo,'') }}" class="albumHot-pic">
                                    <img onerror="this.src='{{thumbs('thumbs/340x450x1/assets/images/noimage.png')}}';" src="{{ assets_photo('product', '340x450x1', $v->photo,'thumbs') }}" alt="{{ $v->name }}">
                                </a>
                                <h3 class="albumHot-name"><a href="{{$v["slug$lang"]}}">
                                    {{$v["name$lang"]}}    
                                </a></h3>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </div>
</section>
@endsection
