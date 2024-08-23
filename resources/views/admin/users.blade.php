@extends('layouts.admin')

@section('title', 'Users')

@section('content')

    <script>
        function searchUser() {

            const searchValue = document.querySelector('input[name=search_user]').value.trim();


            if (searchValue) {

                const searchUrl = `{{ route('users.show', ':id') }}`.replace(':id', searchValue);


                window.location.href = searchUrl;
            } else {
                alert('Please enter an ID to search.');
            }
        }
    </script>
    <x-h1 class="width-full flex-center margin-bottom-40px">Users</x-h1>

    <section class="flex-center margin-bottom-30px">
        <x-input.search name="search_user" placeholder="Search by ID" />
        <x-button
            class="margin-left-25px"
            onclick="searchUser()"
        >
            Search
        </x-button>
    </section>

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
                    Email
                </x-table.td>
                <x-table.td class="table__td--head">
                    Role
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

            @foreach($users as $user)
                <x-table.tr>
                    <x-table.td>
                        {{ $user['id'] }}
                    </x-table.td>
                    <x-table.td>
                        <a class="a" href="{{ route('users.show', $user['id']) }}">
                            {{ $user['name'] }}
                        </a>
                    </x-table.td>
                    <x-table.td>
                        <a class="a" href="mailto:{{ $user['email'] }}">
                            {{ $user['email'] }}
                        </a>
                    </x-table.td>
                    <x-table.td>
                        {{ $user['role']?->title }}
                    </x-table.td>
                    <x-table.td>
                        {{ $user['created_at'] }}
                    </x-table.td>
                    <x-table.td>
                        {{ $user['updated_at'] }}
                    </x-table.td>
                    <x-table.td class="return-link table__td--no_border table__td--text_center">
                        <a
                            class="a--blue"
                            href="{{ route('user-edit', $user['id']) }}"
                        >
                            <i class="fa fa-pen"></i>
                        </a>
                    </x-table.td>
                    <x-table.td class="return-link table__td--no_border table__td--text_center">
                        @unless(is_admin($user['role']?->id ?? -1))
                            <x-button.link
                                class="a--red-danger"
                                route-name="users.destroy"
                                route-param="{{ $user['id'] }}"
                                form-id="delete-user-form-{{ $user['id'] }}"
                                method="DELETE"
                            >
                                <i class="fa fa-trash"></i>
                            </x-button.link>
                        @endunless
                    </x-table.td>
                </x-table.tr>
            @endforeach
        </x-table>
    </x-table.container>

    <section class="flex-center margin-top-30px">
        <a href="{{ route('users.create') }}">
            <x-button.create>
                Add
            </x-button.create>
        </a>
    </section>
@endsection

