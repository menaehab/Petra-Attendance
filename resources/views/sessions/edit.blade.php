@extends('master')

@section('content')
    <div class="max-w-2xl px-4 py-8 mx-auto">
        <h2 class="mb-6 text-5xl font-semibold text-center text-indigo-500">{{ __('keywords.edit_session') }}</h2>

        <form action="{{ route('sessions.update', $session) }}" method="POST"
            class="p-6 space-y-6 bg-white shadow-md rounded-xl">
            @csrf
            @method('PATCH')

            <div>
                <label for="start_time"
                    class="block mb-1 text-sm font-medium text-gray-700">{{ __('keywords.start_time') }}</label>
                <input type="datetime-local" name="start_time" value="{{ old('start_time', $session->date) }}">
                @error('start_time')
                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for="group_id"
                    class="block mb-1 text-sm font-medium text-gray-700">{{ __('keywords.group') }}</label>

                <select name="group" id="group_id"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-indigo-300"
                    required>
                    @foreach ($groups as $group)
                        <option value="{{ $group->id }}" {{ $group->id == $session->group_id ? 'selected' : '' }}>
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
