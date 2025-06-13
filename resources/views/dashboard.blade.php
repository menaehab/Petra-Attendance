

{{-- @dd($groups) --}}
@extends('master')
@section('content')
<div class="px-5 py-10 mx-auto max-w-7xl">

    <h1 class="mb-10 font-bold text-center text-indigo-600 text-7xl">{{ __('keywords.Attendance_Dashboard') }}</h1>


    <!-- Table -->
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white shadow-md rounded-xl">
            <thead class="bg-indigo-500 text-white">
                <tr>
                    <th class="py-3 px-6 text-left">Level</th>
                    <th class="py-3 px-6 text-left">Groups</th>
                </tr>
            </thead>
            <tbody class="text-gray-700">

                {{-- مثال ثابت --}}

                <tr class="border-b">
                    <td class="py-4 px-6">{{ __('keywords.level-3') }}</td>
                    <td class="py-4 px-6 flex flex-wrap gap-3">

                    @foreach ($groups as $group)
                            @if ($group->level=='level 3')

                            <a href="{{ route('students.index' , $group->id) }}" class="bg-indigo-100 text-indigo-700 px-4 py-2 rounded-lg hover:bg-indigo-200 transition">


                            {{ $group->name }}
                             </a>

                            @endif
                    @endforeach
                    </td>
                </tr>

                <tr class="border-b">
                    <td class="py-4 px-6">{{ __('keywords.level-2') }}</td>
                    <td class="py-4 px-6 flex flex-wrap gap-3">

                    @foreach ($groups as $group)
                            @if ($group->level=='level 2')

                            <a href="{{ route('students.index' , $group->id) }}" class="bg-indigo-100 text-indigo-700 px-4 py-2 rounded-lg hover:bg-indigo-200 transition">


                            {{ $group->name }}
                             </a>

                            @endif
                    @endforeach
                  </td>
                </tr>

                <tr>
                    <td class="py-4 px-6">{{ __('keywords.level-1') }}</td>
                    <td class="py-4 px-6 flex flex-wrap gap-3">





                    @foreach ($groups as $group)
                            @if ($group->level=='level 1')

                            <a href="{{ route('students.index' , $group->id) }}" class="bg-indigo-100 text-indigo-700 px-4 py-2 rounded-lg hover:bg-indigo-200 transition">


                            {{ $group->name }}
                             </a>

                            @endif
                    @endforeach

                    </td>
                </tr>

            </tbody>
        </table>
    </div>

</div>
@endsection
