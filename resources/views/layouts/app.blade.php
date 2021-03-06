<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{config('app.name')}}</title>
    @vite('resources/css/app.css')
</head>
<body class="antialiased">

<div class="p-4">
    <nav>
        <a href="{{route('product.index')}}">Products</a>
    </nav>
    @if (Route::has('login'))
        <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
            @auth
                <a href="{{ url('/') }}" class="text-sm text-gray-700 underline">Home</a>
                <form action="/logout" method="post">
                    @csrf
                    <button>Log out</button>
                </form>
            @else
                <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Log in</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>
                @endif
            @endauth
        </div>
    @endif
    <main class="mx-auto max-w-4xl items-center justify-center flex flex-col">
        {{$slot}}
    </main>
</div>
</body>
</html>
