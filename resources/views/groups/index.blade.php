@extends('master')
@section('content')
    <div class="container mx-auto my-12">
        <!-- component -->
        <div class="text-gray-900 ">
            <div class="p-4">
                <h1 class="text-3xl text-center">
                    {{ __('keywords.groups') }}
                </h1>
            </div>
            <div class="flex px-3">
                <a href="{{ route('groups.create') }}"
                    class="px-4 py-2 text-white bg-green-500 rounded">{{ __('keywords.create_group') }}</a>
            </div>
            <div class="flex justify-center px-3 py-4">
                <div class="w-full overflow-x-auto">
                    <table class="w-full mb-4 bg-white rounded shadow-md text-md">
                        <thead class="text-center">
                            <tr class="border-b">
                                <th class="p-3 px-5">#</th>
                                <th class="p-3 px-5">{{ __('keywords.group') }}</th>
                                <th class="p-3 px-5">{{ __('keywords.level') }}</th>
                                <th class="p-3 px-5">{{ __('keywords.action') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($groups as $key => $group)
                                <tr class="text-center bg-gray-100 border-b hover:bg-indigo-100">
                                    <td class="p-3 px-5">{{ $key + 1 }}</td>
                                    <td class="p-3 px-5">{{ $group->name }}</td>
                                    <td class="p-3 px-5">{{ $group->level }}</td>

                                    <td class="flex justify-center gap-1 p-3 px-5">
                                        <a href="{{ route('students.index', $group->id) }}"><i
                                                class="p-2 text-white transition-colors bg-blue-500 rounded fa fa-eye hover:bg-blue-600"></i></a>
                                        @hasrole('admin')
                                            <a href="{{ route('groups.edit', $group) }}"><i
                                                    class="p-2 text-white transition-colors bg-yellow-500 rounded fa fa-edit hover:bg-yellow-600"></i></a>
                                            <form action="{{ route('groups.destroy', $group) }}" method="POST"
                                                class="d-inline delete-form">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" href="#"><i
                                                        class="p-2 text-white transition-colors bg-red-500 rounded fa fa-trash hover:bg-red-600"></i></button>
                                            </form>
                                        @endhasrole
                                        <a href="{{ route('groups.edit', $group) }}"><i
                                                class="p-2 text-white transition-colors bg-yellow-500 rounded fa fa-edit hover:bg-yellow-600"></i></a>
                                        <form action="{{ route('groups.destroy', $group) }}" method="POST"
                                            class="d-inline delete-form">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" href="#"><i
                                                    class="p-2 text-white transition-colors bg-red-500 rounded fa fa-trash hover:bg-red-600"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const deleteForms = document.querySelectorAll('.delete-form');

            deleteForms.forEach(form => {
                form.addEventListener('submit', function(e) {
                    e.preventDefault();

                    Swal.fire({
                        title: '{{ __('keywords.are_you_sure') }}',
                        text: '{{ __('keywords.delete_warning') }}',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#d33',
                        cancelButtonColor: '#3085d6',
                        confirmButtonText: '{{ __('keywords.yes_delete') }}',
                        cancelButtonText: '{{ __('keywords.cancel') }}',
                        reverseButtons: true
                    }).then((result) => {
                        if (result.isConfirmed) {
                            form.submit();
                        }
                    });
                });
            });
        });
    </script>
@endsection

{{-- @if (session('failures'))
@foreach (session('failures') as $failure)
    <div>
        <p>{{ $failure->row() }}</p>
        <p>{{ $failure->attribute() }}</p>
        <p>
        <ul>
            @foreach ($failure->errors() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        </p>

    </div>
@endforeach --}}
