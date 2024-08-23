@extends('layouts.app')

@section('title', 'Register')

@section('content')
    <x-h1 class="width-full flex-center margin-bottom-40px">Register</x-h1>

    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
        @csrf

        <section class="flex-center flex-column">
            <div class="flex-column width-368px">
                <x-label class="margin-bottom-7px">Profile Picture</x-label>
                <x-input.picture name="picture" class="flex-center margin-inline-auto width-200px" value="{{ old('picture') }}">
                    Choose Picture
                </x-input.picture>

                @error('picture')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="flex-column margin-top-20px">
                <x-label class="margin-bottom-7px" required>Name</x-label>
                <x-input.text placeholder="Fullname" name="name" value="{{ old('name') }}"/>

                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="flex-column margin-top-20px">
                <x-label class="margin-bottom-7px" required>Email</x-label>
                <x-input.email placeholder="Email" name="email" value="{{ old('email') }}"/>

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="flex-column margin-top-20px">
                <x-label class="margin-bottom-7px" required>Password</x-label>
                <x-input.password placeholder="Password" name="password" />

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="flex-column margin-top-20px">
                <x-label class="margin-bottom-7px" required>Confirm Password</x-label>
                <x-input.password id="password-confirm" class="form-control" name="password_confirmation" required autocomplete="new-password" />
            </div>

                <div class="col-md-6">
                </div>
            </div>

            <x-button.create type="submit" class="margin-top-40px">
                Register
            </x-button.create>
        </section>
    </form>
@endsection
