@extends('master')

@section('content')
    <div class="max-w-2xl px-4 py-8 mx-auto">
        <h2 class="mb-6 text-5xl font-semibold text-center text-indigo-500">{{ __('keywords.session_details') }}</h2>

        <div class="p-6 space-y-6 bg-white shadow-md rounded-xl">
            <div>
                <label class="block mb-1 text-sm font-medium text-gray-700">{{ __('keywords.start_time') }}</label>
                <p class="text-lg text-gray-800">{{ \Carbon\Carbon::parse($session->date)->format('Y-m-d h:i A') }}</p>
            </div>

            <div>
                <h3 class="mt-10 mb-4 text-2xl font-semibold text-gray-800">{{ __('keywords.attendance_history') }}</h3>

                <div class="overflow-x-auto text-center">
                    <table class="min-w-full bg-white border border-gray-200 rounded-md shadow-sm">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="px-4 py-2 text-sm font-medium text-gray-700">#</th>
                                <th class="px-4 py-2 text-sm font-medium text-gray-700">{{ __('keywords.name') }}
                                </th>
                                <th class="px-4 py-2 text-sm font-medium text-gray-700">{{ __('keywords.attended') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($students as $key => $student)
                                <tr class="border-t">
                                    <td class="px-4 py-2 text-gray-800">{{ $key + 1 }}</td>
                                    <td class="px-4 py-2 text-gray-800">{{ $student->name }}</td>
                                    <td class="px-4 py-2">
                                        @if ($student->attendances->isNotEmpty())
                                            <span class="px-2 py-1 text-sm bg-green-100 text-green-800 rounded-full">
                                                {{ __('keywords.yes') }}
                                            </span>
                                            <div class="mt-1 text-xs text-gray-500">
                                                {{ $student->attendances->first()->created_at->format('h:i A') }}
                                            </div>
                                        @else
                                            <span class="px-2 py-1 text-sm bg-red-100 text-red-800 rounded-full">
                                                {{ __('keywords.no') }}
                                            </span>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="px-4 py-3 text-center text-gray-500">
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
