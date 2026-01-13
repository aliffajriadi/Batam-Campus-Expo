<x-layout.app :title="'Batam Campus Expo'">

    <div class="absolute inset-0 -z-10">
        <div class="absolute inset-0 bg-[#87CEEB]"></div>
        <div class="absolute inset-0 bg-cover bg-center bg-[length:100%_100%]"
            style="background-image: url('{{ asset('images/MainBG.svg') }}')"></div>
    </div>


    <section class="min-h-screen relative z-10">
        <!-- KONTEN UTAMA -->
        <div class="relative z-10 w-full h-full flex items-center">
            <div class="container mx-auto px-4 sm:px-6 lg:px-8 text-center">
                <!-- HEADLINE -->
                <div class="mb-8 sm:mb-10 lg:mb-12 pt-4 lg:pt-4 headline-animate opacity-0">
                    <h1
                        class="font-sancreek uppercase text-[#D32F2F] leading-[0.85] text-5xl sm:text-6xl md:text-7xl lg:text-8xl xl:text-9xl mb-3 lg:mb-4 [text-shadow:_1px_1px_0_rgba(255,99,132,0.4),_0_0_14px_rgba(255,182,193,0.5)] headline-main">
                        BATAM</h1>
                    <h2
                        class="font-sancreek uppercase text-[#D32F2F] leading-[0.85] text-4xl sm:text-5xl md:text-6xl lg:text-7xl xl:text-8xl [text-shadow:_1px_1px_0_rgba(255,99,132,0.4),_0_0_14px_rgba(255,182,193,0.5)] headline-main">
                        CAMPUS EXPO</h2>

                    <!-- LOCATION -->
                    <div class="mt-6 sm:mt-8 lg:mt-10 mb-8 sm:mb-10 lg:mb-12">
                        <a href="https://www.google.com/maps/search/?api=1&query=Pollux+Mall+Batam+Centre"
                            target="_blank"
                            class="inline-flex items-center bg-gradient-to-br from-[#fbbf24] to-[#f59e0b] text-white font-bold py-3 px-6 sm:py-3 sm:px-7 lg:py-4 lg:px-8 rounded-full transition-all duration-300 shadow-[0_4px_12px_rgba(245,158,11,0.3)] hover:-translate-y-[2px] hover:shadow-[0_6px_16px_rgba(245,158,11,0.4)] text-sm sm:text-base lg:text-lg">
                            <svg class="w-4 h-4 sm:w-5 sm:h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9z" />
                            </svg>
                            {{ $lokasi }}
                        </a>
                    </div>
                </div>

                <!-- COUNTDOWN -->
                <div
                    class="relative w-full flex justify-center items-center my-8 sm:my-10 lg:my-12 timer-animate opacity-0">
                    <div
                        class="absolute w-full max-w-[400px] sm:max-w-[480px] lg:max-w-[520px] h-auto z-[1] pointer-events-none top-1/2 -translate-y-1/2">
                        <img src="{{ asset('images/Countdown.svg') }}" class="w-full" alt="">
                    </div>
                    <div class="relative z-[2] p-4 sm:p-6 lg:p-8 w-full">
                        <div class="flex justify-center items-center mb-3 sm:mb-4">
                            <div class="font-sancreek text-[#A61E22] drop-shadow-[0_0_10px_rgba(166,30,34,0.5)] text-2xl sm:text-3xl md:text-4xl lg:text-5xl xl:text-6xl mx-1 sm:mx-2"
                                id="days">0</div>
                            <div
                                class="font-sancreek text-[#A61E22] drop-shadow-[0_0_10px_rgba(166,30,34,0.5)] text-2xl sm:text-3xl md:text-4xl lg:text-5xl xl:text-6xl">
                                :</div>
                            <div class="font-sancreek text-[#A61E22] drop-shadow-[0_0_10px_rgba(166,30,34,0.5)] text-2xl sm:text-3xl md:text-4xl lg:text-5xl xl:text-6xl mx-1 sm:mx-2"
                                id="hours">00</div>
                            <div
                                class="font-sancreek text-[#A61E22] drop-shadow-[0_0_10px_rgba(166,30,34,0.5)] text-2xl sm:text-3xl md:text-4xl lg:text-5xl xl:text-6xl">
                                :</div>
                            <div class="font-sancreek text-[#A61E22] drop-shadow-[0_0_10px_rgba(166,30,34,0.5)] text-2xl sm:text-3xl md:text-4xl lg:text-5xl xl:text-6xl mx-1 sm:mx-2"
                                id="minutes">00</div>
                            <div
                                class="font-sancreek text-[#A61E22] drop-shadow-[0_0_10px_rgba(166,30,34,0.5)] text-2xl sm:text-3xl md:text-4xl lg:text-5xl xl:text-6xl">
                                :</div>
                            <div class="font-sancreek text-[#A61E22] drop-shadow-[0_0_10px_rgba(166,30,34,0.5)] text-2xl sm:text-3xl md:text-4xl lg:text-5xl xl:text-6xl mx-1 sm:mx-2"
                                id="seconds">00</div>
                        </div>
                        <div
                            class="flex justify-center gap-3 sm:gap-4 lg:gap-6 text-xs sm:text-sm md:text-base font-sancreek text-[#A61E22] drop-shadow-[0_0_10px_rgba(166,30,34,0.5)]">
                            <span>Hari</span>
                            <span>Jam</span>
                            <span>Menit</span>
                            <span>Detik</span>
                        </div>
                    </div>
                </div>

                <!-- CTA BUTTON -->
                <div class="text-center mt-6 sm:mt-12 lg:mt-16 button-animate opacity-0">
                    @if ($ticket_status == 'open')
                        @auth
                            <a href="{{ route('ticket-user') }}" class="ticket-button">
                                Dapatkan Tiket !
                            </a>
                        @endauth
                        @guest
                            <button id="ticket-button" class="ticket-button">
                                Login dan dapatkan Tiket !
                            </button>
                        @endguest
                    @else
                        <button disabled class="ticket-button opacity-70 cursor-not-allowed">
                            Ticket Not Available
                        </button>
                    @endif
                </div>
            </div>
        </div>
    </section>

    <!-- FUN SEPARATOR -->
    <!-- FUN SEPARATOR -->
    <div class="relative w-full h-[90px] overflow-visible z-30 -mb-[45px]">
        <img src="{{ asset('images/funShape.svg') }}"
            class="absolute inset-x-0 top-0 h-full w-full object-cover separator-float" alt="transition separator">

        <!-- Shimmer effect overlay -->
        <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/40 to-transparent animate-pulse"></div>
    </div>


    <!-- SECTION INFO -->
    <section class="relative w-full pb-16 sm:pb-20 lg:pb-24 z-20 overflow-hidden">

        <!-- BACKGROUND GRADIENT -->
        <div class="absolute inset-0 bg-gradient-to-b from-[#EFE4B7] via-[#FBE99C] to-[#FDDC57] z-0">
        </div>

        <!-- Playing Cards Pattern Background for Carnival/Night Market Feel -->
        <div class="absolute inset-0 opacity-15 z-[1] pointer-events-none">
            <svg width="100%" height="100%" xmlns="http://www.w3.org/2000/svg">
                <defs>
                    <!-- Playing Cards Pattern -->
                    <pattern id="carnivalCards" x="0" y="0" width="150" height="200" patternUnits="userSpaceOnUse">
                        <!-- Spade Card (Red) -->
                        <g transform="translate(15, 20) rotate(15)">
                            <rect width="35" height="50" rx="4" fill="#D32F2F" stroke="#B71C1C"
                                stroke-width="1" />
                            <path d="M17.5 12 L12 20 L23 20 Z M17.5 20 L15.5 25 L19.5 25 Z" fill="white" />
                            <text x="3" y="10" font-size="6" fill="white" font-weight="bold">A</text>
                            <text x="28" y="45" font-size="6" fill="white" font-weight="bold"
                                transform="rotate(180 28 45)">A</text>
                        </g>

                        <!-- Heart Card (White with Red Hearts) -->
                        <g transform="translate(80, 10) rotate(-10)">
                            <rect width="35" height="50" rx="4" fill="white" stroke="#D32F2F"
                                stroke-width="2" />
                            <path
                                d="M17.5 15 C14 12, 8 12, 11 20 C8 12, 2 12, 5 20 L17.5 28 L30 20 C27 12, 21 12, 24 20 C21 12, 15 12, 17.5 15 Z"
                                fill="#D32F2F" />
                            <text x="3" y="10" font-size="6" fill="#D32F2F" font-weight="bold">K</text>
                            <text x="28" y="45" font-size="6" fill="#D32F2F" font-weight="bold"
                                transform="rotate(180 28 45)">K</text>
                        </g>

                        <!-- Diamond Card (Golden) -->
                        <g transform="translate(40, 80) rotate(25)">
                            <rect width="35" height="50" rx="4" fill="#fbbf24" stroke="#f59e0b"
                                stroke-width="2" />
                            <path d="M17.5 12 L25 20 L17.5 28 L10 20 Z" fill="white" />
                            <text x="3" y="10" font-size="6" fill="white" font-weight="bold">Q</text>
                            <text x="28" y="45" font-size="6" fill="white" font-weight="bold"
                                transform="rotate(180 28 45)">Q</text>
                        </g>

                        <!-- Club Card (White with Black Clubs) -->
                        <g transform="translate(100, 120) rotate(-20)">
                            <rect width="35" height="50" rx="4" fill="white" stroke="#333"
                                stroke-width="2" />
                            <circle cx="13" cy="20" r="3" fill="#333" />
                            <circle cx="22" cy="20" r="3" fill="#333" />
                            <circle cx="17.5" cy="15" r="3" fill="#333" />
                            <rect x="16" y="22" width="3" height="6" fill="#333" />
                            <text x="3" y="10" font-size="6" fill="#333" font-weight="bold">J</text>
                            <text x="28" y="45" font-size="6" fill="#333" font-weight="bold"
                                transform="rotate(180 28 45)">J</text>
                        </g>

                        <!-- Joker Card (Purple) -->
                        <g transform="translate(10, 140) rotate(8)">
                            <rect width="35" height="50" rx="4" fill="#8B5CF6" stroke="#7C3AED"
                                stroke-width="2" />
                            <circle cx="17.5" cy="25" r="8" fill="white" />
                            <circle cx="15" cy="22" r="1.5" fill="#333" />
                            <circle cx="20" cy="22" r="1.5" fill="#333" />
                            <path d="M13 28 Q17.5 32 22 28" stroke="#D32F2F" stroke-width="1.5" fill="none" />
                            <text x="8" y="42" font-size="4" fill="white" font-weight="bold">JOKER</text>
                        </g>

                        <!-- Small scattered number cards -->
                        <g transform="translate(120, 30) rotate(35)">
                            <rect width="12" height="18" rx="2" fill="#D32F2F" opacity="0.8" />
                            <text x="2" y="7" font-size="3" fill="white">10</text>
                        </g>

                        <g transform="translate(5, 100) rotate(-30)">
                            <rect width="12" height="18" rx="2" fill="white" stroke="#D32F2F"
                                opacity="0.9" />
                            <text x="4" y="7" font-size="3" fill="#D32F2F">9</text>
                        </g>

                        <g transform="translate(70, 160) rotate(45)">
                            <rect width="12" height="18" rx="2" fill="#fbbf24" opacity="0.7" />
                            <text x="4" y="7" font-size="3" fill="white">8</text>
                        </g>

                        <g transform="translate(130, 80) rotate(-15)">
                            <rect width="12" height="18" rx="2" fill="#4CAF50" opacity="0.6" />
                            <text x="4" y="7" font-size="3" fill="white">7</text>
                        </g>
                    </pattern>

                    <!-- Carnival Lights for Night Market Feel -->
                    <pattern id="carnivalLights" x="0" y="0" width="80" height="80"
                        patternUnits="userSpaceOnUse">
                        <circle cx="15" cy="15" r="2" fill="#fbbf24" opacity="0.6">
                            <animate attributeName="opacity" values="0.3;1;0.3" dur="2s"
                                repeatCount="indefinite" />
                        </circle>
                        <circle cx="40" cy="40" r="2" fill="#D32F2F" opacity="0.6">
                            <animate attributeName="opacity" values="1;0.3;1" dur="2.5s"
                                repeatCount="indefinite" />
                        </circle>
                        <circle cx="65" cy="20" r="2" fill="#4CAF50" opacity="0.6">
                            <animate attributeName="opacity" values="0.3;1;0.3" dur="1.8s"
                                repeatCount="indefinite" />
                        </circle>
                        <circle cx="20" cy="60" r="2" fill="#2196F3" opacity="0.6">
                            <animate attributeName="opacity" values="1;0.3;1" dur="2.2s"
                                repeatCount="indefinite" />
                        </circle>
                        <circle cx="55" cy="65" r="2" fill="#FF5722" opacity="0.6">
                            <animate attributeName="opacity" values="0.3;1;0.3" dur="1.5s"
                                repeatCount="indefinite" />
                        </circle>
                    </pattern>
                </defs>

                <!-- Apply the patterns -->
                <rect width="100%" height="100%" fill="url(#carnivalCards)" />
                <rect width="100%" height="100%" fill="url(#carnivalLights)" opacity="0.4" />
            </svg>
        </div>

        <!-- Floating Card Elements for Extra Carnival Feel -->
        <div
            class="absolute top-16 left-8 w-10 h-14 bg-white rounded-md shadow-lg transform rotate-12 opacity-30 z-5 animate-pulse">
            <div class="p-1 text-center">
                <div class="text-xs text-red-600 font-bold">A♠</div>
            </div>
        </div>
        <div class="absolute top-40 right-16 w-10 h-14 bg-red-600 rounded-md shadow-lg transform -rotate-6 opacity-35 z-5"
            style="animation: float 4s ease-in-out infinite;">
            <div class="p-1 text-center">
                <div class="text-xs text-white font-bold">K♥</div>
            </div>
        </div>
        <div class="absolute bottom-32 left-1/4 w-10 h-14 bg-yellow-400 rounded-md shadow-lg transform rotate-45 opacity-25 z-5"
            style="animation: float 5s ease-in-out infinite; animation-delay: 1s;">
            <div class="p-1 text-center">
                <div class="text-xs text-white font-bold">Q♦</div>
            </div>
        </div>
        <div class="absolute top-1/2 right-12 w-10 h-14 bg-white rounded-md shadow-lg transform -rotate-12 opacity-40 z-5"
            style="animation: float 3.5s ease-in-out infinite; animation-delay: 2s;">
            <div class="p-1 text-center">
                <div class="text-xs text-black font-bold">J♣</div>
            </div>
        </div>
        <div class="absolute bottom-16 right-1/3 w-10 h-14 bg-purple-600 rounded-md shadow-lg transform rotate-20 opacity-30 z-5 animate-bounce"
            style="animation-delay: 0.5s;">
            <div class="p-1 text-center">
                <div class="text-xs text-white font-bold text-[8px]">JKR</div>
            </div>
        </div>

        <!-- Additional Small Carnival Cards -->
        <div class="absolute top-24 left-1/3 w-8 h-12 bg-green-500 rounded-md shadow-md transform -rotate-25 opacity-25 z-5"
            style="animation: float 6s ease-in-out infinite; animation-delay: 3s;">
            <div class="p-0.5 text-center">
                <div class="text-[8px] text-white font-bold">10♠</div>
            </div>
        </div>
        <div class="absolute bottom-40 left-16 w-8 h-12 bg-blue-500 rounded-md shadow-md transform rotate-35 opacity-20 z-5"
            style="animation: float 4.5s ease-in-out infinite; animation-delay: 1.5s;">
            <div class="p-0.5 text-center">
                <div class="text-[8px] text-white font-bold">9♦</div>
            </div>
        </div>
        <div class="absolute top-32 right-1/4 w-8 h-12 bg-orange-500 rounded-md shadow-md transform -rotate-15 opacity-35 z-5"
            style="animation: float 5.5s ease-in-out infinite; animation-delay: 2.5s;">
            <div class="p-0.5 text-center">
                <div class="text-[8px] text-white font-bold">8♣</div>
            </div>
        </div>

        <!-- Carnival Light Bulbs for Night Market Atmosphere -->
        <div class="absolute top-12 left-20 w-3 h-3 bg-yellow-400 rounded-full shadow-lg opacity-60 z-5"
            style="animation: pulse 2s infinite; animation-delay: 0s;"></div>
        <div class="absolute top-20 right-24 w-3 h-3 bg-red-500 rounded-full shadow-lg opacity-70 z-5"
            style="animation: pulse 2.5s infinite; animation-delay: 0.5s;"></div>
        <div class="absolute bottom-24 left-32 w-3 h-3 bg-blue-400 rounded-full shadow-lg opacity-65 z-5"
            style="animation: pulse 1.8s infinite; animation-delay: 1s;"></div>
        <div class="absolute bottom-12 right-40 w-3 h-3 bg-green-400 rounded-full shadow-lg opacity-55 z-5"
            style="animation: pulse 2.2s infinite; animation-delay: 1.5s;"></div>
        <div class="absolute top-1/2 left-12 w-3 h-3 bg-purple-400 rounded-full shadow-lg opacity-60 z-5"
            style="animation: pulse 1.5s infinite; animation-delay: 2s;"></div>
        <div class="absolute top-1/3 right-12 w-3 h-3 bg-orange-400 rounded-full shadow-lg opacity-75 z-5"
            style="animation: pulse 2.8s infinite; animation-delay: 0.8s;"></div>

        <!-- Background Elements (existing) -->
        <img src="{{ asset('images/balloon.svg') }}"
            class="absolute left-6 sm:left-8 lg:left-12 top-16 sm:top-20 lg:top-24 w-12 sm:w-14 lg:w-16 md:w-20 opacity-90 z-5"
            alt="balloon">
        <img src="{{ asset('images/balloon.svg') }}"
            class="absolute right-8 sm:right-10 lg:right-16 top-24 sm:top-32 lg:top-40 w-10 sm:w-12 lg:w-14 md:w-16 opacity-80 z-5"
            alt="balloon">
        <img src="{{ asset('images/GajahKiri.svg') }}"
            class="absolute left-0 bottom-0 w-16 sm:w-20 lg:w-24 md:w-36 z-5" alt="elephant left">
        <img src="{{ asset('images/GajahKanan.svg') }}"
            class="absolute right-0 bottom-0 w-16 sm:w-20 lg:w-24 md:w-40 z-5" alt="elephant right">

        <div class="relative container mx-auto px-4 sm:px-6 lg:px-8 pt-16 sm:pt-20 lg:pt-24 z-10 pt-[45px] ">
            <!-- GRID UTAMA -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 sm:gap-16 lg:gap-20 items-start">
                <!-- KIRI : JUDUL -->
                <div>
                    <h2
                        class="font-sancreek uppercase text-[#D32F2F] leading-[0.85] text-4xl sm:text-5xl md:text-6xl lg:text-7xl [text-shadow:_1px_1px_0_rgba(255,99,132,0.4),_0_0_14px_rgba(255,182,193,0.5)]">
                        BATAM<br>CAMPUS EXPO
                    </h2>
                </div>

                <!-- KANAN : DESKRIPSI -->
                <div class="relative max-w-lg lg:max-w-xl">
                    <img src="{{ asset('images/ShapeDesc.svg') }}" class="w-full" alt="desc bg">
                    <div class="absolute inset-0 flex items-center px-6 sm:px-8 lg:px-12">
                        <p class="text-white text-sm sm:text-base leading-relaxed">
                            {{ $desc_event }}
                        </p>
                    </div>
                </div>
            </div>

            <!-- LEADERBOARD -->
            <div class="mt-16 sm:mt-20 lg:mt-24 text-center">
                <h3
                    class="font-sancreek uppercase text-[#D32F2F] text-3xl sm:text-4xl md:text-5xl mb-8 sm:mb-10 lg:mb-12 [text-shadow:_1px_1px_0_rgba(255,99,132,0.4),_0_0_14px_rgba(255,182,193,0.5)]">
                    Top leaderboard from voting
                </h3>

                <div class="flex flex-col gap-4 sm:gap-6 items-center">
                    @foreach ($top_campuses as $campus)
                        <div class="relative w-full max-w-sm sm:max-w-md lg:max-w-xl">
                            <img src="{{ asset('images/PlaceHolderKampus.svg') }}" class="w-full" alt="label">
                            <div class="absolute inset-0 flex items-center justify-center">
                                <span class="text-white font-bold text-base sm:text-lg lg:text-xl">
                                    {{ $campus->name_campus }}
                                </span>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- CTA -->
            <div class="mt-12 sm:mt-16 lg:mt-20 text-center">
                <button class="ticket-button">
                    Voting Kampus
                </button>
            </div>
        </div>
    </section>



    <!-- SECTION FAQ - DESAIN BARU (SECTION 3) DENGAN BACKGROUND GAMBAR  ON CLICK -->
    <section class="relative w-full py-16 overflow-hidden z-10"
        style="background: url('{{ asset('images/FAQ_bg.svg') }}') center/cover no-repeat;">
        <div class="relative container mx-auto px-4 sm:px-6 lg:px-8 z-10">
            <!-- Judul Section -->
            <div class="text-center mb-8 sm:mb-10 lg:mb-12">
                <h2
                    class="font-sancreek uppercase text-white text-3xl sm:text-4xl md:text-5xl p-3 sm:p-4 bg-red-700 rounded-md inline-block shadow-lg tracking-wide">
                    Frequently Asked Question
                </h2>
            </div>

            <!-- Daftar FAQ -->
            <div class="max-w-4xl mx-auto space-y-4 sm:space-y-6">
                @php
                    $faqs = [
                        [
                            'question' => 'Apa itu Batam Campus Expo?',
                            'answer' =>
                                'Batam Campus Expo adalah pameran pendidikan terbesar di Kepulauan Riau yang menghadirkan berbagai universitas dan perguruan tinggi terbaik dari seluruh Indonesia. Acara ini bertujuan untuk membantu siswa SMA/SMK menemukan jurusan dan kampus yang tepat.',
                        ],
                        [
                            'question' => 'Kapan dan di mana Batam Campus Expo dilaksanakan?',
                            'answer' =>
                                'Batam Campus Expo 2026 akan dilaksanakan pada ' .
                                \Carbon\Carbon::parse($end_event)->format('d F Y') .
                                ' di ' .
                                e($lokasi) .
                                '. Acara berlangsung dari pukul 09:00 - 21:00 WIB.',
                        ],
                        [
                            'question' => 'Apakah kegiatan ini berbayar?',
                            'answer' =>
                                'Tidak, tiket masuk Batam Campus Expo sepenuhnya GRATIS! Namun, peserta wajib mendaftar terlebih dahulu secara online untuk mendapatkan tiket elektronik yang akan dipindai saat masuk.',
                        ],
                        [
                            'question' => 'Apa saja yang bisa didapatkan di expo?',
                            'answer' =>
                                'Pengunjung dapat: konsultasi langsung dengan perwakilan kampus, informasi program studi dan beasiswa, seminar pendidikan, workshop karir, doorprize menarik, serta kesempatan mendaftar langsung dengan potongan biaya masuk.',
                        ],
                    ];
                @endphp

                @foreach ($faqs as $index => $faq)
                    <div class="relative cursor-pointer" onclick="toggleFAQ({{ $index }})">
                        <!-- Kotak Pertanyaan Bergaya Panah Kanan -->
                        <div
                            class="flex items-center justify-between bg-[#c0992f] border-4 border-yellow-400 rounded-r-full px-4 sm:px-6 py-3 sm:py-4 shadow-lg transition-colors duration-300">
                            <span
                                class="font-bold text-[#1A2950] text-base sm:text-lg md:text-xl flex-grow pr-2 sm:pr-4">{{ $faq['question'] }}</span>
                            <svg id="arrow-{{ $index }}"
                                class="w-4 h-4 sm:w-5 sm:h-5 text-gray-800 flex-shrink-0 transition-transform duration-300"
                                fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>

                        <!-- Jawaban (Default hidden) -->
                        <div id="answer-{{ $index }}"
                            class="mt-2 bg-[#F0ECE1] border-l-4 border-yellow-400 rounded-b-lg shadow-md overflow-hidden transition-all duration-300"
                            style="max-height: 0; opacity: 0; padding: 0;">
                            <div class="p-3 sm:p-4">
                                <p class="text-gray-700 leading-relaxed text-sm sm:text-base">{{ $faq['answer'] }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach

                <!-- Tombol "More Questions?" -->
                <div class="text-center mt-8 sm:mt-10">
                    <button id="show-more-faq"
                        class="bg-yellow-500 hover:bg-yellow-600 text-gray-800 font-bold py-3 px-6 sm:py-3 sm:px-8 rounded-full transition-all duration-300 shadow-lg">
                        More Questions?
                    </button>
                </div>
            </div>
        </div>
    </section>

    <!-- FUN SEPARATOR FAQ TO CONTACT -->
    <div class="relative w-full h-[100px] sm:h-[120px] lg:h-[140px] overflow-visible z-[200] -mt-1">
        <img src="{{ asset('images/tsi4.svg') }}"
            class="absolute inset-x-0 top-0 h-full w-full object-cover separator-float"
            alt="transition separator to contact">
        <!-- Shimmer effect for visual interest -->
        <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/50 to-transparent animate-pulse">
        </div>
    </div>

    <!-- SECTION KONTAK & LOKASI -->
    <section class="relative w-full overflow-hidden z-10"
        style="background-image: url('{{ asset('images/bgkontak.svg') }}'); background-size: cover; background-position: center; background-repeat: no-repeat;">
        <!-- Decorative Elements -->
        <img src="{{ asset('images/balloon.svg') }}"
            class="absolute left-6 sm:left-8 lg:left-10 top-8 sm:top-10 lg:top-12 w-12 sm:w-14 lg:w-16 opacity-70"
            alt="balloon">
        <img src="{{ asset('images/balloon.svg') }}"
            class="absolute right-8 sm:right-10 lg:right-12 bottom-16 sm:bottom-20 lg:bottom-24 w-10 sm:w-12 lg:w-14 opacity-60"
            alt="balloon">

        <div class="relative container mx-auto px-4 sm:px-6 lg:px-8 py-8 sm:py-12 lg:py-16 z-10">
            <!-- Section Title -->
            <div class="text-center mb-12 sm:mb-16">
                <h2
                    class="font-sancreek uppercase text-[#D32F2F] text-4xl sm:text-5xl md:text-6xl mb-4 sm:mb-6 [text-shadow:_1px_1px_0_rgba(255,99,132,0.4),_0_0_14px_rgba(255,182,193,0.5)]">
                    Kontak & Lokasi
                </h2>
                <p class="text-gray-800 text-base sm:text-lg max-w-3xl mx-auto">
                    Hubungi kami atau kunjungi lokasi expo untuk informasi lebih lanjut
                </p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 sm:gap-12 max-w-6xl mx-auto">
                <!-- Left Column - Contact Info -->
                <div class="space-y-6 sm:space-y-8">
                    <!-- Contact Card -->
                    <div class="bg-white/90 backdrop-blur-sm rounded-2xl p-6 sm:p-8 shadow-xl">
                        <h3
                            class="text-xl sm:text-2xl font-bold text-[#D32F2F] mb-4 sm:mb-6 pb-3 sm:pb-4 border-b border-gray-200">
                            Informasi Kontak</h3>

                        <div class="space-y-4 sm:space-y-6">
                            <!-- Phone -->
                            <div class="flex items-center gap-3 sm:gap-4">
                                <div class="bg-[#D32F2F] text-white rounded-full p-2 sm:p-3">
                                    <svg class="w-5 h-5 sm:w-6 sm:h-6" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="font-bold text-gray-800 text-sm sm:text-base">Telepon</h4>
                                    <a href="tel:{{ preg_replace('/[^0-9]/', '', $nohp) }}"
                                        class="text-gray-600 hover:text-[#D32F2F] transition-colors text-sm sm:text-base">
                                        {{ $nohp }}
                                    </a>
                                </div>
                            </div>

                            <!-- Email -->
                            <div class="flex items-center gap-3 sm:gap-4">
                                <div class="bg-[#D32F2F] text-white rounded-full p-2 sm:p-3">
                                    <svg class="w-5 h-5 sm:w-6 sm:h-6" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="font-bold text-gray-800 text-sm sm:text-base">Email</h4>
                                    <a href="mailto:info@batamcampuseexpo.com"
                                        class="text-gray-600 hover:text-[#D32F2F] transition-colors text-sm sm:text-base">
                                        batamcampusexpo@gmail.com
                                    </a>
                                </div>
                            </div>

                            <!-- Instagram -->
                            <div class="flex items-center gap-3 sm:gap-4">
                                <div class="bg-[#D32F2F] text-white rounded-full p-2 sm:p-3">
                                    <svg class="w-5 h-5 sm:w-6 sm:h-6" fill="currentColor" viewBox="0 0 24 24">
                                        <path
                                            d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z" />
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="font-bold text-gray-800 text-sm sm:text-base">Instagram</h4>
                                    <a href="https://instagram.com/batamcampuseexpo" target="_blank"
                                        class="text-gray-600 hover:text-[#D32F2F] transition-colors text-sm sm:text-base">
                                        @batamcampuseexpo
                                    </a>
                                </div>
                            </div>

                            <!-- Working Hours -->
                            <div class="flex items-center gap-3 sm:gap-4">
                                <div class="bg-[#D32F2F] text-white rounded-full p-2 sm:p-3">
                                    <svg class="w-5 h-5 sm:w-6 sm:h-6" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="font-bold text-gray-800 text-sm sm:text-base">Jam Operasional</h4>
                                    <p class="text-gray-600 text-sm sm:text-base">Senin - Jumat: 09:00 - 17:00 WIB</p>
                                    <p class="text-gray-600 text-sm sm:text-base">Sabtu: 09:00 - 15:00 WIB</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Send Message Form -->
                    <div class="bg-white/90 backdrop-blur-sm rounded-2xl p-6 sm:p-8 shadow-xl">
                        <h3
                            class="text-xl sm:text-2xl font-bold text-[#D32F2F] mb-4 sm:mb-6 pb-3 sm:pb-4 border-b border-gray-200">
                            Kirim Pesan</h3>

                        <form id="contact-form" class="space-y-3 sm:space-y-4">
                            @csrf
                            <div>
                                <label class="block text-gray-700 mb-2 text-sm sm:text-base">Nama Lengkap</label>
                                <input type="text" name="name" required
                                    class="w-full px-3 sm:px-4 py-2 sm:py-3 rounded-lg border border-gray-300 focus:border-[#D32F2F] focus:ring-2 focus:ring-[#D32F2F]/20 outline-none transition-all text-sm sm:text-base">
                            </div>

                            <div>
                                <label class="block text-gray-700 mb-2 text-sm sm:text-base">Email</label>
                                <input type="email" name="email" required
                                    class="w-full px-3 sm:px-4 py-2 sm:py-3 rounded-lg border border-gray-300 focus:border-[#D32F2F] focus:ring-2 focus:ring-[#D32F2F]/20 outline-none transition-all text-sm sm:text-base">
                            </div>

                            <div>
                                <label class="block text-gray-700 mb-2 text-sm sm:text-base">Pesan</label>
                                <textarea name="message" rows="4" required
                                    class="w-full px-3 sm:px-4 py-2 sm:py-3 rounded-lg border border-gray-300 focus:border-[#D32F2F] focus:ring-2 focus:ring-[#D32F2F]/20 outline-none transition-all text-sm sm:text-base"></textarea>
                            </div>

                            <button type="submit"
                                class="w-full bg-gradient-to-br from-[#D32F2F] to-[#B71C1C] text-white font-bold py-2 sm:py-3 px-4 sm:px-6 rounded-lg transition-all duration-300 hover:-translate-y-1 hover:shadow-lg text-sm sm:text-base">
                                Kirim Pesan
                            </button>
                        </form>
                    </div>
                </div>

                <!-- Right Column - Map & Location -->
                <div class="space-y-6 sm:space-y-8">
                    <!-- Location Card -->
                    <div class="bg-white/90 backdrop-blur-sm rounded-2xl p-6 sm:p-8 shadow-xl">
                        <h3
                            class="text-xl sm:text-2xl font-bold text-[#D32F2F] mb-4 sm:mb-6 pb-3 sm:pb-4 border-b border-gray-200">
                            Lokasi Event</h3>

                        <div class="space-y-4 sm:space-y-6">
                            <!-- Address -->
                            <div class="flex items-start gap-3 sm:gap-4">
                                <div class="bg-[#D32F2F] text-white rounded-full p-2 sm:p-3 flex-shrink-0 mt-1">
                                    <svg class="w-5 h-5 sm:w-6 sm:h-6" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="font-bold text-gray-800 mb-2 text-sm sm:text-base">Alamat</h4>
                                    <p class="text-gray-600 leading-relaxed text-sm sm:text-base">
                                        {{ $lokasi }}<br>
                                        Batam Center, Kota Batam<br>
                                        Kepulauan Riau 29432
                                    </p>
                                </div>
                            </div>

                            <!-- Map Container -->
                            <div class="rounded-xl overflow-hidden shadow-lg h-56 sm:h-64 md:h-80">
                                <!-- Google Maps Embed -->
                                {!! $google_maps !!}
                            </div>

                            <!-- Directions Button -->
                            <div class="text-center">
                                <a href="https://www.google.com/maps/dir//{{ urlencode($lokasi) }}" target="_blank"
                                    class="inline-flex items-center bg-gradient-to-br from-[#4CAF50] to-[#388E3C] text-white font-bold py-2 sm:py-3 px-6 sm:px-8 rounded-full transition-all duration-300 hover:-translate-y-1 hover:shadow-lg text-sm sm:text-base">
                                    <svg class="w-4 h-4 sm:w-5 sm:h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    Dapatkan Petunjuk Arah
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @push('scripts')
        <script>
            function toggleFAQ(index) {
                const answer = document.getElementById(`answer-${index}`);
                const arrow = document.getElementById(`arrow-${index}`);

                // Tutup semua lainnya
                for (let i = 0; i < {{ count($faqs) }}; i++) {
                    if (i !== index) {
                        const otherAnswer = document.getElementById(`answer-${i}`);
                        otherAnswer.style.maxHeight = '0';
                        otherAnswer.style.opacity = '0';
                        otherAnswer.style.padding = '0';
                        document.getElementById(`arrow-${i}`).style.transform = 'rotate(0deg)';
                    }
                }

                // Toggle current
                if (answer.style.maxHeight === '0px' || answer.style.maxHeight === '') {
                    // Ambil tinggi konten sebenarnya
                    const contentHeight = answer.querySelector('div').scrollHeight;
                    answer.style.maxHeight = contentHeight + 'px';
                    answer.style.opacity = '1';
                    answer.style.padding = '0.5rem 0';
                    arrow.style.transform = 'rotate(180deg)';
                } else {
                    answer.style.maxHeight = '0';
                    answer.style.opacity = '0';
                    answer.style.padding = '0';
                    arrow.style.transform = 'rotate(0deg)';
                }
            }

            // Contact Form Submission
            document.getElementById('contact-form').addEventListener('submit', function(e) {
                e.preventDefault();

                // Simple form validation
                const formData = new FormData(this);
                let isValid = true;

                formData.forEach((value, key) => {
                    if (!value.trim()) {
                        isValid = false;
                    }
                });

                if (isValid) {
                    // Simulate form submission
                    const button = this.querySelector('button[type="submit"]');
                    const originalText = button.textContent;

                    button.textContent = 'Mengirim...';
                    button.disabled = true;

                    setTimeout(() => {
                        alert('Pesan berhasil dikirim! Kami akan membalas dalam 1x24 jam.');
                        this.reset();
                        button.textContent = originalText;
                        button.disabled = false;
                    }, 1500);
                } else {
                    alert('Harap isi semua field yang diperlukan.');
                }
            });

            // Smooth scroll for navigation
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function(e) {
                    e.preventDefault();
                    const targetId = this.getAttribute('href');
                    if (targetId === '#') return;

                    const targetElement = document.querySelector(targetId);
                    if (targetElement) {
                        window.scrollTo({
                            top: targetElement.offsetTop - 80,
                            behavior: 'smooth'
                        });
                    }
                });
            });

            // Countdown Timer
            const countdownTarget = new Date("{{ $end_event }}").getTime();

            const countdownInterval = setInterval(function() {
                const now = new Date().getTime();
                const distance = countdownTarget - now;

                const d = Math.floor(distance / (1000 * 60 * 60 * 24));
                const h = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                const m = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                const s = Math.floor((distance % (1000 * 60)) / 1000);

                document.getElementById("days").innerHTML = d;
                document.getElementById("hours").innerHTML = h < 10 ? "0" + h : h;
                document.getElementById("minutes").innerHTML = m < 10 ? "0" + m : m;
                document.getElementById("seconds").innerHTML = s < 10 ? "0" + s : s;

                if (distance < 0) {
                    clearInterval(countdownInterval);
                    document.getElementById("days").innerHTML = "0";
                    document.getElementById("hours").innerHTML = "00";
                    document.getElementById("minutes").innerHTML = "00";
                    document.getElementById("seconds").innerHTML = "00";
                }
            }, 1000);
        </script>
    @endpush

    @push('styles')
        <style>
            /* Animations */
            .animate__animated {
                animation-duration: 0.5s;
            }

            .animate__fadeInUp {
                animation-name: fadeInUp;
            }

            @keyframes fadeInUp {
                from {
                    opacity: 0;
                    transform: translateY(20px);
                }

                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }

            /* Hover Effects */
            .hover-lift {
                transition: transform 0.3s ease, box-shadow 0.3s ease;
            }

            .hover-lift:hover {
                transform: translateY(-5px);
                box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
            }

            /* Custom Scrollbar */
            ::-webkit-scrollbar {
                width: 8px;
            }

            ::-webkit-scrollbar-track {
                background: #f1f1f1;
            }

            ::-webkit-scrollbar-thumb {
                background: #D32F2F;
                border-radius: 4px;
            }

            ::-webkit-scrollbar-thumb:hover {
                background: #B71C1C;
            }

            /* Responsive fixes */
            @media (max-width: 640px) {
                .hero-section {
                    padding-top: 80px;
                }
            }

            /* Body reset - transparan background */
            html,
            body {
                margin: 0;
                padding: 0;
                background: transparent;
                /* Fully transparent */
            }

            /* Main container transparan */
            .main-app-container {
                background: transparent;
            }

            /* Hero section background fix - MainBG should be the hero */
            .hero-section {
                background: url('{{ asset('images/MainBG.svg') }}') center/cover no-repeat;
                min-height: 100vh;
                position: relative;
                display: flex;
                align-items: center;
                justify-content: center;
                overflow: hidden;
                margin: 0;
                padding: 0;
                z-index: 0;
            }

            /* Remove blue overlay */
            .hero-section>div:first-child {
                display: none;
                /* Hide the blue background div */
            }

            /* Make sure MainBG extends above navbar */
            .hero-section::before {
                content: '';
                position: absolute;
                top: -150px;
                /* Extend further above navbar */
                left: 0;
                right: 0;
                bottom: 0;
                background: inherit;
                z-index: -1;
            }

            /* Enhanced separator styles - hanya separator yang terlihat */
            .separator-float {
                animation: float 6s ease-in-out infinite;
            }

            .separator-pulse {
                animation: pulse 4s cubic-bezier(0.4, 0, 0.6, 1) infinite;
            }

            /* Floating animation for separators */
            @keyframes float {

                0%,
                100% {
                    transform: translateY(0px) scale(1);
                }

                50% {
                    transform: translateY(-15px) scale(1.02);
                }
            }

            /* Pulse animation for separator */
            @keyframes pulse {

                0%,
                100% {
                    opacity: 1;
                    transform: scale(1);
                }

                50% {
                    opacity: 0.85;
                    transform: scale(1.05);
                }
            }

            /* Shimmer effect */
            @keyframes shimmer {
                0% {
                    background-position: -200% 0;
                }

                100% {
                    background-position: 200% 0;
                }
            }

            .separator-shimmer::before {
                content: '';
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.6), transparent);
                background-size: 200% 100%;
                animation: shimmer 3s infinite;
            }

            /* Carnival Card Float Animation */
            @keyframes float {

                0%,
                100% {
                    transform: translateY(0px) rotate(var(--rotation, 0deg));
                }

                50% {
                    transform: translateY(-15px) rotate(var(--rotation, 0deg));
                }
            }

            /* Additional carnival animations */
            .carnival-card-float {
                animation: float 4s ease-in-out infinite;
            }

            .carnival-card-float:nth-child(2n) {
                animation-delay: 1s;
            }

            .carnival-card-float:nth-child(3n) {
                animation-delay: 2s;
            }
        </style>
    @endpush
</x-layout.app>
