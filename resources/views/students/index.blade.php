@extends('master')
@section('content')
    <div class="container mx-auto my-12">
        <!-- component -->
        <div class="text-gray-900 ">
            <div class="p-4">
                {{-- <h1 class="text-3xl text-center">
                    {{ __('keywords.students') . ' ' . $group->name }}
                </h1> --}}
            </div>
            <div class="flex px-3">
                <a href="{{ route('students.create') }}"
                    class="px-4 py-2 text-white bg-green-500 rounded">{{ __('keywords.create_student') }}</a>
            </div>
            <div class="flex justify-center px-3 py-4">
                <table class="w-full mb-4 bg-white rounded shadow-md text-md">
                    <thead class="text-center">
                        <tr class="border-b">
                            <th class="p-3 px-5">#</th>
                            <th class="p-3 px-5">{{ __('keywords.name') }}</th>
                            <th class="p-3 px-5">{{ __('keywords.phone') }}</th>
                            <th class="p-3 px-5">{{ __('keywords.code') }}</th>
                            <th class="p-3 px-5">{{ __('keywords.attendance') }}</th>
                            <th class="p-3 px-5">{{ __('keywords.action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($students as $key => $student)
                            <tr class="text-center bg-gray-100 border-b hover:bg-indigo-100">
                                <td class="p-3 px-5">{{ $key + 1 }}</td>
                                <td class="p-3 px-5">{{ $student->name }}</td>
                                <td class="p-3 px-5">{{ $student->phone }}</td>
                                <td class="p-3 px-5">{{ $student->code }}</td>
                                <td class="p-3 px-5">
                                    <div class="flex justify-center gap-1">
                                        @foreach ($student->attendance_statuses as $date => $status)
                                            <div
                                                class="w-2 h-2 rounded-full {{ $status ? 'bg-green-500' : 'bg-red-500' }}">
                                            </div>
                                        @endforeach
                                    </div>
                                </td>
                                <td class="flex justify-center gap-1 p-3 px-5">
                                    <a href="{{ route('students.show', $student) }}"><i
                                            class="p-2 text-white transition-colors bg-blue-500 rounded fa fa-eye hover:bg-blue-600"></i></a>
                                    <a href="{{ route('students.edit', $student) }}"><i
                                            class="p-2 text-white transition-colors bg-yellow-500 rounded fa fa-edit hover:bg-yellow-600"></i></a>
                                    <form action="{{ route('students.destroy', $student) }}" method="POST"
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
