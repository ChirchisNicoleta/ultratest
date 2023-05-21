<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    @vite('resources/css/app.css')
    @livewireStyles
</head>

<body class="container">
<div>
    <nav class="bg-black text-white">
        @if (Route::has('login'))
            <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block bg-blue-100">
            @auth
                <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}" x-data>
                        @csrf

                        <input type="submit" value="{{ __('Log Out') }}"/>

                    </form>
                @else
                    <a href="{{ route('login') }}" class="text-sm text-gray-700 underline text-xl">Log in</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                           class="ml-4 text-sm text-gray-700 underline text-xl">Register</a>
                    @endif
                @endauth
            </div>
        @endif
    </nav>

    <section>
        @foreach($products as $product)
            <div class="flex border font-serif">
                <div class="flex-none w-52 relative">
                    <img src="{{url('storage/'.$product['product_photo_path'])}}" alt="{{$product['title']}}"
                         class="absolute inset-0 w-full h-full object-cover rounded-lg" loading="lazy"/>
                </div>
                <div class="flex-auto p-6">
                    <div class="flex flex-col flex-wrap items-baseline">
                        <h1 class="w-full flex-none mb-3 text-2xl leading-none text-slate-900">
                            {{$product['title']}}
                        </h1>
                        <p class="text-xl">{{$product['brand']}}</p>
                        <p>Description: {{$product['description']}}</p>
                        <div class="flex-auto text-lg font-medium text-slate-500">
                            Price: {{$product['price']}} MDL
                        </div>
                    </div>

                    @livewire('cart-button', ['productId' => $product['id']])

                </div>
            </div>
        @endforeach
    </section>
</div>
@livewireScripts
</body>
</html>
