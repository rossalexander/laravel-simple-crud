<x-app-layout>
    <h1>{{$product->name}}</h1>
    <p>${{$product->formatted_price}}</p>

    @auth()
        <form action="{{route('product.review.store', $product)}}" method="post" class="inline-flex flex-col space-y-2">
            @csrf
            <h2>Leave a review</h2>
            <textarea name="review" id="review" cols="30" rows="10" class="bg-gray-100 border"></textarea>
            <button type="submit"
                    class="bg-blue-500 px-2 py-1 text-white rounded hover:bg-blue-400 transition-colors">
                Add review
            </button>
        </form>
    @endauth

    <div>
        <h3 class="font-semibold">Reviews</h3>
        @foreach($reviews as $review)
            <div class="my-4 mb-4 bg-gray-50 border w-full">
                {{$review->user->name}} said
                {{$review->review}}
                @if($review->user === auth()->user())
                    test
                @endif
            </div>
        @endforeach
    </div>

    <a href="{{route('product.index')}}">Back</a>
</x-app-layout>
