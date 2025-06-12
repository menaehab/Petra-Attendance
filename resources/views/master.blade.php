<!DOCTYPE html>
<html lang="en">

@include('parts.head')

<body class="min-h-screen font-sans text-gray-900 bg-gray-100" dir="rtl">

    @include('parts.navbar')

    @yield('content')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</body>

</html>
