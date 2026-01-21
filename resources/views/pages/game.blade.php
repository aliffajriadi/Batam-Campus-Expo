<x-layout.app :title="'Campus Logo Quiz - Batam Campus Expo'">

    <section id="minigame-section" class="relative min-h-screen w-full py-12 md:py-16 lg:py-20 z-10 overflow-hidden"
        style="background-color: #EFE4B7;">
        <!-- BACKGROUND DECORATION -->
        <div class="absolute inset-0 opacity-10 pointer-events-none">
            <svg width="100%" height="100%" xmlns="http://www.w3.org/2000/svg">
                <defs>
                    <pattern id="carnivalLights" x="0" y="0" width="80" height="80" patternUnits="userSpaceOnUse">
                        <circle cx="15" cy="15" r="2" fill="#fbbf24" opacity="0.6">
                            <animate attributeName="opacity" values="0.3;1;0.3" dur="2s"
                                repeatCount="indefinite" />
                        </circle>
                        <circle cx="40" cy="40" r="2" fill="#D32F2F" opacity="0.6">
                            <animate attributeName="opacity" values="1;0.3;1" dur="2.5s" repeatCount="indefinite" />
                        </circle>
                    </pattern>
                </defs>
                <rect width="100%" height="100%" fill="url(#carnivalLights)" />
            </svg>
        </div>

        <div class="container mx-auto px-4 md:px-6 lg:px-8 relative z-10">
            <!-- HEADER -->
            <div class="text-center mb-8 md:mb-12">
                <h1 class="font-sancreek uppercase text-[#D32F2F] text-4xl md:text-5xl lg:text-6xl mb-3 [text-shadow:_1px_1px_0_rgba(255,99,132,0.4),_0_0_14px_rgba(255,182,193,0.5)]">
                    Campus Logo Quiz
                </h1>
                <p class="text-gray-800 text-base md:text-lg max-w-2xl mx-auto font-semibold px-4">
                    Seberapa kenal kamu dengan kampus-kampus di Indonesia? <br class="hidden sm:block"> Tebak logonya dan jadilah yang tercepat!
                </p>
            </div>

            <div class="flex flex-col lg:grid lg:grid-cols-12 gap-6 lg:gap-8 items-start max-w-7xl mx-auto">
                <!-- LEADERBOARD CONTAINER -->
                <div class="lg:col-span-5 w-full bg-white/95 backdrop-blur-md rounded-3xl p-6 md:p-8 shadow-2xl border-4 border-[#fbbf24]/30 lg:sticky lg:top-24">
                    <!-- Header -->
                    <div class="flex items-center gap-4 mb-6 md:mb-8">
                        <div class="bg-gradient-to-br from-[#fbbf24] to-[#f59e0b] p-3 md:p-4 rounded-2xl shadow-xl transform -rotate-3 shrink-0">
                            <svg class="w-8 h-8 md:w-9 md:h-9 text-white" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-2xl md:text-3xl font-sancreek text-[#D32F2F] tracking-wide">Papan Juara</h3>
                            <p class="text-gray-500 font-bold text-xs uppercase tracking-wider">10 Pemain Terbaik</p>
                        </div>
                    </div>

                    <!-- Table -->
                    <div class="overflow-x-auto rounded-2xl border-2 border-gray-50 shadow-inner bg-gray-50/30">
                        <table class="w-full text-left min-w-[300px]">
                            <thead class="bg-white/50 text-gray-500 uppercase text-xs font-black tracking-widest border-b border-gray-100">
                                <tr>
                                    <th class="px-4 md:px-6 py-3 md:py-4">#</th>
                                    <th class="px-3 md:px-4 py-3 md:py-4">Pemain</th>
                                    <th class="px-3 md:px-4 py-3 md:py-4">Skor</th>
                                    <th class="px-4 md:px-6 py-3 md:py-4 text-right">Waktu</th>
                                </tr>
                            </thead>
                            <tbody id="leaderboard-body" class="divide-y divide-gray-100">
                                <tr>
                                    <td colspan="4" class="px-6 py-12 text-center text-gray-400 italic">
                                        <div class="animate-pulse flex flex-col items-center">
                                            <div class="h-8 w-8 bg-gray-200 rounded-full mb-2"></div>
                                            Memanggil para jawara...
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <!-- Info Box -->
                    <div class="mt-6 md:mt-8 p-4 md:p-5 bg-gradient-to-br from-yellow-50 to-orange-50 rounded-2xl border-2 border-yellow-100 text-yellow-800 text-sm md:text-base font-bold text-center italic shadow-inner">
                        <span class="mr-2">💡</span> Klaim Skor setelah bermain untuk masuk daftar ini!
                    </div>
                </div>

                <!-- GAME CONTAINER -->
                <div class="lg:col-span-7 w-full bg-white/90 backdrop-blur-md rounded-3xl p-6 md:p-8 lg:p-10 shadow-2xl border-8 border-white relative overflow-hidden min-h-[480px] md:min-h-[520px] flex flex-col items-center justify-center">
                    
                    <!-- START SCREEN -->
                    <div id="game-start-screen" class="text-center z-10 w-full max-w-md mx-auto px-4">
                        <div class="relative w-32 h-32 md:w-36 md:h-36 mx-auto mb-6 md:mb-8">
                            <img src="{{ asset('images/Countdown.svg') }}" class="w-full animate-bounce" alt="Game Start">
                            <div class="absolute inset-0 flex items-center justify-center">
                                <span class="text-3xl md:text-4xl font-sancreek text-[#D32F2F]">?</span>
                            </div>
                        </div>

                        @auth
                            <div class="mb-6 md:mb-8">
                                <div class="flex items-center justify-center gap-3 md:gap-4 mb-3 md:mb-4">
                                    <img src="{{ auth()->user()->photo ? (Str::startsWith(auth()->user()->photo, 'http') ? auth()->user()->photo : asset('storage/' . auth()->user()->photo)) : asset('images/default-avatar.svg') }}"
                                        class="w-14 h-14 md:w-16 md:h-16 rounded-full border-4 border-[#fbbf24] shadow-lg object-cover shrink-0"
                                        alt="{{ auth()->user()->name }}">
                                    <div class="text-left overflow-hidden">
                                        <p class="text-gray-500 text-xs font-bold uppercase tracking-wider">Selamat Datang,</p>
                                        <h4 class="text-xl md:text-2xl font-black text-gray-800 truncate max-w-[180px] md:max-w-none">
                                            {{ auth()->user()->name }}
                                        </h4>
                                    </div>
                                </div>
                                <p class="text-gray-600 font-medium text-sm md:text-base mb-6">Siap pecahkan rekor hari ini?</p>
                            </div>
                            <button id="start-game-btn"
                                class="ticket-button w-full md:w-auto !py-3 md:!py-4 !px-8 md:!px-12 !text-lg md:!text-xl shadow-[0_8px_0_#B71C1C] hover:shadow-[0_4px_0_#B71C1C] active:shadow-none translate-y-[-8px] active:translate-y-0 transition-all">
                                Mulai Petualangan!
                            </button>
                        @else
                            <div class="bg-red-50 border-4 border-dashed border-red-200 rounded-3xl p-6 md:p-8">
                                <h4 class="text-xl md:text-2xl font-black text-red-600 mb-2">Ops! Kamu Belum Login</h4>
                                <p class="text-gray-600 font-medium mb-6 text-sm md:text-base">Silakan login untuk ikut quiz dan masuk papan juara!</p>
                                <a href="{{ route('google.login') }}"
                                    class="inline-flex items-center justify-center gap-3 bg-white hover:bg-gray-50 text-gray-700 font-bold py-3 px-6 md:px-8 rounded-2xl border-4 border-gray-100 transition-all shadow-lg w-full md:w-auto">
                                    <img src="https://www.gstatic.com/firebasejs/ui/2.0.0/images/auth/google.svg"
                                        class="w-5 h-5 md:w-6 md:h-6" alt="Google">
                                    Login dengan Google
                                </a>
                            </div>
                        @endauth
                    </div>

                    <!-- PLAY SCREEN -->
                    <div id="game-play-screen" class="hidden w-full text-center z-10 max-w-2xl mx-auto px-4">
                        <!-- Stats Bar -->
                        <div class="flex flex-wrap justify-between items-center mb-6 md:mb-8 gap-3">
                            <div class="bg-gradient-to-r from-[#D32F2F] to-[#B71C1C] text-white px-4 md:px-6 py-2 rounded-2xl font-bold shadow-lg text-sm md:text-base">
                                Skor: <span id="game-score" class="text-lg md:text-xl">0</span>
                            </div>
                            <div class="flex flex-col items-center">
                                <div class="text-[#D32F2F] font-sancreek text-3xl md:text-4xl" id="game-timer">15s</div>
                                <div class="w-24 md:w-32 h-2 bg-gray-200 rounded-full mt-2 overflow-hidden">
                                    <div id="timer-bar" class="h-full bg-[#D32F2F] transition-all duration-1000 ease-linear" style="width: 100%"></div>
                                </div>
                            </div>
                            <div class="bg-gradient-to-r from-[#fbbf24] to-[#f59e0b] text-white px-4 md:px-6 py-2 rounded-2xl font-bold shadow-lg text-sm md:text-base">
                                Soal: <span id="game-level" class="text-lg md:text-xl">1</span>/10
                            </div>
                        </div>

                        <!-- LOGO CLUE -->
                        <div class="relative w-44 h-44 md:w-64 md:h-64 mx-auto mb-6 md:mb-8 bg-gradient-to-br from-white to-gray-50 rounded-2xl shadow-2xl border-4 border-gray-100 overflow-hidden flex items-center justify-center">
                            <div id="logo-clue-container" class="transition-all duration-700 transform scale-150">
                                <img id="logo-clue-img" src=""
                                    class="max-w-none filter blur-md grayscale opacity-90 transition-all duration-700 h-full w-auto"
                                    alt="Clue">
                            </div>
                            <div class="absolute inset-0 bg-gradient-to-tr from-black/10 via-transparent to-white/10"></div>
                            <div class="absolute inset-0 shadow-[inset_0_0_60px_rgba(0,0,0,0.1)] pointer-events-none"></div>
                        </div>

                        <!-- OPTIONS -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-3 md:gap-4 w-full" id="game-options">
                            <!-- Options will be injected here -->
                        </div>
                    </div>

                    <!-- RESULT SCREEN -->
                    <div id="game-result-screen" class="hidden text-center z-10 w-full max-w-md mx-auto px-4">
                        <div class="mb-4 md:mb-6">
                            <span class="text-6xl md:text-7xl">🎉</span>
                        </div>
                        <h3 class="text-3xl md:text-4xl font-sancreek text-[#D32F2F] mb-4 md:mb-6">Selesai!</h3>
                        <div class="bg-[#EFE4B7]/50 rounded-3xl p-6 md:p-8 mb-6 md:mb-8 border-4 border-dashed border-[#D32F2F]/20">
                            <p class="text-gray-600 mb-2 font-bold uppercase tracking-widest text-xs">Skor Akhir Kamu</p>
                            <p class="text-5xl md:text-6xl font-black text-[#D32F2F]" id="final-score">0</p>
                        </div>
                        <div class="flex flex-col md:flex-row gap-3 md:gap-4 justify-center">
                            <button id="restart-game-btn"
                                class="bg-white hover:bg-gray-50 text-gray-700 font-bold py-3 md:py-4 px-6 md:px-8 rounded-2xl border-4 border-gray-100 transition-all shadow-lg w-full md:w-auto">
                                Ulangi Lagi
                            </button>
                            <button id="submit-score-btn"
                                class="bg-[#D32F2F] hover:bg-[#B71C1C] text-white font-bold py-3 md:py-4 px-6 md:px-10 rounded-2xl transition-all shadow-xl hover:scale-105 transform w-full md:w-auto">
                                Klaim Juara!
                            </button>
                        </div>
                    </div>

                    <!-- Decorative Patterns -->
                    <div class="absolute -top-20 -right-20 w-56 md:w-64 h-56 md:h-64 bg-[#D32F2F]/5 rounded-full blur-3xl pointer-events-none"></div>
                    <div class="absolute -bottom-20 -left-20 w-56 md:w-64 h-56 md:h-64 bg-[#fbbf24]/5 rounded-full blur-3xl pointer-events-none"></div>
                </div>
            </div>
        </div>
    </section>

    @push('scripts')
        <script>
            // --- MINIGAME LOGIC ---
            let currentGameQuestions = [];
            let currentQuestionIndex = 0;
            let gameScore = 0;
            let gameTimer;
            let timeLeft = 15;
            let gameStartTime;

            const gameStartScreen = document.getElementById('game-start-screen');
            const gamePlayScreen = document.getElementById('game-play-screen');
            const gameResultScreen = document.getElementById('game-result-screen');
            const startBtn = document.getElementById('start-game-btn');
            const restartBtn = document.getElementById('restart-game-btn');
            const submitScoreBtn = document.getElementById('submit-score-btn');

            const gameScoreEl = document.getElementById('game-score');
            const gameTimerEl = document.getElementById('game-timer');
            const timerBar = document.getElementById('timer-bar');
            const gameLevelEl = document.getElementById('game-level');
            const logoClueImg = document.getElementById('logo-clue-img');
            const logoClueContainer = document.getElementById('logo-clue-container');
            const gameOptionsEl = document.getElementById('game-options');
            const finalScoreEl = document.getElementById('final-score');
            const leaderboardBody = document.getElementById('leaderboard-body');

            // Load Leaderboard on init
            loadLeaderboard();

            async function loadLeaderboard() {
                try {
                    const response = await fetch('{{ route('game.leaderboard') }}');
                    const data = await response.json();

                    leaderboardBody.innerHTML = '';
                    if (data.length === 0) {
                        leaderboardBody.innerHTML =
                            '<tr><td colspan="4" class="px-6 py-8 text-center text-gray-500 italic">Belum ada skor. Jadi yang pertama!</td></tr>';
                        return;
                    }

                    data.forEach((item, index) => {
                        const rankClass = index === 0 ? 'bg-yellow-400 text-white' : (index === 1 ?
                            'bg-gray-300 text-white' : (index === 2 ? 'bg-orange-400 text-white' :
                                'bg-gray-100 text-gray-400'));
                        const rankIcon = index === 0 ? '🏆' : (index === 1 ? '🥈' : (index === 2 ? '🥉' : index + 1));

                        const userPhoto = item.user && item.user.photo ?
                            (item.user.photo.startsWith('http') ? item.user.photo : `/storage/${item.user.photo}`) :
                            '{{ asset('images/default-avatar.svg') }}';

                        leaderboardBody.innerHTML += `
                            <tr class="hover:bg-white transition-all group">
                                <td class="px-4 md:px-6 py-4">
                                    <div class="flex items-center justify-center">
                                        <span class="w-9 h-9 md:w-10 md:h-10 flex items-center justify-center rounded-xl ${rankClass} shadow-sm group-hover:scale-110 transition-transform text-sm md:text-base">${rankIcon}</span>
                                    </div>
                                </td>
                                <td class="px-3 md:px-4 py-4">
                                    <div class="flex items-center gap-2 md:gap-3">
                                        <img src="${userPhoto}" class="w-9 h-9 md:w-10 md:h-10 rounded-full object-cover border-2 border-gray-100 shrink-0" alt="${item.username}">
                                        <span class="font-bold text-gray-800 text-sm md:text-base truncate">${item.username}</span>
                                    </div>
                                </td>
                                <td class="px-3 md:px-4 py-4 text-[#D32F2F] font-black text-lg md:text-xl">${item.score}</td>
                                <td class="px-4 md:px-6 py-4 text-gray-400 text-xs md:text-sm font-bold text-right">${item.time_taken}d</td>
                            </tr>
                        `;
                    });
                } catch (error) {
                    console.error('Error loading leaderboard:', error);
                }
            }

            startBtn.addEventListener('click', startGame);
            restartBtn.addEventListener('click', startGame);

            async function startGame() {
                @guest
                alert('Silakan login terlebih dahulu!');
                return;
                @endguest

                gameStartScreen.classList.add('hidden');
                gameResultScreen.classList.add('hidden');
                gamePlayScreen.classList.remove('hidden');

                gameScore = 0;
                currentQuestionIndex = 0;
                gameScoreEl.textContent = '0';
                gameStartTime = Date.now();

                try {
                    const response = await fetch('{{ route('game.questions') }}');
                    currentGameQuestions = await response.json();
                    showQuestion();
                } catch (error) {
                    console.error('Error fetching questions:', error);
                    alert('Gagal mengambil data pertanyaan. Coba lagi nanti.');
                }
            }

            function showQuestion() {
                if (currentQuestionIndex >= currentGameQuestions.length) {
                    endGame();
                    return;
                }

                const question = currentGameQuestions[currentQuestionIndex];
                gameLevelEl.textContent = currentQuestionIndex + 1;

                // Set clue logo
                logoClueImg.src = question.logo;

                // Randomly apply transform for "clue" effect
                const crops = [
                    'scale-150 translate-x-12 translate-y-12',
                    'scale-150 -translate-x-12 translate-y-12',
                    'scale-150 translate-x-12 -translate-y-12',
                    'scale-150 -translate-x-12 -translate-y-12',
                    'scale-200'
                ];
                const randomCrop = crops[Math.floor(Math.random() * crops.length)];
                logoClueContainer.className = 'transition-all duration-700 transform ' + randomCrop;
                logoClueImg.className = 'max-w-none filter blur-md grayscale opacity-90';

                // Render options
                gameOptionsEl.innerHTML = '';
                question.options.forEach(option => {
                    const btn = document.createElement('button');
                    btn.className =
                        'bg-white hover:bg-[#D32F2F] hover:text-white text-gray-700 font-bold py-3 md:py-4 px-4 md:px-6 rounded-2xl border-4 border-gray-50 hover:border-[#D32F2F] transition-all duration-200 text-base md:text-lg shadow-sm hover:shadow-xl hover:scale-105 transform';
                    btn.textContent = option;
                    btn.onclick = () => checkAnswer(option, question.correct_answer);
                    gameOptionsEl.appendChild(btn);
                });

                startTimer();
            }

            function startTimer() {
                clearInterval(gameTimer);
                timeLeft = 15;
                gameTimerEl.textContent = timeLeft + 's';
                gameTimerEl.className = 'text-[#D32F2F] font-sancreek text-3xl md:text-4xl';
                timerBar.style.width = '100%';
                timerBar.className = 'h-full bg-[#D32F2F] transition-all duration-1000 ease-linear';

                gameTimer = setInterval(() => {
                    timeLeft--;
                    gameTimerEl.textContent = timeLeft + 's';
                    timerBar.style.width = (timeLeft / 15 * 100) + '%';

                    if (timeLeft <= 5) {
                        gameTimerEl.classList.add('animate-pulse');
                        gameTimerEl.className = 'text-red-600 font-sancreek text-4xl md:text-5xl animate-pulse';
                        timerBar.className = 'h-full bg-red-600 transition-all duration-1000 ease-linear';
                    }

                    if (timeLeft <= 0) {
                        clearInterval(gameTimer);
                        nextQuestion();
                    }
                }, 1000);
            }

            function checkAnswer(selected, correct) {
                clearInterval(gameTimer);

                const buttons = gameOptionsEl.querySelectorAll('button');
                buttons.forEach(btn => btn.disabled = true);

                if (selected === correct) {
                    // Correct! Score based on time left
                    const points = timeLeft * 10 + 50;
                    gameScore += points;
                    gameScoreEl.textContent = gameScore;

                    // Show full logo as reward
                    logoClueContainer.className = 'transition-all duration-700 transform scale-100';
                    logoClueImg.className = 'max-w-full filter-none grayscale-0 opacity-100';

                    // Highlight correct btn
                    buttons.forEach(btn => {
                        if (btn.textContent === correct) {
                            btn.className =
                                'bg-green-500 text-white font-bold py-3 md:py-4 px-4 md:px-6 rounded-2xl border-4 border-green-600 shadow-xl scale-110 z-10';
                        }
                    });
                } else {
                    // Wrong
                    buttons.forEach(btn => {
                        if (btn.textContent === selected) {
                            btn.className =
                                'bg-red-500 text-white font-bold py-3 md:py-4 px-4 md:px-6 rounded-2xl border-4 border-red-600 shadow-md';
                        }
                        if (btn.textContent === correct) {
                            btn.className =
                                'bg-green-500 text-white font-bold py-3 md:py-4 px-4 md:px-6 rounded-2xl border-4 border-green-600 shadow-md scale-105';
                        }
                    });

                    // Slightly reveal logo
                    logoClueContainer.className = 'transition-all duration-700 transform scale-110';
                    logoClueImg.className = 'max-w-full filter-none grayscale-0 opacity-40';
                }

                setTimeout(nextQuestion, 2000);
            }

            function nextQuestion() {
                currentQuestionIndex++;
                showQuestion();
            }

            function endGame() {
                clearInterval(gameTimer);
                const totalTime = Math.floor((Date.now() - gameStartTime) / 1000);

                gamePlayScreen.classList.add('hidden');
                gameResultScreen.classList.remove('hidden');
                finalScoreEl.textContent = gameScore;

                submitScoreBtn.classList.remove('hidden');
                submitScoreBtn.disabled = false;
                submitScoreBtn.textContent = 'Klaim Papan Skor!';
                submitScoreBtn.onclick = () => submitScore(totalTime);
            }

            async function submitScore(totalTime) {
                submitScoreBtn.disabled = true;
                submitScoreBtn.textContent = 'Mengirim...';

                try {
                    const response = await fetch('{{ route('game.submit') }}', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify({
                            score: gameScore,
                            time_taken: totalTime
                        })
                    });

                    const result = await response.json();
                    if (response.ok) {
                        alert(result.message || 'Skor berhasil disimpan! Kamu hebat! 🎊');
                        submitScoreBtn.classList.add('hidden');
                        loadLeaderboard();
                    } else {
                        alert('Gagal menyimpan skor: ' + (result.message || 'Terjadi kesalahan pada server'));
                        submitScoreBtn.disabled = false;
                        submitScoreBtn.textContent = 'Klaim Juara!';
                    }
                } catch (error) {
                    console.error('Error submitting score:', error);
                    alert('Gagal menyimpan skor.');
                    submitScoreBtn.disabled = false;
                    submitScoreBtn.textContent = 'Simpan Skor';
                }
            }
        </script>
    @endpush

    @push('styles')
        <style>
            #logo-clue-img {
                image-rendering: auto;
            }

            #logo-clue-container {
                display: flex;
                align-items: center;
                justify-content: center;
                width: 100%;
                height: 100%;
            }
        </style>
    @endpush
</x-layout.app>