@extends('layouts.admin')

@section('title', 'Edit Role')

@section('content')
    <x-h1 class="width-full flex-center margin-bottom-40px">Edit Role</x-h1>

    <form class="flex-center flex-column" method="POST" action="{{ route('roles.update', $id) }}">
        @csrf
        @method('PUT')

        <div class="flex-column">
            <x-label class="margin-bottom-7px">Role Title</x-label>
            <x-input.text placeholder="title" name="title" value="{{ $title }}" />
        </div>

        <x-button.create class="margin-top-40px">Update</x-button.create>
    </form>
@endsection

