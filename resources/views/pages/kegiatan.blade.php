<x-layout.app :title="'Kegiatan - Batam Campus Expo'" :nohp="$nohp ?? '+62 812-3456-7890'" :lokasi="$lokasi ?? 'Pollux Mall Batam Centre'">
        <div class="fixed inset-0 -z-10 overflow-hidden">
        <!-- Gradient -->
        <div class="absolute inset-0 bg-gradient-to-br from-[#D32F2F] via-[#B71C1C] to-[#8B0000]"></div>

        <!-- SVG Pattern -->
        <div class="absolute inset-0 opacity-20">
            <svg width="100%" height="100%" xmlns="http://www.w3.org/2000/svg">
                <defs>
                    <!-- Circus Pattern -->
                    <pattern id="circusPattern" x="0" y="0" width="200" height="250" patternUnits="userSpaceOnUse">
                        <!-- Big Top Tent -->
                        <g transform="translate(20, 30)">
                            <polygon points="40,0 80,60 0,60" fill="#fbbf24" stroke="#f59e0b" stroke-width="2"/>
                            <polygon points="40,0 60,60 20,60" fill="#ff6b6b" stroke="#ee5a24" stroke-width="1"/>
                            <rect x="35" y="60" width="10" height="20" fill="#8B4513"/>
                            <circle cx="40" cy="5" r="3" fill="#FFD700"/>
                        </g>
                        
                        <!-- Ferris Wheel -->
                        <g transform="translate(120, 40)">
                            <circle cx="30" cy="30" r="25" fill="none" stroke="#fbbf24" stroke-width="3"/>
                            <circle cx="30" cy="5" r="4" fill="#ff6b6b"/>
                            <circle cx="55" cy="30" r="4" fill="#4CAF50"/>
                            <circle cx="30" cy="55" r="4" fill="#2196F3"/>
                            <circle cx="5" cy="30" r="4" fill="#FF5722"/>
                            <circle cx="30" cy="30" r="3" fill="#FFD700"/>
                            <line x1="30" y1="30" x2="30" y2="5" stroke="#333" stroke-width="1"/>
                            <line x1="30" y1="30" x2="55" y2="30" stroke="#333" stroke-width="1"/>
                            <line x1="30" y1="30" x2="30" y2="55" stroke="#333" stroke-width="1"/>
                            <line x1="30" y1="30" x2="5" y2="30" stroke="#333" stroke-width="1"/>
                        </g>
                        
                        <!-- Playing Cards -->
                        <g transform="translate(10, 120) rotate(15)">
                            <rect width="25" height="35" rx="3" fill="white" stroke="#D32F2F" stroke-width="2"/>
                            <path d="M12.5 8 C10 6, 6 6, 8 12 C6 6, 2 6, 4 12 L12.5 18 L21 12 C19 6, 15 6, 17 12 C15 6, 11 6, 12.5 8 Z" fill="#D32F2F"/>
                            <text x="2" y="7" font-size="4" fill="#D32F2F" font-weight="bold">K</text>
                        </g>
                        
                        <!-- Joker Card -->
                        <g transform="translate(140, 140) rotate(-20)">
                            <rect width="25" height="35" rx="3" fill="#8B5CF6" stroke="#7C3AED" stroke-width="2"/>
                            <circle cx="12.5" cy="17.5" r="6" fill="white"/>
                            <circle cx="10.5" cy="15.5" r="1" fill="#333"/>
                            <circle cx="14.5" cy="15.5" r="1" fill="#333"/>
                            <path d="M9 20 Q12.5 23 16 20" stroke="#D32F2F" stroke-width="1" fill="none"/>
                            <text x="6" y="30" font-size="3" fill="white" font-weight="bold">JOKER</text>
                        </g>
                        
                        <!-- Dice -->
                        <g transform="translate(60, 180)">
                            <rect width="20" height="20" rx="2" fill="white" stroke="#333" stroke-width="2"/>
                            <circle cx="7" cy="7" r="1.5" fill="#333"/>
                            <circle cx="13" cy="7" r="1.5" fill="#333"/>
                            <circle cx="7" cy="13" r="1.5" fill="#333"/>
                            <circle cx="13" cy="13" r="1.5" fill="#333"/>
                            <circle cx="10" cy="10" r="1.5" fill="#333"/>
                        </g>
                        
                        <!-- Carnival Mask -->
                        <g transform="translate(160, 200)">
                            <ellipse cx="15" cy="12" rx="12" ry="8" fill="#FFD700" stroke="#f59e0b" stroke-width="2"/>
                            <circle cx="10" cy="10" r="2" fill="#333"/>
                            <circle cx="20" cy="10" r="2" fill="#333"/>
                            <path d="M10 16 Q15 20 20 16" stroke="#D32F2F" stroke-width="2" fill="none"/>
                            <path d="M5 8 Q0 5 -2 10" stroke="#8B5CF6" stroke-width="3" fill="none"/>
                            <path d="M25 8 Q30 5 32 10" stroke="#8B5CF6" stroke-width="3" fill="none"/>
                        </g>
                        
                        <!-- Magic Wand -->
                        <g transform="translate(80, 80) rotate(45)">
                            <rect x="0" y="8" width="30" height="2" fill="#8B4513"/>
                            <polygon points="30,5 35,10 30,15" fill="#FFD700"/>
                            <circle cx="32" cy="7" r="1" fill="#ff6b6b"/>
                            <circle cx="32" cy="13" r="1" fill="#4CAF50"/>
                        </g>
                        
                        <!-- Balloon Cluster -->
                        <g transform="translate(40, 200)">
                            <ellipse cx="5" cy="10" rx="4" ry="6" fill="#ff6b6b"/>
                            <ellipse cx="12" cy="8" rx="4" ry="6" fill="#4CAF50"/>
                            <ellipse cx="19" cy="12" rx="4" ry="6" fill="#2196F3"/>
                            <line x1="5" y1="16" x2="8" y2="25" stroke="#333" stroke-width="1"/>
                            <line x1="12" y1="14" x2="8" y2="25" stroke="#333" stroke-width="1"/>
                            <line x1="19" y1="18" x2="8" y2="25" stroke="#333" stroke-width="1"/>
                        </g>
                    </pattern>
                    
                    <!-- Floating Lights -->
                    <pattern id="floatingLights" x="0" y="0" width="100" height="100" patternUnits="userSpaceOnUse">
                        <circle cx="20" cy="20" r="2" fill="#fbbf24" opacity="0.8">
                            <animate attributeName="opacity" values="0.3;1;0.3" dur="2s" repeatCount="indefinite"/>
                        </circle>
                        <circle cx="60" cy="40" r="2" fill="#ff6b6b" opacity="0.8">
                            <animate attributeName="opacity" values="1;0.3;1" dur="2.5s" repeatCount="indefinite"/>
                        </circle>
                        <circle cx="80" cy="70" r="2" fill="#4CAF50" opacity="0.8">
                            <animate attributeName="opacity" values="0.3;1;0.3" dur="1.8s" repeatCount="indefinite"/>
                        </circle>
                        <circle cx="30" cy="80" r="2" fill="#2196F3" opacity="0.8">
                            <animate attributeName="opacity" values="1;0.3;1" dur="2.2s" repeatCount="indefinite"/>
                        </circle>
                    </pattern>
                </defs>
                
                <rect width="100%" height="100%" fill="url(#circusPattern)"/>
                <rect width="100%" height="100%" fill="url(#floatingLights)" opacity="0.6"/>
            </svg>
            </div>
        </div>
    <!-- HERO SECTION -->
    <section class="relative min-h pt-5 flex items-center z-10 bg-gradient-to-br">
        <!-- Circus SVG Background Pattern -->
      
        <!-- Floating 3D Elements -->
        <div class="absolute top-16 left-8 w-16 h-20 bg-white rounded-lg shadow-2xl transform rotate-12 opacity-40 z-5" style="animation: float 6s ease-in-out infinite;">
            <div class="p-2 text-center">
                <div class="text-sm text-red-600 font-bold">A♠</div>
                <div class="text-xs text-gray-600 mt-1">♠</div>
            </div>
        </div>
        
        <div class="absolute top-32 right-16 w-16 h-20 bg-purple-600 rounded-lg shadow-2xl transform -rotate-6 opacity-50 z-5" style="animation: float 4s ease-in-out infinite; animation-delay: 1s;">
            <div class="p-2 text-center">
                <div class="text-sm text-white font-bold">JKR</div>
                <div class="text-xs text-yellow-300 mt-1">😄</div>
            </div>
        </div>
        
        <div class="absolute bottom-32 left-1/4 w-12 h-12 bg-yellow-400 rounded-full shadow-2xl opacity-60 z-5 flex items-center justify-center" style="animation: bounce 3s ease-in-out infinite; animation-delay: 0.5s;">
            <div class="text-white font-bold text-lg">🎪</div>
        </div>
        
        <div class="absolute top-1/2 right-12 w-14 h-14 bg-gradient-to-br from-red-500 to-pink-500 rounded-full shadow-2xl opacity-70 z-5 flex items-center justify-center" style="animation: float 5s ease-in-out infinite; animation-delay: 2s;">
            <div class="text-white font-bold">🎭</div>
        </div>
        
        <!-- KONTEN UTAMA -->
        <div class="relative z-10 w-full h-full flex items-center">
            <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-16 text-center">
                <!-- HEADLINE -->
                <div class="mb-8">
                    <h1 class="font-sancreek uppercase text-white leading-[0.85] text-5xl sm:text-6xl md:text-7xl lg:text-8xl mb-4 [text-shadow:_4px_4px_0_rgba(0,0,0,0.3),_8px_8px_0_rgba(0,0,0,0.2)]">
                        JADWAL
                    </h1>
                    <h2 class="font-sancreek uppercase text-[#fbbf24] leading-[0.85] text-3xl sm:text-4xl md:text-5xl lg:text-6xl [text-shadow:_2px_2px_0_rgba(0,0,0,0.8)]">
                        KEGIATAN
                    </h2>
                    <p class="text-white/90 text-lg sm:text-xl mt-6 max-w-3xl mx-auto">
                        Jangan lewatkan setiap momen seru di Batam Campus Expo 2026
                    </p>
                </div>
                
                <!-- Event Date -->
                <div class="bg-white/20 backdrop-blur-sm rounded-2xl p-6 max-w-md mx-auto mb-8">
                    <div class="text-[#fbbf24] font-bold text-2xl mb-2">25 Januari 2026</div>
                    <div class="text-white text-lg">📍 Pollux Mall Batam Centre</div>
                </div>
            </div>
        </div>
    </section>

    <!-- SEPARATOR -->
    <!-- <div class="relative w-full h-[60px] overflow-visible z-30 -mt-1">
        <div class="absolute inset-0 bg-gradient-to-b from-[#8B0000] to-[#f5f5f5] opacity-80"></div>
    </div> -->

    <!-- SCHEDULE SECTION -->
    <section class="relative w-full py-16 bg-gradient-to-b from-[#f5f5f5] to-white overflow-hidden">
        <!-- Background Pattern -->
        <div class="absolute inset-0 opacity-5 z-0">
            <svg width="100%" height="100%" xmlns="http://www.w3.org/2000/svg">
                <defs>
                    <pattern id="schedulePattern" x="0" y="0" width="80" height="80" patternUnits="userSpaceOnUse">
                        <circle cx="20" cy="20" r="2" fill="#D32F2F"/>
                        <circle cx="60" cy="60" r="2" fill="#fbbf24"/>
                        <rect x="35" y="35" width="10" height="10" rx="2" fill="#4CAF50"/>
                    </pattern>
                </defs>
                <rect width="100%" height="100%" fill="url(#schedulePattern)"/>
            </svg>
        </div>
        
        <div class="relative container mx-auto px-4 sm:px-6 lg:px-8 z-10">
            <!-- Section Title -->
            <div class="text-center mb-12">
                <h2 class="font-sancreek uppercase text-[#D32F2F] text-4xl sm:text-5xl md:text-6xl mb-4 [text-shadow:_2px_2px_0_rgba(0,0,0,0.3)]">
                    Agenda Kegiatan
                </h2>
                <p class="text-gray-700 text-lg max-w-2xl mx-auto">
                    Ikuti setiap kegiatan menarik sepanjang hari di Batam Campus Expo 2026
                </p>
            </div>

            <!-- Calendar Style Schedule -->
            <div class="max-w-4xl mx-auto">
                <!-- Calendar Header -->
                <div class="bg-gradient-to-r from-[#D32F2F] to-[#B71C1C] rounded-t-3xl p-6 text-white">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-4">
                            <div class="w-12 h-12 bg-white/20 rounded-full flex items-center justify-center">
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"/>
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-2xl font-bold">25 Januari 2026</h3>
                                <p class="text-white/80">Sabtu • Pollux Mall Batam Centre</p>
                            </div>
                        </div>
                        <div class="text-right">
                            <div class="text-3xl font-bold">📅</div>
                        </div>
                    </div>
                </div>

                <!-- Schedule Items -->
                <div class="bg-white rounded-b-3xl shadow-2xl overflow-hidden">
                    <div class="max-h-[600px] overflow-y-auto custom-scrollbar">
                        @php
                        $schedule = [
                            ['time' => '08:00 – 09:15', 'activity' => 'Open Gate', 'icon' => '🚪', 'color' => 'bg-green-100 text-green-800'],
                            ['time' => '09:15 – 10:00', 'activity' => 'Soft Opening with MC Live', 'icon' => '🎤', 'color' => 'bg-blue-100 text-blue-800'],
                            ['time' => '10:00 – 10:30', 'activity' => 'Say "Welcome" to PNB', 'icon' => '👋', 'color' => 'bg-yellow-100 text-yellow-800'],
                            ['time' => '10:30 – 11:00', 'activity' => 'Opening With - MC Live', 'icon' => '🎪', 'color' => 'bg-red-100 text-red-800'],
                            ['time' => '11:00 – 11:30', 'activity' => 'Kata Sambutan: Rektor Politeknik', 'icon' => '🎓', 'color' => 'bg-purple-100 text-purple-800'],
                            ['time' => '11:30 – 12:00', 'activity' => 'Kata Sambutan: Kepala Dinas Pendidikan', 'icon' => '📚', 'color' => 'bg-indigo-100 text-indigo-800'],
                            ['time' => '12:00 – 12:30', 'activity' => 'Penandatanganan MoU antara Politeknik Negeri Batam dengan Universitas Internasional Batam', 'icon' => '📝', 'color' => 'bg-pink-100 text-pink-800'],
                            ['time' => '12:30 – 13:00', 'activity' => 'Hybrid Workshop', 'icon' => '💻', 'color' => 'bg-cyan-100 text-cyan-800'],
                            ['time' => '13:00 – 13:15', 'activity' => 'Cekin Mingguan + Closing Booth + Info Lainnya', 'icon' => '✅', 'color' => 'bg-emerald-100 text-emerald-800'],
                            ['time' => '13:15 – 17:00', 'activity' => 'Berfoto Bersama Campus Expo', 'icon' => '📸', 'color' => 'bg-orange-100 text-orange-800'],
                            ['time' => '17:00 – 17:45', 'activity' => 'MC Show & Enjoy', 'icon' => '🎭', 'color' => 'bg-red-100 text-red-800'],
                            ['time' => '17:45 – 19:00', 'activity' => 'Games + Prize', 'icon' => '🎮', 'color' => 'bg-green-100 text-green-800'],
                            ['time' => '19:00 – 19:30', 'activity' => 'Bazar Perpustakaan + 100 Uang', 'icon' => '💰', 'color' => 'bg-yellow-100 text-yellow-800'],
                            ['time' => '19:30 – 20:00', 'activity' => 'Festival Kuliner', 'icon' => '🍕', 'color' => 'bg-red-100 text-red-800'],
                            ['time' => '20:00 – 20:15', 'activity' => 'Talk Show: Mahasiswa Hebat Masa Depan Indonesia', 'icon' => '🗣️', 'color' => 'bg-blue-100 text-blue-800'],
                            ['time' => '20:15 – 20:30', 'activity' => 'Tanya Jawab', 'icon' => '❓', 'color' => 'bg-purple-100 text-purple-800'],
                            ['time' => '20:30 – 20:45', 'activity' => 'Safari Perpustakaan + 100 Uang', 'icon' => '📖', 'color' => 'bg-indigo-100 text-indigo-800'],
                            ['time' => '20:45 – 21:00', 'activity' => 'Zummo + Photo', 'icon' => '💃', 'color' => 'bg-pink-100 text-pink-800'],
                            ['time' => '21:00 – 21:30', 'activity' => 'Safari Perpustakaan + 100 Uang', 'icon' => '📚', 'color' => 'bg-cyan-100 text-cyan-800'],
                            ['time' => '21:30 – 22:00', 'activity' => 'Live Music', 'icon' => '🎵', 'color' => 'bg-emerald-100 text-emerald-800'],
                            ['time' => '22:00 – 22:30', 'activity' => 'Talk Show: Mahasiswa, Profesi, & Cerita di Era Digital', 'icon' => '💻', 'color' => 'bg-orange-100 text-orange-800'],
                            ['time' => '22:30 – 22:45', 'activity' => 'Tanya Jawab', 'icon' => '❓', 'color' => 'bg-red-100 text-red-800'],
                            ['time' => '22:45 – 23:00', 'activity' => 'Bazar Perpustakaan + 100 Uang', 'icon' => '💰', 'color' => 'bg-green-100 text-green-800'],
                            ['time' => '23:00 – 23:15', 'activity' => 'Karaoke + Photo', 'icon' => '🎤', 'color' => 'bg-yellow-100 text-yellow-800'],
                            ['time' => '23:15 – 23:30', 'activity' => 'Safari Perpustakaan + 100 Uang', 'icon' => '📖', 'color' => 'bg-blue-100 text-blue-800'],
                            ['time' => '23:30 – 23:45', 'activity' => 'Work Shop + Berfoto', 'icon' => '🔧', 'color' => 'bg-purple-100 text-purple-800'],
                            ['time' => '23:45 – 00:00', 'activity' => 'Talk Show with Mahasiswa: Campus Funfest', 'icon' => '🎪', 'color' => 'bg-indigo-100 text-indigo-800'],
                            ['time' => '00:00 – 00:15', 'activity' => 'Tanya Jawab', 'icon' => '❓', 'color' => 'bg-pink-100 text-pink-800'],
                            ['time' => '00:15 – 00:30', 'activity' => 'Open Pengunjung + 100 Uang', 'icon' => '🚪', 'color' => 'bg-cyan-100 text-cyan-800'],
                            ['time' => '00:30 – 00:45', 'activity' => 'Break Snack + Cheese', 'icon' => '🧀', 'color' => 'bg-emerald-100 text-emerald-800'],
                            ['time' => '00:45 – 01:00', 'activity' => 'Enjoy Pengunjung + 100 Uang', 'icon' => '🎉', 'color' => 'bg-orange-100 text-orange-800'],
                            ['time' => '01:00 – 01:15', 'activity' => 'MC Close to Stage', 'icon' => '🎭', 'color' => 'bg-red-100 text-red-800'],
                            ['time' => '01:15 – 01:30', 'activity' => 'Barista + Trivia', 'icon' => '☕', 'color' => 'bg-green-100 text-green-800'],
                            ['time' => '01:30 – 01:45', 'activity' => 'Menggambar dan Impresi', 'icon' => '🎨', 'color' => 'bg-yellow-100 text-yellow-800'],
                            ['time' => '01:45 – 02:00', 'activity' => 'Live Music + Bingo', 'icon' => '🎵', 'color' => 'bg-blue-100 text-blue-800'],
                            ['time' => '02:00 – 02:15', 'activity' => 'Pengumuman Acara - Start BCT 2026', 'icon' => '📢', 'color' => 'bg-purple-100 text-purple-800'],
                            ['time' => '02:15 – 02:30', 'activity' => 'Close Gate', 'icon' => '🚪', 'color' => 'bg-gray-100 text-gray-800']
                        ];
                        @endphp

                        @foreach($schedule as $index => $item)
                            <div class="flex items-center p-4 border-b border-gray-100 hover:bg-gray-50 transition-colors duration-200 group">
                                <!-- Time -->
                                <div class="flex-shrink-0 w-24 sm:w-32">
                                    <div class="text-[#D32F2F] font-bold text-sm sm:text-base">
                                        {{ $item['time'] }}
                                    </div>
                                </div>
                                
                                <!-- Icon -->
                                <div class="flex-shrink-0 w-12 h-12 mx-4 rounded-full {{ $item['color'] }} flex items-center justify-center text-xl group-hover:scale-110 transition-transform duration-200">
                                    {{ $item['icon'] }}
                                </div>
                                
                                <!-- Activity -->
                                <div class="flex-1 min-w-0">
                                    <h4 class="text-gray-800 font-semibold text-sm sm:text-base leading-tight">
                                        {{ $item['activity'] }}
                                    </h4>
                                </div>
                                
                                <!-- Status Indicator -->
                                <div class="flex-shrink-0 ml-4">
                                    <div class="w-3 h-3 rounded-full bg-gray-300 group-hover:bg-[#D32F2F] transition-colors duration-200"></div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Additional Info Cards -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-12">
                <!-- Duration Card -->
                <div class="bg-gradient-to-br from-[#D32F2F] to-[#B71C1C] rounded-2xl p-6 text-white text-center transform hover:-translate-y-2 transition-all duration-300 shadow-xl">
                    <div class="text-4xl mb-4">⏰</div>
                    <h3 class="text-xl font-bold mb-2">Durasi Acara</h3>
                    <p class="text-white/80">18 Jam 30 Menit</p>
                    <p class="text-sm text-white/60 mt-2">08:00 - 02:30</p>
                </div>
                
                <!-- Activities Card -->
                <div class="bg-gradient-to-br from-[#fbbf24] to-[#f59e0b] rounded-2xl p-6 text-white text-center transform hover:-translate-y-2 transition-all duration-300 shadow-xl">
                    <div class="text-4xl mb-4">🎪</div>
                    <h3 class="text-xl font-bold mb-2">Total Kegiatan</h3>
                    <p class="text-white/80">36 Agenda</p>
                    <p class="text-sm text-white/60 mt-2">Beragam Aktivitas</p>
                </div>
                
                <!-- Prize Card -->
                <div class="bg-gradient-to-br from-[#4CAF50] to-[#388E3C] rounded-2xl p-6 text-white text-center transform hover:-translate-y-2 transition-all duration-300 shadow-xl">
                    <div class="text-4xl mb-4">🏆</div>
                    <h3 class="text-xl font-bold mb-2">Hadiah & Doorprize</h3>
                    <p class="text-white/80">Tersedia</p>
                    <p class="text-sm text-white/60 mt-2">Games & Kompetisi</p>
                </div>
            </div>
        </div>
    </section>

    @push('styles')
    <style>
        /* Custom Scrollbar */
        .custom-scrollbar::-webkit-scrollbar {
            width: 6px;
        }
        
        .custom-scrollbar::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 3px;
        }
        
        .custom-scrollbar::-webkit-scrollbar-thumb {
            background: #D32F2F;
            border-radius: 3px;
        }
        
        .custom-scrollbar::-webkit-scrollbar-thumb:hover {
            background: #B71C1C;
        }

        /* Floating Animation */
        @keyframes float {
            0%, 100% { 
                transform: translateY(0px) rotate(var(--rotation, 0deg)); 
            }
            50% { 
                transform: translateY(-20px) rotate(var(--rotation, 0deg)); 
            }
        }

        /* Bounce Animation */
        @keyframes bounce {
            0%, 100% { 
                transform: translateY(0px) scale(1); 
            }
            50% { 
                transform: translateY(-10px) scale(1.1); 
            }
        }

        /* Pulse Animation for Current Time */
        @keyframes pulse-glow {
            0%, 100% { 
                box-shadow: 0 0 5px rgba(211, 47, 47, 0.5);
            }
            50% { 
                box-shadow: 0 0 20px rgba(211, 47, 47, 0.8);
            }
        }

        .current-activity {
            background: linear-gradient(135deg, #D32F2F, #B71C1C) !important;
            color: white !important;
            animation: pulse-glow 2s infinite;
        }

        .current-activity .text-gray-800 {
            color: white !important;
        }

        .current-activity .bg-gray-300 {
            background-color: rgba(255, 255, 255, 0.8) !important;
        }

        /* Responsive adjustments */
        @media (max-width: 640px) {
            .hero-section {
                min-height: 60vh;
            }
            
            .schedule-item {
                flex-direction: column;
                align-items: flex-start;
                gap: 0.5rem;
            }
        }

        /* Smooth scroll behavior */
        .custom-scrollbar {
            scroll-behavior: smooth;
        }
    </style>
    @endpush

    @push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Highlight current activity based on time
            function highlightCurrentActivity() {
                const now = new Date();
                const currentTime = now.getHours() * 100 + now.getMinutes(); // Convert to HHMM format
                
                const scheduleItems = document.querySelectorAll('.flex.items-center.p-4');
                
                scheduleItems.forEach(item => {
                    const timeText = item.querySelector('.text-\\[\\#D32F2F\\]').textContent;
                    const timeRange = timeText.split(' – ');
                    
                    if (timeRange.length === 2) {
                        const startTime = parseTime(timeRange[0]);
                        const endTime = parseTime(timeRange[1]);
                        
                        // Handle overnight activities (crossing midnight)
                        if (endTime < startTime) {
                            if (currentTime >= startTime || currentTime <= endTime) {
                                item.classList.add('current-activity');
                            } else {
                                item.classList.remove('current-activity');
                            }
                        } else {
                            if (currentTime >= startTime && currentTime <= endTime) {
                                item.classList.add('current-activity');
                            } else {
                                item.classList.remove('current-activity');
                            }
                        }
                    }
                });
            }
            
            function parseTime(timeStr) {
                const [hours, minutes] = timeStr.split(':').map(num => parseInt(num));
                return hours * 100 + minutes;
            }
            
            // Update every minute
            highlightCurrentActivity();
            setInterval(highlightCurrentActivity, 60000);
            
            // Smooth scroll to current activity
            function scrollToCurrentActivity() {
                const currentActivity = document.querySelector('.current-activity');
                if (currentActivity) {
                    currentActivity.scrollIntoView({ 
                        behavior: 'smooth', 
                        block: 'center' 
                    });
                }
            }
            
            // Add click handler for "Lihat Kegiatan Sekarang" button
            const scrollButton = document.createElement('button');
            scrollButton.innerHTML = '📍 Lihat Kegiatan Sekarang';
            scrollButton.className = 'fixed bottom-6 right-6 bg-gradient-to-r from-[#D32F2F] to-[#B71C1C] text-white px-6 py-3 rounded-full shadow-lg hover:shadow-xl transition-all duration-300 hover:-translate-y-1 z-50 font-semibold';
            scrollButton.onclick = scrollToCurrentActivity;
            document.body.appendChild(scrollButton);
            
            // Add countdown to next activity
            function updateCountdown() {
                const now = new Date();
                const currentTime = now.getHours() * 100 + now.getMinutes();
                
                // Find next activity
                const scheduleItems = document.querySelectorAll('.flex.items-center.p-4');
                let nextActivity = null;
                
                scheduleItems.forEach(item => {
                    const timeText = item.querySelector('.text-\\[\\#D32F2F\\]').textContent;
                    const timeRange = timeText.split(' – ');
                    
                    if (timeRange.length === 2) {
                        const startTime = parseTime(timeRange[0]);
                        
                        if (startTime > currentTime && !nextActivity) {
                            nextActivity = {
                                time: timeRange[0],
                                activity: item.querySelector('.text-gray-800').textContent,
                                startTime: startTime
                            };
                        }
                    }
                });
                
                // Update page title with next activity
                if (nextActivity) {
                    const minutesUntil = Math.floor((nextActivity.startTime - currentTime) / 100) * 60 + 
                                       (nextActivity.startTime - currentTime) % 100;
                    
                    if (minutesUntil > 0 && minutesUntil < 60) {
                        document.title = `(${minutesUntil}m) ${nextActivity.activity} - Kegiatan BCT`;
                    }
                }
            }
            
            updateCountdown();
            setInterval(updateCountdown, 60000);
            
            // Add hover effects for schedule items
            const scheduleItems = document.querySelectorAll('.flex.items-center.p-4');
            scheduleItems.forEach(item => {
                item.addEventListener('mouseenter', function() {
                    if (!this.classList.contains('current-activity')) {
                        this.style.transform = 'translateX(10px)';
                        this.style.backgroundColor = '#f9fafb';
                    }
                });
                
                item.addEventListener('mouseleave', function() {
                    if (!this.classList.contains('current-activity')) {
                        this.style.transform = 'translateX(0)';
                        this.style.backgroundColor = '';
                    }
                });
            });
        });
    </script>
    @endpush
</x-layout.app>