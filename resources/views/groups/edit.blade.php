@extends('master')

@section('content')
    <div class="max-w-2xl px-4 py-8 mx-auto">
        <h2 class="mb-6 text-5xl font-semibold text-center text-indigo-500">{{ __('keywords.update_student') }}</h2>

        <form action="{{ route('groups.update', $group) }}" class="p-6 space-y-6 bg-white shadow-md rounded-xl" method="POST">
            @csrf
            @method('PATCH')
            <div>
                <label for="name" class="block mb-1 text-sm font-medium text-gray-700">{{ __('keywords.name') }}</label>
                <input type="text" name="name" value="{{ $group->name }}"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-indigo-300">
                @error('name')
                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for="group_id"
                    class="block mb-1 text-sm font-medium text-gray-700">{{ __('keywords.level') }}</label>
                <select name="level" id="group_id"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-indigo-300"
                    required>
                    <option value="">{{ __('keywords.choose_level') }}</option>
                    <option value="level 1" {{ $group->level == 'level 1' ? 'selected' : '' }}>{{ __('keywords.level-1') }}
                    </option>
                    <option value="level 2" {{ $group->level == 'level 2' ? 'selected' : '' }}>{{ __('keywords.level-2') }}
                    </option>
                    <option value="level 3" {{ $group->level == 'level 3' ? 'selected' : '' }}>
                        {{ __('keywords.level-3') }}</option>
                </select>

                @error('group_id')
                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                @enderror
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
