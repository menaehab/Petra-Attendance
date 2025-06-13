@section('title', 'Login')
@include('parts.head')
@section('mode', 'Login')

<body class="bg-gray-100 min-h-screen font-sans" dir="rtl">

    <!-- Navbar -->
    @include('parts.navbar')

    <!-- Login Form -->
    <div class="flex items-center justify-center min-h-[calc(100vh-80px)]">
        <div class="bg-white p-10 rounded-3xl shadow-2xl w-full max-w-md">
            <!-- Logo -->
            <div class="flex items-center justify-center mb-8">
                <div class="text-5xl font-bold text-gray-800"><span
                        class="text-indigo-500">{{ __('keywords.admin_panel') }}</span> {{ __('keywords.petra') }}</div>
            </div>

            <h2 class="text-center text-2xl font-semibold mb-6 text-gray-700">{{ __('Login') }}</h2>

            <form action="{{ route('login') }}" id="loginForm" class="space-y-5" method="POST">
                @csrf
                <div>
                    <label for="email"
                        class="block mb-2 text-sm font-medium text-gray-600">{{ __('Email') }}</label>
                    <input type="email" id="email" name="email" required
                        class="w-full p-3 rounded-xl bg-gray-100 border border-gray-300 text-gray-700 outline-none focus:ring-2 focus:ring-indigo-400">
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <div>
                    <label for="password"
                        class="block mb-2 text-sm font-medium text-gray-600">{{ __('Password') }}</label>
                    <input type="password" id="password" name="password" required
                        class="w-full p-3 rounded-xl bg-gray-100 border border-gray-300 text-gray-700 outline-none focus:ring-2 focus:ring-indigo-400">
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <button type="submit"
                    class="w-full bg-indigo-500 hover:bg-indigo-400 text-white font-semibold py-3 rounded-xl shadow-md transition">
                    {{ __('Login') }}
                </button>
            </form>
        </div>
    </div>



</body>

</html>
