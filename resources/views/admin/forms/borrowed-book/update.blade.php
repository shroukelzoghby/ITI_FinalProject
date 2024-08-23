@extends('layouts.admin')

@section('title', 'Borrow Book')

@section('content')
    <x-h1 class="width-full flex-center margin-bottom-40px">Borrow Book</x-h1>

    <form
        class="flex-center flex-column"
        method="POST"
        action="{{ route('borrowed-books.update', $borrowed->id) }}"
    >
        @csrf
        @method('PUT')

        <div class="flex-column margin-top-20px">
            <x-label class="margin-bottom-7px">User</x-label>
            <x-input.select name="user_id" required disabled>
                <option selected disabled hidden>Choose user</option>
                @foreach($users as $user)
                    <option
                        value="{{ $user->id }}"
                        @selected($user->id === $borrowed->user_id)
                    >
                        {{ $user->name }}
                    </option>
                @endforeach
            </x-input.select>
        </div>

        <div class="flex-column margin-top-20px">
            <x-label class="margin-bottom-7px">Book</x-label>
            <x-input.select name="book_id" required disabled>
                <option selected disabled hidden>Choose book</option>
                @foreach($books as $book)
                    <option
                        value="{{ $book->id }}"
                        @selected($book->id === $borrowed->book_id)
                    >
                        {{ $book->title }}
                    </option>
                @endforeach
            </x-input.select>
        </div>

        <div class="flex-column margin-top-20px">
            <x-label class="margin-bottom-7px">Return Date</x-label>
            <x-input.date
                name="return_date"
                :value="$borrowed->return_date"
                required
            />
        </div>

        <x-button.create class="margin-top-40px">Add</x-button.create>
    </form>
@endsection

