@extends('layouts.admin')

@section('title', 'Add Role')

@section('content')
    <x-h1 class="width-full flex-center margin-bottom-40px">Add New Role</x-h1>

    <form class="flex-center flex-column" method="POST" action="{{ route('roles.store') }}">
        @csrf

        <div class="flex-column">
            <x-label class="margin-bottom-7px">Role Title</x-label>
            <x-input.text placeholder="title" name="title" />
        </div>

        <x-button.create class="margin-top-40px">Add</x-button.create>
    </form>
@endsection

