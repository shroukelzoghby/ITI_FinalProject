@extends('layouts.app')

@section('title', "$name's Profile")

@section('content')
    <section class="flex profile__personal-info">
        <x-user.picture :picture="$picture" />

        <section class="user__info flex-column">
            <span class="user__name">{{ $name }}</span>
            <span class="user__role">{{ $title }}</span>
            <a class="a" href="mailto:{{ $email }}">
                <span class="user__email">{{ $email }}</span>
            </a>
        </section>

        <section class="flex-column user__edit-button__container">
            <a href="{{ route('user-edit', $id) }}">
                <x-button>
                    Edit
                </x-button>
            </a>
                @if (auth()->id()  === $id)

                    <div class="flex-center margin-top-auto margin-bottom-20px">
                        <a
                            class="a--red a--small width-fit-content"
                            href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                        >
                            Logout
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                </div>

            @endif

        </section>
    </section>

    @include('user.borrowed-books', $books)
@endsection

