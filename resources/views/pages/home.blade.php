<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Batam Campus Expo</title>

    <!-- Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Sancreek&display=swap" rel="stylesheet">

    <style>
        /* ===============================
           HEADLINE STYLE
           =============================== */
        .headline-main {
            font-family: 'Sancreek', cursive;
            text-transform: uppercase;
            color: #D32F2F;
            text-shadow: 
                3px 3px 0 rgba(0, 0, 0, 0.8),
                6px 6px 0 rgba(0, 0, 0, 0.6),
                0 0 20px rgba(166, 30, 34, 0.5);
            line-height: 0.85;
        }

        /* ===============================
           LAYOUT BASE
           =============================== */
        .main-container {
            position: relative;
            min-height: 100vh;
            width: 100%;
            overflow: hidden;
        }

        .bg-layer {
            position: absolute;
            inset: 0;
            z-index: -1;
        }

        .content-layer {
            position: relative;
            z-index: 10;
        }

        /* ===============================
           COUNTDOWN (DIPERKECIL & DIPADATKAN)
           =============================== */
        .timer-bg-container {
            position: relative;
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 1rem auto;
        }

        .timer-svg-bg {
            position: absolute;
            width: 100%;
            max-width: 520px;
            height: auto;
            z-index: 1;
            pointer-events: none;
            top: 50%;
            transform: translateY(-50%);
        }

        .timer-content {
            position: relative;
            z-index: 2;
            padding: 1rem;
            width: 100%;
        }

        .timer-number {
            font-family: 'Sancreek', cursive;
            color: #A61E22;
            text-shadow: 0 0 10px rgba(166, 30, 34, 0.5);
        }

        /* ===============================
           BUTTON
           =============================== */
        .ticket-button {
            background: linear-gradient(135deg, #ff6b6b, #ee5a24);
            box-shadow: 0 4px 15px rgba(238, 90, 36, 0.4);
            transition: all 0.3s ease;
        }

        .ticket-button:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 20px rgba(238, 90, 36, 0.6);
        }

        /* ===============================
           LOCATION LINK
           =============================== */
        .location-link {
            display: inline-flex;
            align-items: center;
            background: linear-gradient(135deg, #fbbf24, #f59e0b);
            color: #000;
            font-weight: bold;
            padding: 0.5rem 1.25rem;
            border-radius: 9999px;
            transition: all 0.3s ease;
            box-shadow: 0 4px 12px rgba(245, 158, 11, 0.3);
        }

        .location-link:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 16px rgba(245, 158, 11, 0.4);
        }

        /* ===============================
           ANIMASI FADE IN
           =============================== */

        /* Animasi Navbar - Slide dari atas */
        @keyframes navbarSlideDown {
            0% {
                opacity: 0;
                transform: translateY(-50px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Animasi dari tengah membesar */
       //* @keyframes fadeInScale {
            0% {
                opacity: 0;
                transform: translate(-50%, -50%) scale(0.5);
            }
            100% {
                opacity: 1;
                transform: translate(-50%, -50%) scale(1);
            }
        }

        /* Class untuk setiap elemen */
        /* .navbar-animate {
            animation: navbarSlideDown 1s cubic-bezier(0.34, 1.56, 0.64, 1) forwards;
            opacity: 0;
        }

        .headline-animate {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%) scale(0.5);
            animation: fadeInScale 1.2s cubic-bezier(0.34, 1.56, 0.64, 1) forwards;
            animation-delay: 0.5s;
            opacity: 0;
            z-index: 100;
        }

        .timer-animate {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%) scale(0.5);
            animation: fadeInScale 1.2s cubic-bezier(0.34, 1.56, 0.64, 1) forwards;
            animation-delay: 1.2s;
            opacity: 0;
            z-index: 100;
        }

        .button-animate {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%) scale(0.5);
            animation: fadeInScale 1.2s cubic-bezier(0.34, 1.56, 0.64, 1) forwards;
            animation-delay: 1.9s;
            opacity: 0;
            z-index: 100;
        }

        /* ===============================
            ANIMASI BARU: SLIDE UP & DOWN
            =============================== */

            /* Slide Down dari atas (untuk navbar) */
            @keyframes slideDown {
                from {
                    transform: translateY(-100px);
                    opacity: 0;
                }
                to {
                    transform: translateY(0);
                    opacity: 1;
                }
            }

            /* Slide Up dari tengah ke atas (untuk headline) */
            @keyframes slideUpToTop {
                from {
                    transform: translateY(50vh) scale(0.8);
                    opacity: 0;
                }
                to {
                    transform: translateY(0) scale(1);
                    opacity: 1;
                }
            }

            /* Slide Down dari tengah ke bawah (untuk timer & button) */
            @keyframes slideDownFromCenter {
                from {
                    transform: translateY(-50vh) scale(0.8);
                    opacity: 0;
                }
                to {
                    transform: translateY(0) scale(1);
                    opacity: 1;
                }
            }

            /* Class untuk elemen */
            .navbar-animate {
                animation: slideDown 2s ease-out forwards;
                opacity: 0;
            }

            .headline-animate {
                animation: slideUpToTop 1.2s ease-out forwards;
                opacity: 0;
            }

            .timer-animate,
            .button-animate {
                animation: slideDownFromCenter 1.2s ease-out forwards;
                opacity: 0;
            }

            /* Efek blink headline (tetap dipertahankan) */
            @keyframes circusBlink {
                0%, 100% { opacity: 1; }
                5%, 10%, 15%, 20%, 25%, 30%, 35%, 40%, 45%, 50% {
                    opacity: var(--blink-opacity, 1);
                }
                7%, 12%, 17%, 22%, 27%, 32%, 37%, 42%, 47% {
                    opacity: 0.3;
                }
            }

            .headline-main.blinking {
                animation: circusBlink 3s infinite;
                animation-timing-function: steps(1);
            }

        /* State setelah animasi selesai */
        .headline-animate.animation-done,
        .timer-animate.animation-done,
        .button-animate.animation-done {
            position: static !important;
            transform: none !important;
            z-index: auto !important;
        }
        @keyframes circusBlink {
            0%, 100% { opacity: 1; }
            5%, 10%, 15%, 20%, 25%, 30%, 35%, 40%, 45%, 50% {
                opacity: var(--blink-opacity, 1);
            }
            7%, 12%, 17%, 22%, 27%, 32%, 37%, 42%, 47% {
                opacity: 0.3;
            }
        }

        .headline-main.blinking {
            animation: circusBlink 3s infinite;
            animation-timing-function: steps(1);
        }
    </style>
</head>

<body>
<div class="main-container">

    <!-- BACKGROUND -->
    <div class="bg-layer">
        <img src="{{ asset('images/MainBG.svg') }}" class="w-full h-full object-cover" alt="">
    </div>

    <!-- NAVBAR - Tambahkan class navbar-animate -->
    <nav class="navbar-animate">
        @include('layouts.partials.navbar')
    </nav>

    <!-- CONTENT -->
    <div class="content-layer">
        <div class="container mx-auto px-4 py-6">

            <!-- HEADLINE - Tambahkan class headline-animate -->
            <div class="text-center mb-6 pt-2 headline-animate">
                <h1 class="headline-main text-7xl md:text-8xl lg:text-9xl mb-2">BATAM</h1>
                <h2 class="headline-main text-6xl md:text-7xl lg:text-8xl">CAMPUS EXPO</h2>

                <!-- LOCATION -->
                <div class="mt-6 mb-8">
                    <a href="https://www.google.com/maps/search/?api=1&query=Pollux+Mall+Batam+Centre"
                       target="_blank"
                       class="location-link text-base md:text-lg">
                        <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                  d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9z"/>
                        </svg>
                        {{ $lokasi }}
                    </a>
                </div>
            </div>

            <!-- COUNTDOWN - Tambahkan class timer-animate -->
            <div class="timer-bg-container timer-animate">
                <div class="timer-svg-bg">
                    <img src="{{ asset('images/Countdown.svg') }}" class="w-full" alt="">
                </div>

                <div class="timer-content">
                    <div class="flex justify-center items-center mb-2">
                        {{-- 2026-02-07 09:59:00 --}}
                        <div class="timer-number text-3xl md:text-5xl lg:text-6xl mx-2" id="days">0</div>
                        <div class="timer-number text-3xl md:text-5xl lg:text-6xl">:</div>
                        <div class="timer-number text-3xl md:text-5xl lg:text-6xl mx-2" id="hours">00</div>
                        <div class="timer-number text-3xl md:text-5xl lg:text-6xl">:</div>
                        <div class="timer-number text-3xl md:text-5xl lg:text-6xl mx-2" id="minutes">00</div>
                        <div class="timer-number text-3xl md:text-5xl lg:text-6xl">:</div>
                        <div class="timer-number text-3xl md:text-5xl lg:text-6xl mx-2" id="seconds">00</div>
                    </div>

                    <div class="flex justify-center gap-6 text-sm md:text-base timer-number">
                        <span>Hari</span>
                        <span>Jam</span>
                        <span>Menit</span>
                        <span>Detik</span>
                    </div>
                </div>
            </div>

            <!-- CTA BUTTON - Tambahkan class button-animate -->
            <div class="text-center mt-8 button-animate">
                @if ($ticket_status == 'open')
                    <button id="ticket-button"
                            class="ticket-button text-white font-bold text-lg md:text-xl px-8 py-3 rounded-full">
                        Get Your Ticket Now !
                    </button>
                @else
                    <button disabled
                            class="ticket-button text-white font-bold text-lg md:text-xl px-8 py-3 rounded-full">
                        Ticket Not Available
                    </button>
                @endif
            </div>

        </div>
    </div>
</div>
<p>
    {{ $desc_event }}
</p>

<!-- SCRIPT -->
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

    document.getElementById('ticket-button').onclick = () => {
        window.location.href = "{{ route('tickets') }}";
    };

    // Animasi berurutan tanpa menghilang
    document.addEventListener('DOMContentLoaded', function () {
        const navbar = document.querySelector('.navbar-animate');
        const headline = document.querySelector('.headline-animate');
        const timer = document.querySelector('.timer-animate');
        const button = document.querySelector('.button-animate');

        if (!navbar || !headline || !timer || !button) return;

        // Navbar muncul dulu
        setTimeout(() => {
            navbar.style.opacity = "1";
        }, 100);

        // Headline muncul setelah navbar
        setTimeout(() => {
            headline.style.opacity = "1";
            // Tambahkan efek blink setelah headline muncul
            setTimeout(() => {
                document.querySelectorAll('.headline-main').forEach(h => {
                    h.classList.add('blinking');
                    h.style.setProperty('--blink-opacity', Math.random() > 0.5 ? '0.6' : '0.8');
                });
            }, 500);
        }, 800);

        // Timer muncul setelah headline
        setTimeout(() => {
            timer.style.opacity = "1";
        }, 1600);

        // Button muncul terakhir
        setTimeout(() => {
            button.style.opacity = "1";
        }, 2400);
    });
</script>
</body>
</html>   