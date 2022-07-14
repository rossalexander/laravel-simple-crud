<x-app-layout>
    <div class="space-y-4">
        @foreach($products as $product)
            <div>
                <h2 class="text-xl font-semibold"><a href="{{route('product.show', [$product])}}">{{$product->name}}</a></h2>
                <p>${{$product->formatted_price}}</p>
            </div>
        @endforeach
    </div>
</x-app-layout>
