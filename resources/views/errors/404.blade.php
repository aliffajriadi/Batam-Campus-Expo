<x-layout.app :title="'Halaman Tidak Ditemukan - Batam Campus Expo'">
    <div class="absolute inset-0 -z-10">
        <div class="absolute inset-0 bg-[#87CEEB]"></div>
        <div class="absolute inset-0 bg-cover bg-center bg-[length:100%_100%]"
            style="background-image: url('{{ asset('images/MainBG.svg') }}')"></div>
        <!-- Overlay untuk meningkatkan kontras -->
        <div class="absolute inset-0 bg-gradient-to-b from-black/20 via-transparent to-black/30"></div>
    </div>

    <div class="min-h-screen flex items-center justify-center pt-20 px-4">
        <div class="container mx-auto text-center">
            <div class="mb-8 headline-animate">
                <!-- 404 Number dengan styling yang lebih menonjol -->
                <div class="relative inline-block mb-6">
                    <h1 class="font-sancreek text-[#D32F2F] text-8xl sm:text-9xl md:text-[10rem] lg:text-[12rem] leading-none 
                        [text-shadow:_4px_4px_0_#FFB6C1,_8px_8px_0_rgba(255,99,132,0.3),_0_0_40px_rgba(255,182,193,0.6)]
                        stroke-text relative z-10">
                        404
                    </h1>
                    <!-- Glow effect di belakang -->
                    <div class="absolute inset-0 blur-3xl bg-red-300/30 -z-10 scale-110"></div>
                </div>

                <!-- Title dengan background yang lebih kontras -->
                <div class="inline-block mb-8">
                    <h2 class="font-sancreek text-white text-3xl sm:text-4xl md:text-5xl px-8 py-4 rounded-2xl
                        bg-gradient-to-r from-[#D32F2F] via-[#E53935] to-[#D32F2F]
                        shadow-[0_8px_32px_rgba(211,47,47,0.4)]
                        border-4 border-white/30
                        [text-shadow:_2px_2px_4px_rgba(0,0,0,0.3)]">
                        HALAMAN TIDAK DITEMUKAN
                    </h2>
                </div>

                <!-- Description dengan kontras lebih baik -->
                <div class="max-w-md mx-auto mb-10">
                    <p class="text-gray-900 text-lg leading-relaxed 
                        bg-white/90 backdrop-blur-md 
                        p-6 rounded-2xl 
                        border-2 border-white 
                        shadow-[0_8px_32px_rgba(0,0,0,0.1)]
                        font-medium">
                        Sepertinya kamu tersesat di wahana expo. Jangan khawatir, yuk kembali ke panggung utama!
                    </p>
                </div>

                <!-- Button dengan styling lebih menonjol -->
                <a href="{{ url('/') }}" 
                    class="ticket-button inline-block 
                    bg-gradient-to-r from-[#D32F2F] via-[#E53935] to-[#D32F2F]
                    text-white font-bold text-lg
                    px-10 py-4 rounded-full
                    shadow-[0_8px_32px_rgba(211,47,47,0.4)]
                    border-4 border-white/40
                    hover:scale-105 hover:shadow-[0_12px_48px_rgba(211,47,47,0.5)]
                    transition-all duration-300
                    [text-shadow:_1px_1px_2px_rgba(0,0,0,0.2)]">
                    🏠 Kembali ke Beranda
                </a>
            </div>

            <!-- Decorative Elements dengan shadow -->
            <div class="flex justify-center gap-8 mt-16">
                <div class="animate-bounce drop-shadow-lg" style="animation-delay: 0.2s">
                    <img src="{{ asset('images/balloon.svg') }}" class="w-12 h-12" alt="balloon">
                </div>
                <div class="animate-bounce drop-shadow-lg">
                    <img src="{{ asset('images/balloon.svg') }}" class="w-16 h-16" alt="balloon">
                </div>
                <div class="animate-bounce drop-shadow-lg" style="animation-delay: 0.5s">
                    <img src="{{ asset('images/balloon.svg') }}" class="w-10 h-10" alt="balloon">
                </div>
            </div>
        </div>
    </div>

    <style>
        @keyframes headline-animate {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
        }

        .headline-animate {
            animation: headline-animate 3s ease-in-out infinite;
        }

        /* Optional: Stroke effect untuk 404 */
        .stroke-text {
            -webkit-text-stroke: 3px rgba(255, 255, 255, 0.3);
        }
    </style>
</x-layout.app>