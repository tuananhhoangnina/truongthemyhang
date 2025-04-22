<div class="douongHot-item">
    <div class="douongHot-pic">
        <a class="scale-img block" href="{{ $product["slug$lang"] }}" title="{{ $product['name' . $lang] }}">
            @component('component.image', [
                'class' => 'w-100',
                'w' => 360,
                'h' => 360,
                'z' => 1,
                'destination' => 'product',
                'image' => $product['photo'] ?? '',
                'alt' => $product['name' . $lang] ?? '',
            ])
            @endcomponent
        </a>
    </div>
</div>