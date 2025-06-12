
@section('title','Dashboard')
@include('parts.head')

<body class="bg-[#f5f7fa] text-gray-900 font-sans min-h-screen">

    @include('parts.navbar')

  <!-- Dashboard -->
  <div class="max-w-7xl mx-auto py-10 px-5">

    <h1 class="text-3xl font-bold text-indigo-600 mb-10 text-center">Attendance Dashboard</h1>

    <!-- Summary -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">
      <div class="bg-gradient-to-tr from-yellow-300 to-yellow-400 p-6 rounded-2xl flex flex-col items-center shadow-lg">
        <div class="text-5xl mb-3">📅</div>
        <div class="text-lg font-semibold">Total Sessions</div>
        <div class="text-3xl mt-2 font-bold">24</div>
      </div>

      <div class="bg-gradient-to-tr from-green-300 to-green-400 p-6 rounded-2xl flex flex-col items-center shadow-lg">
        <div class="text-5xl mb-3">✅</div>
        <div class="text-lg font-semibold">Total Present</div>
        <div class="text-3xl mt-2 font-bold">532</div>
      </div>

      <div class="bg-gradient-to-tr from-red-300 to-red-400 p-6 rounded-2xl flex flex-col items-center shadow-lg">
        <div class="text-5xl mb-3">❌</div>
        <div class="text-lg font-semibold">Total Absent</div>
        <div class="text-3xl mt-2 font-bold">41</div>
      </div>
    </div>


    <!-- LEVEL 1 - Group A -->
    <div class="mb-10">
      <h2 class="text-2xl font-bold text-indigo-500 mb-4">Group A</h2>
      <div class="bg-white rounded-3xl shadow-xl overflow-hidden">
        <div class="p-5 border-b text-lg font-semibold bg-indigo-500 text-white">
          Students Attendance
        </div>
        <div class="overflow-x-auto">
          <table class="min-w-full text-sm text-left">
            <thead class="bg-indigo-100 text-indigo-600">
              <tr>
                <th class="px-6 py-3">Name</th>
                <th class="px-6 py-3">Code</th>
                <th class="px-6 py-3">Phone</th>
                <th class="px-6 py-3">Streak</th>
              </tr>
            </thead>
            <tbody class="bg-white text-gray-700">
              <tr class="border-b hover:bg-gray-50">
                <td class="px-6 py-4">Ahmed Gamal</td>
                <td class="px-6 py-4">C-1001</td>
                <td class="px-6 py-4">01012345678</td>
                <td class="px-6 py-4">
                  <div class="flex space-x-1">
                    <div class="w-3 h-3 rounded-full bg-green-400"></div>
                    <div class="w-3 h-3 rounded-full bg-green-400"></div>
                    <div class="w-3 h-3 rounded-full bg-red-400"></div>
                    <div class="w-3 h-3 rounded-full bg-green-400"></div>
                    <div class="w-3 h-3 rounded-full bg-green-400"></div>
                    <div class="w-3 h-3 rounded-full bg-red-400"></div>
                    <div class="w-3 h-3 rounded-full bg-green-400"></div>
                    <div class="w-3 h-3 rounded-full bg-green-400"></div>
                    <div class="w-3 h-3 rounded-full bg-green-400"></div>
                  </div>
                </td>
              </tr>

              <tr class="border-b hover:bg-gray-50">
                <td class="px-6 py-4">Sara Adel</td>
                <td class="px-6 py-4">C-1002</td>
                <td class="px-6 py-4">01098765432</td>
                <td class="px-6 py-4">
                  <div class="flex space-x-1">
                    <div class="w-3 h-3 rounded-full bg-red-400"></div>
                    <div class="w-3 h-3 rounded-full bg-green-400"></div>
                    <div class="w-3 h-3 rounded-full bg-green-400"></div>
                    <div class="w-3 h-3 rounded-full bg-red-400"></div>
                    <div class="w-3 h-3 rounded-full bg-green-400"></div>
                    <div class="w-3 h-3 rounded-full bg-red-400"></div>
                    <div class="w-3 h-3 rounded-full bg-green-400"></div>
                    <div class="w-3 h-3 rounded-full bg-red-400"></div>
                    <div class="w-3 h-3 rounded-full bg-green-400"></div>
                  </div>
                </td>
              </tr>

            </tbody>
          </table>
        </div>
      </div>
    </div>



    <div class="mb-10">
      <h2 class="text-2xl font-bold text-indigo-500 mb-4">Group B</h2>
      <div class="bg-white rounded-3xl shadow-xl overflow-hidden">
        <div class="p-5 border-b text-lg font-semibold bg-indigo-500 text-white">
          Students Attendance
        </div>
        <div class="overflow-x-auto">
          <table class="min-w-full text-sm text-left">
            <thead class="bg-indigo-100 text-indigo-600">
              <tr>
                <th class="px-6 py-3">Name</th>
                <th class="px-6 py-3">Code</th>
                <th class="px-6 py-3">Phone</th>
                <th class="px-6 py-3">Streak</th>
              </tr>
            </thead>
            <tbody class="bg-white text-gray-700">
              <tr class="border-b hover:bg-gray-50">
                <td class="px-6 py-4">Ahmed Gamal</td>
                <td class="px-6 py-4">C-1001</td>
                <td class="px-6 py-4">01012345678</td>
                <td class="px-6 py-4">
                  <div class="flex space-x-1">
                    <div class="w-3 h-3 rounded-full bg-green-400"></div>
                    <div class="w-3 h-3 rounded-full bg-green-400"></div>
                    <div class="w-3 h-3 rounded-full bg-red-400"></div>
                    <div class="w-3 h-3 rounded-full bg-green-400"></div>
                    <div class="w-3 h-3 rounded-full bg-green-400"></div>
                    <div class="w-3 h-3 rounded-full bg-red-400"></div>
                    <div class="w-3 h-3 rounded-full bg-green-400"></div>
                    <div class="w-3 h-3 rounded-full bg-green-400"></div>
                    <div class="w-3 h-3 rounded-full bg-green-400"></div>
                  </div>
                </td>
              </tr>

              <tr class="border-b hover:bg-gray-50">
                <td class="px-6 py-4">Sara Adel</td>
                <td class="px-6 py-4">C-1002</td>
                <td class="px-6 py-4">01098765432</td>
                <td class="px-6 py-4">
                  <div class="flex space-x-1">
                    <div class="w-3 h-3 rounded-full bg-red-400"></div>
                    <div class="w-3 h-3 rounded-full bg-green-400"></div>
                    <div class="w-3 h-3 rounded-full bg-green-400"></div>
                    <div class="w-3 h-3 rounded-full bg-red-400"></div>
                    <div class="w-3 h-3 rounded-full bg-green-400"></div>
                    <div class="w-3 h-3 rounded-full bg-red-400"></div>
                    <div class="w-3 h-3 rounded-full bg-green-400"></div>
                    <div class="w-3 h-3 rounded-full bg-red-400"></div>
                    <div class="w-3 h-3 rounded-full bg-green-400"></div>
                  </div>
                </td>
              </tr>

            </tbody>
          </table>
        </div>
      </div>
    </div>


  </div>

</body>

</html>
