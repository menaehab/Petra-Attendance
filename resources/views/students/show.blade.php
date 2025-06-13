@extends('master')

@section('content')
    <div class="max-w-2xl px-4 py-8 mx-auto">
        <h2 class="mb-6 text-5xl font-semibold text-center text-indigo-500">{{ __('keywords.student_details') }}</h2>

        <div class="p-6 space-y-6 bg-white shadow-md rounded-xl">
            <div>
                <label class="block mb-1 text-sm font-medium text-gray-700">{{ __('keywords.name') }}</label>
                <p class="text-lg text-gray-800">{{ $student->name }}</p>
            </div>

            <div>
                <label class="block mb-1 text-sm font-medium text-gray-700">{{ __('keywords.phone') }}</label>
                <p class="text-lg text-gray-800">{{ $student->phone }}</p>
            </div>

            <div>
                <label class="block mb-1 text-sm font-medium text-gray-700">{{ __('keywords.code') }}</label>
                <p class="text-lg text-gray-800">{{ $student->code }}</p>
            </div>

            <div>
                <label class="block mb-1 text-sm font-medium text-gray-700">{{ __('keywords.group') }}</label>
                <p class="text-lg text-gray-800">{{ $student->group?->name }}</p>
            </div>

            <div>
                <h3 class="mt-10 mb-4 text-2xl font-semibold text-gray-800">{{ __('keywords.attendance_history') }}</h3>

                <div class="overflow-x-auto text-center">
                    <table class="min-w-full bg-white border border-gray-200 rounded-md shadow-sm">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="px-4 py-2 text-sm font-medium text-gray-700">
                                    {{ __('keywords.session_date') }}</th>
                                <th class="px-4 py-2 text-sm font-medium text-gray-700">
                                    {{ __('keywords.attended') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($student->attendance_statuses as $date => $status)
                                <tr class="border-t">
                                    <td class="px-4 py-2 text-gray-800">{{ $date }}
                                    </td>
                                    <td class="px-4 py-2">
                                        <span
                                            class="px-2 py-1 text-sm {{ $status ? 'bg-green-100' : 'bg-red-100' }}  bg-green-100 rounded-full">
                                            {{ $status ? __('keywords.yes') : __('keywords.no') }}</span>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="2" class="px-4 py-3 text-center text-gray-500">
                                        {{ __('keywords.no_attendance_records') }}
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
