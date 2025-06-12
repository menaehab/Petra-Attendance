@extends('master')
@section('content')
    <div class="container mx-auto my-12">
        <!-- component -->
        <div class="text-gray-900 ">
            <div class="p-4">
                <h1 class="text-3xl text-center">
                    {{ __('keywords.students') . ' ' . $group->name }}
                </h1>
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
                        @foreach ($students as $student)
                            <tr class="text-center bg-gray-100 border-b hover:bg-indigo-100">
                                <td class="p-3 px-5">{{ $student->id }}</td>
                                <td class="p-3 px-5">{{ $student->name }}</td>
                                <td class="p-3 px-5">{{ $student->phone }}</td>
                                <td class="p-3 px-5">{{ $student->code }}</td>
                                <td class="p-3 px-5">
                                    <div class="flex justify-center gap-1">
                                        <div class="w-2 h-2 bg-green-500 rounded-full"></div>
                                        <div class="w-2 h-2 bg-red-500 rounded-full"></div>
                                        <div class="w-2 h-2 bg-green-500 rounded-full"></div>
                                        @foreach ($student->attendance_statuses as $status)
                                            <div
                                                class="w-2 h-2 rounded-full {{ $status ? 'bg-green-500' : 'bg-red-500' }}">
                                            </div>
                                        @endforeach
                                    </div>
                                </td>
                                <td class="flex justify-center gap-1 p-3 px-5">
                                    {{-- <a href="#"><i
                                            class="p-2 text-white transition-colors bg-blue-500 rounded fa fa-eye hover:bg-blue-600"></i></a> --}}
                                    <a href="#"><i
                                            class="p-2 text-white transition-colors bg-yellow-500 rounded fa fa-edit hover:bg-yellow-600"></i></a>
                                    <a href="#"><i
                                            class="p-2 text-white transition-colors bg-red-500 rounded fa fa-trash hover:bg-red-600"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
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
