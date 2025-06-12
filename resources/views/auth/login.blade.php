
@section('title','Login')
@include('parts.head')
@section('mode','Login')
<body class="bg-gray-100 min-h-screen font-sans">

  <!-- Navbar -->
        @include('parts.navbar')

  <!-- Login Form -->
  <div class="flex items-center justify-center min-h-[calc(100vh-80px)]">
    <div class="bg-white p-10 rounded-3xl shadow-2xl w-full max-w-md">
      <!-- Logo -->
      <div class="flex items-center justify-center mb-8">
        <div class="flex items-center justify-center w-14 h-14 bg-gradient-to-tr from-purple-600 to-indigo-500 rounded-full shadow-lg mr-3">
          <!-- Admin Management Icon -->
          <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" viewBox="0 0 24 24" fill="currentColor">
            <path d="M12 12c2.21 0 4-1.79 4-4S14.21 4 12 4 8 5.79 8 8s1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z" />
          </svg>
        </div>
        <div class="text-2xl font-bold text-gray-800">Petra <span class="text-indigo-500">Admin Panel</span></div>
      </div>

      <h2 class="text-center text-2xl font-semibold mb-6 text-gray-700">Admin Login</h2>

      <form action="{{ route('login') }}" id="loginForm" class="space-y-5" method="POST" >
       @csrf
        <div>
            <label for="email" class="block mb-2 text-sm font-medium text-gray-600">Email</label>
            <input type="email" id="email" name="email" required class="w-full p-3 rounded-xl bg-gray-100 border border-gray-300 text-gray-700 outline-none focus:ring-2 focus:ring-indigo-400">
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div>
            <label for="password" class="block mb-2 text-sm font-medium text-gray-600">Password</label>
            <input type="password" id="password" name="password" required class="w-full p-3 rounded-xl bg-gray-100 border border-gray-300 text-gray-700 outline-none focus:ring-2 focus:ring-indigo-400">
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <button type="submit"
          class="w-full bg-indigo-500 hover:bg-indigo-400 text-white font-semibold py-3 rounded-xl shadow-md transition">
          Login
        </button>
      </form>
    </div>
  </div>



</body>

</html>
