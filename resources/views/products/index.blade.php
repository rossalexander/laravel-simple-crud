<x-app-layout>
    <div class="space-y-4">
        @foreach($products as $product)
            <div>
                <h2 class="text-xl font-semibold">{{$product->name}}</h2>
                <p>${{$product->formatted_price}}</p>
            </div>
        @endforeach
    </div>
</x-app-layout>
