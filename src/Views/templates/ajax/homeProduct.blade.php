@if ($productAjax->isNotEmpty())
    
        <div class="grid-product">
            @foreach ($productAjax as $v)
                @include('component.itemProduct', ['product' => $v])
            @endforeach
        </div>
        {!! $productAjax->appends(request()->query())->links('pagination.paging-ajax') !!}
  
@endif
