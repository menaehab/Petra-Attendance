@extends('master')

@section('content')
    <div class="max-w-2xl px-4 py-8 mx-auto">
        <h2 class="mb-6 text-5xl font-semibold text-center text-indigo-500">{{ __('keywords.update_student') }}</h2>

        <form action="{{ route('students.update', $student) }}" method="POST"
            class="p-6 space-y-6 bg-white shadow-md rounded-xl">
            @csrf
            @method('PATCH')

            <div>
                <label for="name" class="block mb-1 text-sm font-medium text-gray-700">{{ __('keywords.name') }}</label>
                <input type="text" name="name" value="{{ $student->name }}"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-indigo-300">
                @error('name')
                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="phone"
                    class="block mb-1 text-sm font-medium text-gray-700">{{ __('keywords.phone') }}</label>
                <input type="text" name="phone" value="{{ $student->phone }}"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-indigo-300">
                @error('phone')
                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="code" class="block mb-1 text-sm font-medium text-gray-700">{{ __('keywords.code') }}</label>
                <input type="text" name="code" value="{{ $student->code }}"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-indigo-300">
                @error('code')
                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="group_id"
                    class="block mb-1 text-sm font-medium text-gray-700">{{ __('keywords.group') }}</label>
                <select name="group_id" id="group_id"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-indigo-300">
                    <option value="">{{ __('keywords.choose_group') }}</option>
                    @foreach ($groups as $group)
                        <option value="{{ $group->id }}" {{ $student->group_id == $group->id ? 'selected' : '' }}>
                            {{ $group->name }}</option>
                    @endforeach
                </select>
                @error('group_id')
                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div class="text-center">
                <button type="submit"
                    class="px-6 py-2 text-white transition duration-200 bg-indigo-600 rounded-md hover:bg-indigo-700">
                    {{ __('keywords.update') }}
                </button>
            </div>
        </form>
    </div>
@endsection
