<header class="flex items-center justify-between p-4 bg-white shadow-lg">
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
        <span class="text-xl font-bold text-gray-800">
            <a href="{{ route('theme.attendance') }}">Petra Coding School</a>
        </span>

        <div class="mr-5">
            <a href="{{ route('theme.attendance') }}"
                class="px-5 py-2 font-semibold text-white transition bg-indigo-500 rounded-lg hover:bg-indigo-400">
                {{ __('keywords.attendance') }}
            </a>
        </div>
    </div>

    <div>
        @if (Auth::check())
            @if (request()->is('/'))
                <a href="{{ route('theme.dashboard') }}"
                    class="px-5 py-2 font-semibold text-white transition bg-indigo-500 rounded-lg hover:bg-indigo-400">
                    {{ __('Dashboard') }}
                </a>
            @else
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit"
                        class="px-5 py-2 font-semibold text-white transition bg-indigo-500 rounded-lg hover:bg-indigo-400">
                        {{ __('Log Out') }}
                    </button>
                </form>
            @endif
        @else
            <a href="{{ route('login') }}"
                class="px-5 py-2 font-semibold text-white transition bg-indigo-500 rounded-lg hover:bg-indigo-400">
                {{ __('Log in') }}
            </a>
        @endif
    </div>
</header>
