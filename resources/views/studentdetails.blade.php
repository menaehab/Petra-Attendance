@section('title','Student Details')
@include('parts.head')

<body class="bg-[#f5f7fa] text-gray-900 font-sans min-h-screen">

    @include('parts.navbar')

  <!-- Student Details -->
  <div class="max-w-7xl mx-auto py-10 px-5">

    <h1 class="text-3xl font-bold text-indigo-600 mb-10 text-center">Student Details</h1>

    <!-- Student Info -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">
      <div class="bg-gradient-to-tr from-yellow-300 to-yellow-400 p-6 rounded-2xl flex flex-col items-center shadow-lg">
        <div class="text-lg font-semibold mb-1">Name</div>
        <div class="text-2xl font-bold">Ahmed Gamal</div>
      </div>

      <div class="bg-gradient-to-tr from-green-300 to-green-400 p-6 rounded-2xl flex flex-col items-center shadow-lg">
        <div class="text-lg font-semibold mb-1">Code</div>
        <div class="text-2xl font-bold">C-1001</div>
      </div>

      <div class="bg-gradient-to-tr from-blue-300 to-blue-400 p-6 rounded-2xl flex flex-col items-center shadow-lg">
        <div class="text-lg font-semibold mb-1">Phone</div>
        <div class="text-2xl font-bold">01012345678</div>
      </div>
    </div>

    <!-- Session Details Table -->
    <div class="bg-white rounded-3xl shadow-xl overflow-hidden">
      <div class="p-5 border-b text-lg font-semibold bg-indigo-500 text-white">
        Sessions Details
      </div>
      <div class="overflow-x-auto">
        <table class="min-w-full text-sm text-left">
          <thead class="bg-indigo-100 text-indigo-600">
            <tr>
              <th class="px-6 py-3">Session</th>
              <th class="px-6 py-3">Date</th>
              <th class="px-6 py-3">Duration</th>
              <th class="px-6 py-3">Status</th>
            </tr>
          </thead>
          <tbody class="bg-white text-gray-700">
            <tr class="border-b hover:bg-gray-50">
              <td class="px-6 py-4">Session 1</td>
              <td class="px-6 py-4">2025-06-10</td>
              <td class="px-6 py-4">4h 30m</td>
              <td class="px-6 py-4 text-green-500 font-bold">Present</td>
            </tr>

            <tr class="border-b hover:bg-gray-50">
              <td class="px-6 py-4">Session 2</td>
              <td class="px-6 py-4">2025-06-11</td>
              <td class="px-6 py-4">2h 10m</td>
              <td class="px-6 py-4 text-yellow-500 font-bold">Late</td>
            </tr>

            <tr class="border-b hover:bg-gray-50">
              <td class="px-6 py-4">Session 3</td>
              <td class="px-6 py-4">2025-06-12</td>
              <td class="px-6 py-4">0h</td>
              <td class="px-6 py-4 text-red-500 font-bold">Absent</td>
            </tr>

          </tbody>
        </table>
      </div>
    </div>

  </div>

</body>
</html>
