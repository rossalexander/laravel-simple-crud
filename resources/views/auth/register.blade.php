<x-app-layout>
    <h1 class="font-semibold">Sign in</h1>
    <div class="flex">
        @if($errors)
            @foreach($errors as $error)
                <p>{{$error}}</p>
            @endforeach
        @endif
        <form action="/login" method="post" class="flex flex-col">
            @csrf
            <label for="name" class="sr-only">Name</label>
            <input type="text" name="name" id="name" placeholder="Name" class="bg-gray-100 border">

            <label for="email" class="sr-only">Email address</label>
            <input type="email" name="email" id="email" placeholder="Email address" class="bg-gray-100 border">

            <label for="password" class="sr-only">Password</label>
            <input type="password" name="password" id="password" placeholder="Password" class="bg-gray-100 border">

            <label for="password_confirmation" class="sr-only">Password confirmation</label>
            <input type="password" name="password_confirmation" id="password_confirmation"
                   placeholder="Confirm password" class="bg-gray-100 border">

            <button type="submit">Register</button>
        </form>
    </div>
</x-app-layout>
