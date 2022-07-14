<x-app-layout>
    <h1 class="font-semibold">Sign in</h1>
    <div class="flex">
        <form action="/login" method="post" class="flex flex-col">
            @csrf
            <label for="email" class="sr-only">Email address</label>
            <input type="email" name="email" id="email" placeholder="Email address" class="bg-gray-100 border">
            <label for="password" class="sr-only">Password</label>
            <input type="password" name="password" id="password" placeholder="Password" class="bg-gray-100 border">
            <button type="submit">Sign in</button>
        </form>
    </div>
</x-app-layout>
