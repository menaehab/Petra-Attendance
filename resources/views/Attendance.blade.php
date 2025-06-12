@section('title','Petra Attendance System')
@include('parts.head')


<body class="bg-gray-100 text-gray-900 font-sans min-h-screen">

    @include('parts.navbar')


  <!-- Main Content -->
  <div class="flex items-center justify-center py-10">
    <div class="bg-white p-8 rounded-3xl shadow-2xl w-full max-w-xl">

      <div class="mb-10">
        <h2 class="text-center text-2xl font-bold text-indigo-600">Petra Attendance System</h2>
      </div>

      <!-- Clock + Timer -->
      <div class="flex justify-between items-center mb-6">
        <div class="text-center">
          <div id="date" class="text-lg font-semibold text-indigo-600"></div>
          <div id="time" class="text-2xl font-bold text-gray-800 mt-1"></div>
        </div>

        <!-- Timer Control -->
        <div class="flex flex-col items-center">
          <div class="flex space-x-1">
            <input id="minutes" type="number" placeholder="min" min="0" class="w-16 p-1 border rounded text-center">
            <input id="seconds" type="number" placeholder="sec" min="0" max="59" class="w-16 p-1 border rounded text-center">
          </div>
          <div class="flex space-x-2 mt-2">
            <button onclick="startTimer()" class="bg-indigo-500 text-white px-4 py-1 rounded hover:bg-indigo-400">Start</button>
            <button onclick="resetTimer()" class="bg-red-500 text-white px-4 py-1 rounded hover:bg-red-400">Reset</button>
          </div>
          <div id="timerDisplay" class="mt-2 text-lg font-semibold text-red-500">00:00</div>
        </div>
      </div>

      <!-- Scripts -->
      <script>
        function updateClock() {
          const now = new Date();
          const optionsDate = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
          const dateStr = now.toLocaleDateString('en-US', optionsDate);
          const timeStr = now.toLocaleTimeString('en-US');
          document.getElementById('date').innerText = dateStr;
          document.getElementById('time').innerText = timeStr;
        }
        updateClock();
        setInterval(updateClock, 1000);

        let timerInterval;

        function startTimer() {
          clearInterval(timerInterval);
          let minutes = parseInt(document.getElementById('minutes').value) || 0;
          let seconds = parseInt(document.getElementById('seconds').value) || 0;
          let totalSeconds = minutes * 60 + seconds;

          localStorage.setItem("timer", totalSeconds);

          updateTimer(totalSeconds);
          timerInterval = setInterval(() => {
            totalSeconds--;
            localStorage.setItem("timer", totalSeconds);
            updateTimer(totalSeconds);
            if (totalSeconds <= 0) {
              clearInterval(timerInterval);
              localStorage.removeItem("timer");
              alert("⏰ Time's up!");
            }
          }, 1000);
        }

        function updateTimer(totalSeconds) {
          let m = Math.floor(totalSeconds / 60);
          let s = totalSeconds % 60;
          document.getElementById('timerDisplay').innerText = `${m.toString().padStart(2, '0')}:${s.toString().padStart(2, '0')}`;
        }

        function resetTimer() {
          clearInterval(timerInterval);
          document.getElementById('timerDisplay').innerText = "00:00";
          localStorage.removeItem("timer");
        }


        window.onload = function () {
          const savedTimer = localStorage.getItem("timer");
          if (savedTimer && parseInt(savedTimer) > 0) {
            let totalSeconds = parseInt(savedTimer);
            updateTimer(totalSeconds);
            timerInterval = setInterval(() => {
              totalSeconds--;
              localStorage.setItem("timer", totalSeconds);
              updateTimer(totalSeconds);
              if (totalSeconds <= 0) {
                clearInterval(timerInterval);
                localStorage.removeItem("timer");
                alert("⏰ Time's up!");
              }
            }, 1000);
          }
        }
      </script>

      <!-- Form -->
      <form action="{{ route('attendance.store') }}" method="POST" class="flex items-center">
        @csrf
        <input type="text" placeholder="Code"
       class="flex-1 bg-gray-100 border p-3 rounded-xl outline-none text-gray-700 placeholder-gray-400"
       name="code" id="codeInput" autofocus>        <button class="ml-3 bg-indigo-500 w-12 h-12 rounded-full flex items-center justify-center text-white hover:bg-indigo-400 transition">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.707a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
          </svg>
        </button>
      </form>

    </div>
  </div>
  <script>
  window.onload = function () {
    document.getElementById('codeInput').focus();


    const savedTimer = localStorage.getItem("timer");
    if (savedTimer && parseInt(savedTimer) > 0) {
      let totalSeconds = parseInt(savedTimer);
      updateTimer(totalSeconds);
      timerInterval = setInterval(() => {
        totalSeconds--;
        localStorage.setItem("timer", totalSeconds);
        updateTimer(totalSeconds);
        if (totalSeconds <= 0) {
          clearInterval(timerInterval);
          localStorage.removeItem("timer");
          alert("⏰ Time's up!");
        }
      }, 1000);
    }
  }
</script>


</body>

</html>
