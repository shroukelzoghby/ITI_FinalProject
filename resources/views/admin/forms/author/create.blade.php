@extends('layouts.admin')

@section('title', 'Add Author')

@section('content')
    <x-h1 class="width-full flex-center margin-bottom-40px">Add New Author</x-h1>

    <form class="flex-center flex-column" method="POST" action="{{ route('authors.store') }}" enctype="multipart/form-data">
        @csrf

        <div class="flex-column width-368px">
            <x-label class="margin-bottom-7px">Picture</x-label>
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
            <x-label class="margin-bottom-7px">Author Name</x-label>
            <x-input.text placeholder="Name" name="name" />
        </div>

        <x-button.create class="margin-top-40px">Add</x-button.create>
    </form>
@endsection

