@extends('layouts.admin')

@section('title', 'Authors')

@section('content')
    <x-h1 class="width-full flex-center margin-bottom-40px">Authors</x-h1>

    @if($authors->count() == 0)
        <x-h3 class="width-full flex-center">No authors</x-h3>
    @else
        <x-table.container>
            <x-table class="table--1000px">
                <x-table.tr class="table__tr--head">
                    <x-table.td class="table__td--head">
                        ID
                    </x-table.td>
                    <x-table.td class="table__td--head">
                        Name
                    </x-table.td>
                    <x-table.td class="table__td--head">
                        Books Count
                    </x-table.td>
                    <x-table.td class="table__td--head table__td--no_border">

                    </x-table.td>
                    <x-table.td class="table__td--head table__td--no_border">

                    </x-table.td>
                </x-table.tr>

                @foreach($authors as $author)
                    <x-table.tr>
                        <x-table.td>
                            {{ $author['id'] }}
                        </x-table.td>
                        <x-table.td>
                            <a class="a" href="{{ route('authors.show', $author['id']) }}">
                                {{ $author['name'] }}
                            </a>
                        </x-table.td>
                        <x-table.td>
                            {{ $author['books']?->count() ?? 0 }}
                        </x-table.td>
                        <x-table.td class="return-link table__td--no_border table__td--text_center">
                            <a
                                class="a--blue"
                                href="{{ route('authors.edit', $author['id']) }}"
                            >
                                <i class="fa fa-pen"></i>
                            </a>
                        </x-table.td>
                        <x-table.td class="return-link table__td--no_border table__td--text_center">
                            <x-button.link
                                class="a--red-danger"
                                route-name="authors.destroy"
                                route-param="{{ $author['id'] }}"
                                form-id="delete-author-form-{{ $author['id'] }}"
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
        <a href="{{ route('authors.create') }}">
            <x-button.create>
                Add
            </x-button.create>
        </a>
    </section>
@endsection

