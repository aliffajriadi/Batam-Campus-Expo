<x-layout.app title="Batam Campus Expo">
    <!-- BACKGROUND -->
    <div class="absolute inset-0 -z-10">
        <img src="{{ asset('images/MainBG.svg') }}" class="w-full h-full object-cover" alt="">
    </div>
    <!-- CONTENT -->
    <div class="relative z-10">
        <div class="container mx-auto px-4 py-6">

            <!-- HEADLINE - Tambahkan class headline-animate -->
            <div class="text-center mb-6 pt-2 animate-headline-slide opacity-0">
                <h1
                    class="font-sancreek uppercase text-[#D32F2F] leading-[0.85] text-7xl md:text-8xl lg:text-9xl mb-2 [text-shadow:_3px_3px_0_rgba(0,0,0,0.8),_6px_6px_0_rgba(0,0,0,0.6),_0_0_20px_rgba(166,30,34,0.5)] headline-main">
                    BATAM</h1>
                <h2
                    class="font-sancreek uppercase text-[#D32F2F] leading-[0.85] text-6xl md:text-7xl lg:text-8xl [text-shadow:_3px_3px_0_rgba(0,0,0,0.8),_6px_6px_0_rgba(0,0,0,0.6),_0_0_20px_rgba(166,30,34,0.5)] headline-main">
                    CAMPUS EXPO</h2>

                <!-- LOCATION -->
                <div class="mt-6 mb-8">
                    <a href="https://www.google.com/maps/search/?api=1&query=Pollux+Mall+Batam+Centre" target="_blank"
                        class="inline-flex items-center bg-gradient-to-br from-[#fbbf24] to-[#f59e0b] text-black font-bold py-2 px-5 rounded-full transition-all duration-300 shadow-[0_4px_12px_rgba(245,158,11,0.3)] hover:-translate-y-[2px] hover:shadow-[0_6px_16px_rgba(245,158,11,0.4)] text-base md:text-lg">
                        <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9z" />
                        </svg>
                        {{ $lokasi }}
                    </a>
                </div>
            </div>

            <!-- COUNTDOWN - Tambahkan class timer-animate -->
            <div class="relative w-full flex justify-center items-center my-4 animate-fade-scale opacity-0">
                <div class="absolute w-full max-w-[520px] h-auto z-[1] pointer-events-none top-1/2 -translate-y-1/2">
                    <img src="{{ asset('images/Countdown.svg') }}" class="w-full" alt="">
                </div>

                <div class="relative z-[2] p-4 w-full">
                    <div class="flex justify-center items-center mb-2">
                        {{-- 2026-02-07 09:59:00 --}}
                        <div class="font-sancreek text-[#A61E22] drop-shadow-[0_0_10px_rgba(166,30,34,0.5)] text-3xl md:text-5xl lg:text-6xl mx-2"
                            id="days">0</div>
                        <div
                            class="font-sancreek text-[#A61E22] drop-shadow-[0_0_10px_rgba(166,30,34,0.5)] text-3xl md:text-5xl lg:text-6xl">
                            :</div>
                        <div class="font-sancreek text-[#A61E22] drop-shadow-[0_0_10px_rgba(166,30,34,0.5)] text-3xl md:text-5xl lg:text-6xl mx-2"
                            id="hours">00</div>
                        <div
                            class="font-sancreek text-[#A61E22] drop-shadow-[0_0_10px_rgba(166,30,34,0.5)] text-3xl md:text-5xl lg:text-6xl">
                            :</div>
                        <div class="font-sancreek text-[#A61E22] drop-shadow-[0_0_10px_rgba(166,30,34,0.5)] text-3xl md:text-5xl lg:text-6xl mx-2"
                            id="minutes">00</div>
                        <div
                            class="font-sancreek text-[#A61E22] drop-shadow-[0_0_10px_rgba(166,30,34,0.5)] text-3xl md:text-5xl lg:text-6xl">
                            :</div>
                        <div class="font-sancreek text-[#A61E22] drop-shadow-[0_0_10px_rgba(166,30,34,0.5)] text-3xl md:text-5xl lg:text-6xl mx-2"
                            id="seconds">00</div>
                    </div>

                    <div
                        class="flex justify-center gap-6 text-sm md:text-base font-sancreek text-[#A61E22] drop-shadow-[0_0_10px_rgba(166,30,34,0.5)]">
                        <span>Hari</span>
                        <span>Jam</span>
                        <span>Menit</span>
                        <span>Detik</span>
                    </div>
                </div>
            </div>

            <!-- CTA BUTTON - Tambahkan class button-animate -->
            <div class="text-center mt-8 animate-fade-scale opacity-0">
                @if ($ticket_status == 'open')
                    <button id="ticket-button"
                        class="bg-gradient-to-br from-[#ff6b6b] to-[#ee5a24] shadow-[0_4px_15px_rgba(238,90,36,0.4)] transition-all duration-300 hover:-translate-y-[3px] hover:shadow-[0_6px_20px_rgba(238,90,36,0.6)] text-white font-bold text-lg md:text-xl px-8 py-3 rounded-full">
                        Get Your Ticket Now !
                    </button>
                @else
                    <button disabled
                        class="bg-gradient-to-br from-[#ff6b6b] to-[#ee5a24] shadow-[0_4px_15px_rgba(238,90,36,0.4)] transition-all duration-300 hover:-translate-y-[3px] hover:shadow-[0_6px_20px_rgba(238,90,36,0.6)] text-white font-bold text-lg md:text-xl px-8 py-3 rounded-full opacity-70 cursor-not-allowed">
                        Ticket Not Available
                    </button>
                @endif
            </div>

        </div>
    </div>
    </div>
    

    <!-- SCRIPT -->
    @push('scripts')
        <script>
            const targetDate = new Date(@json($end_event));

            function updateCountdown() {
                const now = new Date().getTime();
                const distance = targetDate - now;

                const d = Math.max(0, Math.floor(distance / 86400000));
                const h = Math.max(0, Math.floor(distance / 3600000) % 24);
                const m = Math.max(0, Math.floor(distance / 60000) % 60);
                const s = Math.max(0, Math.floor(distance / 1000) % 60);

                document.getElementById('days').textContent = d;
                document.getElementById('hours').textContent = h.toString().padStart(2, '0');
                document.getElementById('minutes').textContent = m.toString().padStart(2, '0');
                document.getElementById('seconds').textContent = s.toString().padStart(2, '0');
            }

            setInterval(updateCountdown, 1000);
            updateCountdown();

            const ticketButton = document.getElementById('ticket-button');
            if (ticketButton) {
                ticketButton.onclick = () => {
                    window.location.href = "{{ route('tickets') }}";
                };
            }

            // Animasi berurutan tanpa menghilang
            document.addEventListener('DOMContentLoaded', function() {
                const navbar = document.querySelector('.animate-navbar-slide');
                const headlines = document.querySelectorAll('.animate-headline-slide');
                const timers = document.querySelectorAll('.animate-fade-scale'); // Assuming these are the ones
                // Since we removed specific classes like timer-animate and button-animate and used exact tailwind animations directly or classes
                // Wait, looking at my code above: 
                // nav class="animate-navbar-slide opacity-0"
                // div class="... animate-headline-slide opacity-0"
                // div class="... animate-fade-scale opacity-0" (Countdown)
                // div class="... animate-fade-scale opacity-0" (Button)

                // Use querySelectorAll for the specific animation classes to get the elements
                const navbarEl = document.querySelector('.animate-navbar-slide');
                const headlineEl = document.querySelector('.animate-headline-slide');

                // Note: The original code used querySelector for timer and button specifically. 
                // I used same animation class for both timer and button: animate-fade-scale
                // Let's grab them by their container order or similar
                const fadeScaleEls = document.querySelectorAll('.animate-fade-scale');
                const timerEl = fadeScaleEls[0];
                const buttonEl = fadeScaleEls[1];

                if (!navbarEl || !headlineEl || !timerEl || !buttonEl) return;

                // Navbar muncul dulu
                setTimeout(() => {
                    navbarEl.style.opacity = "1";
                }, 100);

                // Headline muncul setelah navbar
                setTimeout(() => {
                    headlineEl.style.opacity = "1";
                    // Tambahkan efek blink setelah headline muncul
                    setTimeout(() => {
                        document.querySelectorAll('.headline-main').forEach(h => {
                            h.classList.add('animate-blink');
                            h.style.setProperty('--blink-opacity', Math.random() > 0.5 ? '0.6' :
                                '0.8');
                        });
                    }, 500);
                }, 800);

                // Timer muncul setelah headline
                setTimeout(() => {
                    timerEl.style.opacity = "1";
                }, 1600);

                // Button muncul terakhir
                setTimeout(() => {
                    buttonEl.style.opacity = "1";
                }, 2400);
            });
        </script>
    @endpush
</x-layout.app>
