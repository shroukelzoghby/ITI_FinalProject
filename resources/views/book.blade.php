@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="flex profile__personal-info ">
                    <x-book.cover :cover="$book->cover" />


                    <hr>
                    <br>

                    <div class="user__info">
                        <h2>{{ $book->title }}</h2>
                        <p><strong>Author:</strong> {{ $book->author->name }}</p>
                        <p><strong>Quantity Available:</strong> {{ $book->available }}</p>
                        <p><strong>Description:</strong> {{ $book->describtion }}</p>
                        <br>

                        <a href="{{ route('home') }}" class="button" style="text-decoration: none">Back to Dashboard</a>
                        <br>
                        <br>
                        <?php $roles = [
                        'admin' => 1,
                        'user' => 2,
                        ];?>

                        @if (auth()->user()->role_id == $roles['user'])
                            <form action="{{ route('borrow-book', $book->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="button">Borrow Book</button>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
