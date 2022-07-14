<x-app-layout>
    <h1>{{$product->name}}</h1>
    <p>${{$product->formatted_price}}</p>
    <a href="{{route('product.index')}}">Back</a>
</x-app-layout>
