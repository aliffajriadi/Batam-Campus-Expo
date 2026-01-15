<x-layout.app :title="'Akses Dilarang - Batam Campus Expo'">
    <div class="absolute inset-0 -z-10">
        <div class="absolute inset-0 bg-[#87CEEB]"></div>
        <div class="absolute inset-0 bg-cover bg-center bg-[length:100%_100%]"
            style="background-image: url('{{ asset('images/MainBG.svg') }}')"></div>
    </div>

    <div class="min-h-screen flex items-center justify-center pt-20">
        <div class="container mx-auto px-4 text-center">
            <div class="mb-8 headline-animate">
                <h1
                    class="font-sancreek text-[#D32F2F] text-8xl sm:text-9xl md:text-[10rem] lg:text-[12rem] leading-none [text-shadow:_2px_2px_0_rgba(255,99,132,0.4),_0_0_20px_rgba(255,182,193,0.5)]">
                    403
                </h1>
                <h2 class="font-sancreek text-[#D32F2F] text-3xl sm:text-4xl md:text-5xl mt-4 mb-8">
                    AREA TERBATAS!
                </h2>
                <div class="max-w-md mx-auto mb-10">
                    <p
                        class="text-gray-800 text-lg leading-relaxed bg-white/50 backdrop-blur-sm p-4 rounded-xl border border-white/30">
                        Ups! Kamu tidak punya tiket sakti untuk masuk ke area ini. Silakan kembali ke jalur yang benar
                        ya!
                    </p>
                </div>
                <a href="{{ url('/') }}" class="ticket-button inline-block">
                    Kembali ke Beranda
                </a>
            </div>

            <!-- Decorative Elements -->
            <div class="flex justify-center gap-8 mt-12">
                <svg class="w-16 h-16 text-[#D32F2F] animate-pulse" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z">
                    </path>
                </svg>
            </div>
        </div>
    </div>
</x-layout.app>
