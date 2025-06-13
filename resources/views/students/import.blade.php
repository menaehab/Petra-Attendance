@extends('master')
@section('content')
    <div class="max-w-2xl px-4 py-8 mx-auto">
        <h2 class="mb-6 text-5xl font-semibold text-center text-indigo-500">{{ __('keywords.create_student') }}</h2>

        <form action="{{ route('students.import') }}" method="POST" class="p-6 space-y-6 bg-white shadow-md rounded-xl"
            enctype="multipart/form-data">
            @csrf
            <div>
                <label for="group_id" class="block mb-1 text-sm font-medium text-gray-700">{{ __('keywords.group') }}</label>
                <select name="group_id" id="group_id"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-indigo-300">
                    <option value="">{{ __('keywords.choose_group') }}</option>
                    @foreach ($groups as $group)
                        <option value="{{ $group->id }}" {{ old('group_id') == $group->id ? 'selected' : '' }}>
                            {{ $group->name }}</option>
                    @endforeach
                </select>
                @error('group_id')
                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <input type="file" name="file" id="file"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-indigo-300">

                @error('file')
                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                @enderror

                @if (session('failures'))
                    <div class="mt-4 bg-red-50 border border-red-300 text-red-700 p-4 rounded-md shadow-sm">
                        <h3 class="font-semibold text-lg mb-2">{{ __('keywords.import_errors') }}</h3>
                        @foreach (session('failures') as $failure)
                            <div class="mb-3 border-b border-red-200 pb-2">
                                <p><strong>{{ __('keywords.row') }}:</strong> {{ $failure->row() }}</p>
                                <p><strong>{{ __('keywords.column') }}:</strong> {{ $failure->attribute() }}</p>
                                <ul class="list-disc list-inside text-sm mt-1">
                                    @foreach ($failure->errors() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>

            <div class="text-center">
                <button type="submit"
                    class="px-6 py-2 text-white transition duration-200 bg-indigo-600 rounded-md hover:bg-indigo-700">
                    {{ __('keywords.create') }}
                </button>
            </div>
        </form>
    </div>
@endsection
