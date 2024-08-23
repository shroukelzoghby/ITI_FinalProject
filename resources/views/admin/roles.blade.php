@extends('layouts.admin')

@section('title', 'Roles')

@section('content')
    <x-h1 class="width-full flex-center margin-bottom-40px">Roles</x-h1>

    @if($roles->count() == 0)
        <x-h3 class="width-full flex-center">No roles</x-h3>
    @else
        <x-table.container>
            <x-table class="table--1000px">
                <x-table.tr class="table__tr--head">
                    <x-table.td class="table__td--head">
                        ID
                    </x-table.td>
                    <x-table.td class="table__td--head">
                        Title
                    </x-table.td>
                    <x-table.td class="table__td--head">
                        Users Count
                    </x-table.td>
                    <x-table.td class="table__td--head table__td--no_border">

                    </x-table.td>
                    <x-table.td class="table__td--head table__td--no_border">

                    </x-table.td>
                </x-table.tr>

                @foreach($roles as $role)
                    <x-table.tr>
                        <x-table.td>
                            {{ $role['id'] }}
                        </x-table.td>
                        <x-table.td>
                            {{ $role['title'] }}
                        </x-table.td>
                        <x-table.td>
                            {{ $role['users']?->count() ?? 0 }}
                        </x-table.td>
                        <x-table.td class="return-link table__td--no_border table__td--text_center">
                            <a
                                class="a--blue"
                                href="{{ route('roles.edit', $role['id']) }}"
                            >
                                <i class="fa fa-pen"></i>
                            </a>
                        </x-table.td>
                        <x-table.td class="return-link table__td--no_border table__td--text_center">
                            <x-button.link
                                class="a--red-danger"
                                route-name="roles.destroy"
                                route-param="{{ $role['id'] }}"
                                form-id="delete-role-form-{{ $role['id'] }}"
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
        <a href="{{ route('roles.create') }}">
            <x-button.create>
                Add
            </x-button.create>
        </a>
    </section>
@endsection

