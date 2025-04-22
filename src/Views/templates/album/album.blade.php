@extends('layout')
@section('content')
<section>
    <div class="max-width py-3">
        <div class="title-detail">
            <h1>{{ $titleMain }}</h1>
        </div>

        @if ($product->isNotEmpty() && !empty($idList))
            <ul class="albumList-ul" >
                @foreach ($product as $v)
                    <li >
                        <a class="{{ @$idList == $v['id']  ? 'active' : '' }}" href="{{$v["slug$lang"]}}">{{ $v["name$lang"] }}</a>
                    </li>
                @endforeach
            </ul>
        @endif
        <div class="d-flex flex-wrap justify-content-between">
            <div class="sanpham-right">
                @if (!empty($product))
                    <div class="grid-product">
                        @foreach ($product as $k => $v)
                            @php $time = 0; $time += $k/2 +  0.5;  @endphp
                            <div class="albumHot-item">
                                <a href="{{$v["slug$lang"]}}" class="albumHot-img">
                                    <img onerror="this.src='{{thumbs('thumbs/340x450x1/assets/images/noimage.png')}}';" src="{{ assets_photo('product', '340x450x1', $v->photo,'thumbs') }}" alt="{{ $v->name }}">
                                </a>
                                <h3 class="albumHot-name"><a href="{{$v["slug$lang"]}}">
                                    {{$v["name$lang"]}}    
                                </a></h3>
                            </div>
                        @endforeach
                    </div>
                @endif
                {!! $product->appends(request()->query())->links() !!}
            </div>
        </div>
    </div>
</section>
@endsection
