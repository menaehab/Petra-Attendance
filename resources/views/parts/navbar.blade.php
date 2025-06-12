<header class="bg-white p-4 shadow-lg flex justify-between items-center">
    <div class="flex items-center">
        <div class="flex items-center justify-center w-14 h-14 rounded-full bg-gradient-to-tr from-indigo-400 to-purple-500 shadow-lg mr-3 relative">
            <svg class="w-7 h-7 text-white" fill="currentColor" viewBox="0 0 24 24">
                <path d="M10 2h4v6h6v4h-6v10h-4V12H4V8h6V2z" />
            </svg>
            <div class="absolute bottom-1 right-1 bg-white rounded-full p-1 shadow">
                <svg class="w-3 h-3 text-indigo-500" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M8.707 13.707a1 1 0 01-1.414 0L3 9.414l4.293-4.293a1 1 0 111.414 1.414L5.414 9l3.293 3.293a1 1 0 010 1.414zM11.293 6.293a1 1 0 011.414 0L17 9.586l-4.293 4.293a1 1 0 01-1.414-1.414L14.586 9l-3.293-3.293a1 1 0 010-1.414z" />
                </svg>
            </div>
        </div>
        <span class="font-bold text-xl text-gray-800">
            <a href="{{ route('theme.attendance') }}">Petra Coding School</a>
        </span>
    </div>

    <div>
        @if (Auth::check())
            @if (request()->is('/'))

                <a href="{{ route('theme.dashboard') }}" class="bg-indigo-500 hover:bg-indigo-400 text-white font-semibold py-2 px-5 rounded-lg transition">
                    Dashboard
                </a>
            @else
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="bg-indigo-500 hover:bg-indigo-400 text-white font-semibold py-2 px-5 rounded-lg transition">
                        Logout
                    </button>
                </form>
            @endif
        @else
            <a href="{{ route('login') }}" class="bg-indigo-500 hover:bg-indigo-400 text-white font-semibold py-2 px-5 rounded-lg transition">
                Login
            </a>
        @endif
    </div>
</header>
