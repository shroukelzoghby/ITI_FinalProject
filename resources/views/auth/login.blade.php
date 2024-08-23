@extends('layouts.app')

@section('title', 'Login')

@section('content')
    <x-h1 class="width-full flex-center margin-bottom-40px">Login</x-h1>

    <form method="POST" action="{{ route('login') }}">
            @csrf

        <section class="flex-center flex-column">
            <div class="flex-column margin-top-20px">
                <x-label class="margin-bottom-7px" required>Email</x-label>
                <x-input.email placeholder="Email" name="email" />

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

            {{-- <div class="row mb-3"> --}}
            {{--     <div class="col-md-6 offset-md-4"> --}}
            {{--         <div class="form-check"> --}}
            {{--             <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}> --}}

            {{--             <label class="form-check-label" for="remember"> --}}
            {{--                 {{ __('Remember Me') }} --}}
            {{--             </label> --}}
            {{--         </div> --}}
            {{--     </div> --}}
            {{-- </div> --}}

            <x-button.create type="submit" class="margin-top-40px">
                Login
            </x-button.create>

                    {{-- @if (Route::has('password.request')) --}}
                    {{--     <a class="btn btn-link" href="{{ route('password.request') }}"> --}}
                    {{--         {{ __('Forgot Your Password?') }} --}}
                    {{--     </a> --}}
                    {{-- @endif --}}
        <section>
    </form>
@endsection
