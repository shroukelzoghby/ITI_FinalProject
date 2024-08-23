@php
    $url = Request::url();

    $homeActive     = $url === route('home');
    $profileActive  = $url === route('profile');

    $links = [
        [
            'name' => 'Home',
            'route' => 'home',
            'active' => $homeActive
        ],
        [
            'name' => 'Profile',
            'route' => 'profile',
            'active' => $profileActive
        ],

    ];
@endphp



<nav class="nav">
   <a href="/" class="nav__left" draggable="false">
        <x-logo />
    </a>


    @if (Route::has('login'))
        @auth
            <div class="nav__right nav__elem--floor" style="margin-bottom: 20px">
                @foreach($links as $link)
                    <a class="nav__a {{ $link['active'] ? 'nav__a--active' : '' }}" href="{{ route($link['route']) }}">
                        {{ $link['name'] }}
                    </a>
                @endforeach
                @admin
                    <a class="nav__a" href="{{ route('users.index') }}">
                        Dashboard
                    </a>
                @endadmin
            </div>
        @else
            <div class="nav__right nav__elem--ceil">
                <a class="nav__a" href="{{ route('login') }}">Log in</a>

                @if (Route::has('register'))
                    <a class="nav__a" href="{{ route('register') }}">Register</a>
                @endif
            </div>
        @endauth
    @endif
</nav>

