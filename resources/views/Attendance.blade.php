@extends('master')
@section('content')
    <div class="flex items-center justify-center py-10">
        <div class="w-full max-w-xl p-8 bg-white shadow-2xl rounded-3xl">

            <div class="mb-10">
                <h2 class="text-2xl font-bold text-center text-indigo-600">Petra Attendance System</h2>
            </div>

            <!-- Clock + Timer -->
            <div class="flex items-center justify-between mb-6">
                <div class="text-center">
                    <div id="date" class="text-lg font-semibold text-indigo-600"></div>
                    <div id="time" class="mt-1 text-2xl font-bold text-gray-800"></div>
                </div>

                <!-- Timer Control -->
                <div class="flex flex-col items-center">
                    <div class="flex space-x-1">
                        <input id="minutes" type="number" placeholder="min" min="0"
                            class="w-16 p-1 text-center border rounded">
                        <input id="seconds" type="number" placeholder="sec" min="0" max="59"
                            class="w-16 p-1 text-center border rounded">
                    </div>
                    <div class="flex mt-2 space-x-2">
                        <button onclick="startTimer()"
                            class="px-4 py-1 text-white bg-indigo-500 rounded hover:bg-indigo-400 ">Start</button>
                        <button onclick="resetTimer()"
                            class="px-4 py-1 text-white bg-red-500 rounded hover:bg-red-400 mr-3">Reset</button>
                    </div>
                    <div id="timerDisplay" class="mt-2 text-lg font-semibold text-red-500">00:00</div>
                </div>
            </div>

            <!-- Scripts -->
            <script>
                function updateClock() {
                    const now = new Date();
                    const optionsDate = {
                        weekday: 'long',
                        year: 'numeric',
                        month: 'long',
                        day: 'numeric'
                    };
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
                    document.getElementById('timerDisplay').innerText =
                        `${m.toString().padStart(2, '0')}:${s.toString().padStart(2, '0')}`;
                }

                function resetTimer() {
                    clearInterval(timerInterval);
                    document.getElementById('timerDisplay').innerText = "00:00";
                    localStorage.removeItem("timer");
                }


                window.onload = function() {
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
                    class="flex-1 p-3 text-gray-700 placeholder-gray-400 bg-gray-100 border outline-none rounded-xl"
                    name="code" id="codeInput" autofocus> <button
                    class="flex items-center justify-center w-12 h-12 ml-3 text-white transition bg-indigo-500 rounded-full hover:bg-indigo-400">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.707a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                            clip-rule="evenodd" />
                    </svg>
                </button>
            </form>

        </div>
    </div>
    <script>
        window.onload = function() {
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
@endsection
