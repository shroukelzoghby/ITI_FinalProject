@extends('layouts.admin')

@section('title', 'Borrowed Books')

@section('content')
    <x-h1 class="width-full flex-center margin-bottom-40px">Borrowed Books</x-h1>

    @if($books->count() == 0)
        <x-h3 class="width-full flex-center">No borrowed books</x-h3>
    @else
        <x-table.container>
            <x-table class="table--1000px">
                <x-table.tr class="table__tr--head">
                    <x-table.td class="table__td--head">
                        ID
                    </x-table.td>
                    <x-table.td class="table__td--head">
                        User
                    </x-table.td>
                    <x-table.td class="table__td--head">
                        Book
                    </x-table.td>
                    <x-table.td class="table__td--head">
                        Returned
                    </x-table.td>
                    <x-table.td class="table__td--head">
                        Return Date
                    </x-table.td>
                    <x-table.td class="table__td--head">
                        Created at
                    </x-table.td>
                    <x-table.td class="table__td--head">
                        Updated at
                    </x-table.td>
                    <x-table.td class="table__td--head table__td--no_border">

                    </x-table.td>
                    <x-table.td class="table__td--head table__td--no_border">

                    </x-table.td>
                </x-table.tr>

                @foreach($books as $book)
                    <x-table.tr>
                        <x-table.td>
                            {{ $book['id'] }}
                        </x-table.td>
                        <x-table.td>
                            <a class="a" href="{{ route('users.show', $book['user_id']) }}">
                                {{ $book['user']?->name }}
                            </a>
                        </x-table.td>
                        <x-table.td>
                            <a class="a" href="{{ route('books.show', $book['book_id']) }}">
                                {{ $book['book']?->title }}
                            </a>
                        </x-table.td>
                        <x-table.td>
                            {{ $book['returned'] ? "Yes" : "No" }}
                        </x-table.td>
                        <x-table.td>
                            {{ $book['return_date'] }}
                        </x-table.td>
                        <x-table.td>
                            {{ $book['created_at'] }}
                        </x-table.td>
                        <x-table.td>
                            {{ $book['updated_at'] }}
                        </x-table.td>
                        <x-table.td class="return-link table__td--no_border table__td--text_center">
                            <a
                                class="a--blue"
                                href="{{ route('borrowed-books.edit', $book['id']) }}"
                            >
                                <i class="fa fa-pen"></i>
                            </a>
                        </x-table.td>
                        <x-table.td class="return-link table__td--no_border table__td--text_center">
                            <x-button.link
                                class="a--red-danger"
                                route-name="borrowed-books.destroy"
                                route-param="{{ $book['id'] }}"
                                form-id="delete-book-form-{{ $book['id'] }}"
                                method="DELETE"
                            >
                                <i class="fa fa-trash"></i>
                            </x-button.link>
                        </x-table.td>
                    </x-table.tr>
                @endforeach
            </x-table>
        </x-table.container>
    @endif

    <section class="flex-center margin-top-60px">
        <a href="{{ route('borrowed-books.create') }}">
            <x-button.create>
                Add
            </x-button.create>
        </a>
    </section>
@endsection

