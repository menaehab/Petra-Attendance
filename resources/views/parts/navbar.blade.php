<header x-data="{ open: false }" class="flex flex-wrap items-center justify-between p-4 bg-white shadow-lg">
    <div class="flex items-center">
        <div
            class="relative flex items-center justify-center ml-3 rounded-full shadow-lg w-14 h-14 bg-gradient-to-tr from-indigo-400 to-purple-500">
            <svg class="text-white w-7 h-7" fill="currentColor" viewBox="0 0 24 24">
                <path d="M10 2h4v6h6v4h-6v10h-4V12H4V8h6V2z" />
            </svg>
            <div class="absolute p-1 bg-white rounded-full shadow bottom-1 right-1">
                <svg class="w-3 h-3 text-indigo-500" fill="currentColor" viewBox="0 0 20 20">
                    <path
                        d="M8.707 13.707a1 1 0 01-1.414 0L3 9.414l4.293-4.293a1 1 0 111.414 1.414L5.414 9l3.293 3.293a1 1 0 010 1.414zM11.293 6.293a1 1 0 011.414 0L17 9.586l-4.293 4.293a1 1 0 01-1.414-1.414L14.586 9l-3.293-3.293a1 1 0 010-1.414z" />
                </svg>
            </div>
        </div>
        <span class="ml-4 text-xl font-bold text-gray-800">
            <a href="{{ route('dashboard') }}">Petra Coding School</a>
        </span>
    </div>

    <!-- Hamburger menu (mobile) -->
    <div class="justify-end mx-4">
        <button @click="open = !open" class="ml-auto mr-2 text-indigo-600 md:hidden focus:outline-none">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path :class="{ 'hidden': open }" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M4 6h16M4 12h16M4 18h16" />
                <path :class="{ 'hidden': !open }" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
    </div>

    <!-- Navigation Menu -->
    <div :class="{ 'block': open, 'hidden': !open }"
        class="hidden w-full mt-4 md:mt-0 md:flex md:items-center md:w-auto md:space-x-5">
        @if (Auth::check())
            <div class="flex flex-col space-y-2 md:flex-row md:items-center md:space-y-0 md:space-x-4">
                <a href="{{ route('groups.index') }}"
                    class="px-5 py-2 font-semibold text-white transition bg-indigo-500 rounded-lg md:ml-4 hover:bg-indigo-400">
                    {{ __('keywords.groups') }}
                </a>

                <a href="{{ route('sessions.index') }}"
                    class="px-5 py-2 font-semibold text-white transition bg-indigo-500 rounded-lg hover:bg-indigo-400">
                    {{ __('keywords.session') }}
                </a>

                @hasrole('admin')
                    <a href="{{ route('students.create') }}"
                        class="px-5 py-2 font-semibold text-white transition bg-indigo-500 rounded-lg hover:bg-indigo-400">
                        {{ __('keywords.create_student') }}
                    </a>

                    <a href="{{ route('students.import') }}"
                        class="px-5 py-2 font-semibold text-white transition bg-indigo-500 rounded-lg hover:bg-indigo-400">
                        {{ __('keywords.import_student') }}
                    </a>

                    <a href="{{ route('tasks.index') }}"
                        class="px-5 py-2 font-semibold text-white transition bg-indigo-500 rounded-lg hover:bg-indigo-400">
                        {{ __('keywords.tasks') }}
                    </a>
                @endhasrole

                <a href="{{ route('attendance') }}"
                    class="px-5 py-2 font-semibold text-white transition bg-indigo-500 rounded-lg hover:bg-indigo-400">
                    {{ __('keywords.attendance') }}
                </a>

                <a href="{{ route('dashboard') }}"
                    class="px-5 py-2 font-semibold text-white transition duration-300 bg-indigo-500 rounded-lg shadow hover:bg-indigo-400">
                    {{ __('Dashboard') }}
                </a>

                <form action="{{ route('logout') }}" method="POST" class="inline">
                    @csrf
                    <button type="submit"
                        class="px-5 py-2 font-semibold text-white transition duration-300 bg-red-500 rounded-lg shadow hover:bg-red-400">
                        {{ __('Log Out') }}
                    </button>
                </form>
            </div>
        @else
            <a href="{{ route('login') }}"
                class="px-5 py-2 font-semibold text-white transition bg-indigo-500 rounded-lg hover:bg-indigo-400">
                {{ __('Log in') }}
            </a>
        @endif
    </div>
</header>
