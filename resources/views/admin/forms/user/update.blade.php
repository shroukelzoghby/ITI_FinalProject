@php
    $layout = is_admin() ? 'layouts.admin' : 'layouts.app';
@endphp

@extends($layout)

@section('title', 'Edit User')

@section('content')
    <x-h1 class="width-full flex-center margin-bottom-40px">Edit User</x-h1>

    <form autocomplete="off" class="flex-center flex-column" method="POST" action="{{ route('user-update', $id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="flex-column width-368px">
            <x-label class="margin-bottom-7px">Profile Picture</x-label>
            <x-input.picture name="picture" class="flex-center margin-inline-auto width-200px">
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
            <x-input.text placeholder="Fullname" name="name" value="{{ $name }}" />

            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="flex-column margin-top-20px">
            <x-label class="margin-bottom-7px" required>Email</x-label>
            <x-input.email placeholder="Email" name="email" value="{{ $email }}" />

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

        @admin
            <div class="flex-column margin-top-20px">
                <x-label class="margin-bottom-7px">Role</x-label>
                <x-input.select name="role_id" required>
                    <option selected disabled hidden>Choose role</option>
                    @foreach($roles as $title => $id)
                        <option value="{{ $id }}" @selected($id === ($role ? $role['id'] ?? -1 : -1))>{{ $title }}</option>
                    @endforeach
                </x-input.select>

                @error('role_id')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        @endadmin

        <x-button.create class="margin-top-40px">Update</x-button.create>
    </form>
@endsection

