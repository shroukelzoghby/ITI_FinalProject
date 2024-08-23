<section class="margin-bottom-50px">
    <x-h1 class="margin-bottom-40px width-full flex-center">Borrowed Books</x-h1>

    @if($books->count() == 0)
        <x-h3 class="width-full flex-center">No borrowed books</x-h3>
    @else
        <x-table.container>
            <x-table class="table--1000px">
                <x-table.tr class="table__tr--head">
                    <x-table.td class="table__td--head">
                        Book Title
                    </x-table.td>
                    <x-table.td class="table__td--head">
                        Borrowed at
                    </x-table.td>
                    <x-table.td class="table__td--head">
                        Return Date
                    </x-table.td>
                    <x-table.td class="table__td--head table__td--no_border">

                    </x-table.td>
                </x-table.tr>

                @foreach($books as $book)
                    <x-table.tr>
                        <x-table.td>
                            <a class="a" href="{{ route('books.show', $book['book_id']) }}">
                                {{ $book->book->title }}
                            </a>
                        </x-table.td>
                        <x-table.td>
                            {{ $book['created_at'] }}
                        </x-table.td>
                        <x-table.td>
                            {{ $book['return_date'] }}
                        </x-table.td>
                        <x-table.td class="return-link table__td--no_border table__td--text_center">
                            @if(!$book['returned'])
                                <x-button.link
                                    class="a--green"
                                    route-name="return-book"
                                    route-param="{{ $book['id'] }}"
                                    form-id="return-book-form-{{ $book['id'] }}"
                                    method="PATCH"
                                >
                                    <i class="fa fa-reply"></i>
                                </x-button.link>
                            @endif
                        </x-table.td>
                    </x-table.tr>
                @endforeach
            </x-table>
        </x-table.container>
    @endif
</section>

