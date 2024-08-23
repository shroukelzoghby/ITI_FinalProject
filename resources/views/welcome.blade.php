<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name') }}</title>

     <link rel="icon" href="{{ Vite::logo('Knowledge.png') }}">

    @vite([
        'resources/sass/app.scss',
        'resources/js/app.js',
        'resources/css/font-awesome.min.css',
        'resources/js/font-awesome.min.js'
    ])
</head>
<body>
    @include('nav')

    <main id="app">
        <section class="grid_1x2_1fr">
            <section class="flex-column">
                <div style="margin-top: 100px">
                    <x-h1>Welcome to Our</x-h1>
                    <x-h2>online bookstore</x-h2>
                    <x-h3>Please sign up here.</x-h3>
                </div>

                @auth
                    <a class="margin-block-20px" href="{{ route('home') }}">
                        <x-button.create>
                            Explore
                        </x-button>
                    </a>
                @else
                    <a class="margin-block-20px" href="{{ route('register') }}">
                        <x-button>
                            Sign up
                        </x-button>
                    </a>
                @endauth


            </section>
            <section>
                <img
                    class="landing-book-poster"
                    src="{{ Vite::image('logo/0.png') }}"
                    alt="Book"
                    draggable="false"
                />
            </section>
        </section>
    </main>

    @include('footer')
</body>
</html>
