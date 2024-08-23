@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <x-h1 class="width-full flex-center margin-bottom-40px">Feed</x-h1>

    <section>
        @forelse($books as $book)
            <x-resource.book
                class="margin-bottom-15px"
                :id="$book->id"
                :cover="$book->cover"
                :title="$book->title"
                :author="$book->author"
                :describtion="$book->describtion"
                :available="$book->available"
            />
        @empty
            <x-h3 class="width-full flex-center">No books to show</x-h3>
        @endforelse
    </section>
@endsection

