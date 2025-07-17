@extends('master')

@section('content')
    <div class="flex items-center justify-center py-10" dir="rtl">
        <div class="w-full max-w-3xl p-8 bg-white shadow-2xl rounded-3xl">

            {{-- عنوان المهمة --}}
            <div class="mb-6 text-center">
                <h2 class="text-2xl font-bold text-indigo-600">{{ $task->title }}</h2>
                <p class="text-gray-500 mt-2">{{ $task->description }}</p>
            </div>

            {{-- مستوى الطلاب --}}
            <div class="mb-6 text-center">
                <span class="text-sm font-medium text-gray-600">{{ __('keywords.students_level') }}:</span>
                <span class="inline-block px-3 py-1 text-sm bg-indigo-100 text-indigo-800 rounded-xl mt-1">
                    {{ $task->course->level->name }}
                </span>
            </div>

            {{-- جدول الطلاب --}}
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200 border rounded-xl overflow-hidden">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-4 py-2 text-right text-sm font-semibold text-gray-600">
                                {{ __('keywords.student_name') }}
                            </th>
                            <th class="px-4 py-2 text-right text-sm font-semibold text-gray-600">
                                {{ __('keywords.group') }}
                            </th>
                            <th class="px-4 py-2 text-center text-sm font-semibold text-gray-600">
                                {{ __('keywords.action') }}
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200 text-sm">
                        @forelse ($students as $student)
                            <tr id="student-row-{{ $student->id }}">
                                <td class="px-4 py-2">{{ $student->name }}</td>
                                <td class="px-4 py-2">{{ $student->group->name }}</td>
                                <td class="px-4 py-2 text-center">
                                    @if ($student->tasks()->where('tasks.id', $task->id)->exists())
                                        <a href="{{ route('tasks.updateStatus', ['task' => $task->id, 'student' => $student->id]) }}"
                                            class="px-3 py-1 bg-green-100 text-green-800 rounded-xl text-xs font-semibold mr-1 update-status">
                                            {{ __('keywords.done') }}
                                        </a>
                                    @else
                                        <a href="{{ route('tasks.updateStatus', ['task' => $task->id, 'student' => $student->id]) }}"
                                            class="px-3 py-1 bg-red-100 text-red-800 rounded-xl text-xs font-semibold update-status">
                                            {{ __('keywords.not_done') }}
                                        </a>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="px-4 py-4 text-center text-gray-500">
                                    {{ __('keywords.no_students_found') }}
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </div>
@endsection
