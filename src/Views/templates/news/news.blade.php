@extends('layout')
@section('content')
    <section>
        @if ($news->isNotEmpty())
            <div class="wrap-content py-3">
                <div class="title-detail"><h1>{{$titleMain}}</h1></div>
                <div class="grid-news">
                    @foreach ($news as $k => $v)
                        @component('component.itemNews', ['news' => $v])
                            <p class="desc-news line-clamp-3 mt-1">{{ $v['desc'.$lang] }}</p>
                        @endcomponent
                    @endforeach
                </div>
                {!! $news->links() !!}
            </div>
        @endif
    </section>
@endsection