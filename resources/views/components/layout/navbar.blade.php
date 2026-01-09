<nav class="bg-white/98 backdrop-blur-[10px] rounded-[35px] py-3 px-8 my-6 mx-auto max-w-[1200px] border-2 border-black/10 shadow-[0_8px_32px_rgba(0,0,0,0.15)] transition-all duration-300 relative z-50 max-lg:py-3 max-lg:px-6 max-lg:my-6 max-lg:mx-4 max-lg:rounded-[25px] max-lg:sticky max-lg:top-0 max-lg:z-[100] max-md:p-3 max-md:m-3 max-md:rounded-[20px] max-md:z-[1000] max-[375px]:py-2 max-[375px]:px-3 max-[375px]:m-3 max-[375px]:mx-2 z-[1000]"
    id="main-navbar">
    <div class="flex justify-between items-center relative z-10 w-full">
        <!-- Logo/Brand -->
        <div class="flex items-center z-45">
            <a href="{{ url('/') }}" class="no-underline transition-transform duration-300 hover:scale-105">
                <div
                    class="font-sancreek text-[#D32F2F] text-2xl leading-[0.9] drop-shadow-[1px_1px_2px_rgba(0,0,0,0.2)] max-lg:text-[1.3rem] max-md:text-[1.2rem] max-[375px]:text-[1.1rem]">
                    BATAM<br>CAMPUS EXPO</div>
            </a>
        </div>

        <!-- Desktop Navigation Links -->
        <div class="flex gap-6 items-center hidden md:flex max-lg:gap-4">
            <a href="{{ url('/') }}"
                class="text-[#333] no-underline font-semibold text-base transition-all duration-300 relative py-2 hover:text-[#D32F2F] hover:-translate-y-[1px] group {{ request()->is('/') ? 'text-[#D32F2F]' : '' }} max-lg:text-sm">
                Home
                <span
                    class="absolute bottom-0 left-0 h-[2px] bg-[#D32F2F] transition-[width] duration-300 {{ request()->is('/') ? 'w-full' : 'w-0 group-hover:w-full' }}"></span>
            </a>
            <a href="{{ url('/voting') }}"
                class="text-[#333] no-underline font-semibold text-base transition-all duration-300 relative py-2 hover:text-[#D32F2F] hover:-translate-y-[1px] group {{ request()->is('voting') ? 'text-[#D32F2F]' : '' }} max-lg:text-sm">
                Voting
                <span
                    class="absolute bottom-0 left-0 h-[2px] bg-[#D32F2F] transition-[width] duration-300 {{ request()->is('voting') ? 'w-full' : 'w-0 group-hover:w-full' }}"></span>
            </a>
            <a href="{{ url('/kampus') }}"
                class="text-[#333] no-underline font-semibold text-base transition-all duration-300 relative py-2 hover:text-[#D32F2F] hover:-translate-y-[1px] group {{ request()->is('kampus') ? 'text-[#D32F2F]' : '' }} max-lg:text-sm">
                Kampus
                <span
                    class="absolute bottom-0 left-0 h-[2px] bg-[#D32F2F] transition-[width] duration-300 {{ request()->is('kampus') ? 'w-full' : 'w-0 group-hover:w-full' }}"></span>
            </a>
            <a href="{{ url('/kegiatan') }}"
                class="text-[#333] no-underline font-semibold text-base transition-all duration-300 relative py-2 hover:text-[#D32F2F] hover:-translate-y-[1px] group {{ request()->is('kegiatan') ? 'text-[#D32F2F]' : '' }} max-lg:text-sm">
                Kegiatan
                <span
                    class="absolute bottom-0 left-0 h-[2px] bg-[#D32F2F] transition-[width] duration-300 {{ request()->is('kegiatan') ? 'w-full' : 'w-0 group-hover:w-full' }}"></span>
            </a>
            <a href="{{ url('/toko') }}"
                class="text-[#333] no-underline font-semibold text-base transition-all duration-300 relative py-2 hover:text-[#D32F2F] hover:-translate-y-[1px] group {{ request()->is('toko') ? 'text-[#D32F2F]' : '' }} max-lg:text-sm">
                Toko
                <span
                    class="absolute bottom-0 left-0 h-[2px] bg-[#D32F2F] transition-[width] duration-300 {{ request()->is('toko') ? 'w-full' : 'w-0 group-hover:w-full' }}"></span>
            </a>

            @auth
                <!-- Jika user sudah login -->
                <span class="text-[#ccc] mx-2 font-light max-lg:hidden">|</span>
                <a href="{{ url('/ticket-user') }}"
                    class="text-[#333] no-underline font-semibold text-base transition-all duration-300 relative py-2 hover:text-[#D32F2F] hover:-translate-y-[1px] group {{ request()->is('ticket-user') ? 'text-[#D32F2F]' : '' }} max-lg:text-sm">
                    Tiket
                    <span
                        class="absolute bottom-0 left-0 h-[2px] bg-[#D32F2F] transition-[width] duration-300 {{ request()->is('ticket-user') ? 'w-full' : 'w-0 group-hover:w-full' }}"></span>
                </a>

                <div class="relative user-dropdown">
                    <button
                        class="user-menu-btn flex items-center gap-2 bg-gradient-to-br from-[#4CAF50] to-[#388E3C] text-white border-0 py-2 px-5 rounded-[25px] font-semibold text-sm cursor-pointer transition-all duration-300 shadow-[0_4px_12px_rgba(76,175,80,0.3)] hover:-translate-y-[2px] hover:shadow-[0_6px_16px_rgba(76,175,80,0.4)] max-lg:py-1.5 max-lg:px-5 max-lg:text-[0.85rem]">
                        <span class="text-sm font-semibold">{{ Auth::user()->name }}</span>
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                clip-rule="evenodd" />
                        </svg>
                    </button>
                    <div
                        class="user-dropdown-menu hidden absolute right-0 mt-2 py-2 w-48 bg-white rounded-lg shadow-xl z-50 border border-gray-200">
                        {{-- <a href="{{ route('profile') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Profile</a> --}}
                        {{-- <a href="{{ route('dashboard') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Dashboard</a> --}}
                        {{-- <div class="border-t my-1"></div> --}}
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit"
                                class="block w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-gray-100">Logout</button>
                        </form>
                        <p>{{ Auth::user()->name }}</p>
                    </div>
                </div>
            @else
                <!-- Jika user belum login -->
                <span class="text-[#ccc] mx-2 font-light max-lg:hidden">|</span>
                <a href="{{ route('google.login') }}"
                    class="bg-gradient-to-br from-[#D32F2F] to-[#B71C1C] text-white border-0 py-2 px-6 rounded-[25px] font-semibold text-[0.9rem] cursor-pointer transition-all duration-300 no-underline inline-block text-center shadow-[0_4px_12px_rgba(211,47,47,0.3)] hover:-translate-y-[2px] hover:shadow-[0_6px_16px_rgba(211,47,47,0.4)] hover:from-[#E53935] hover:to-[#C62828] max-lg:py-1.5 max-lg:px-5 max-lg:text-[0.85rem]">Login
                    with Google</a>
            @endauth
        </div>

        <!-- Mobile Menu Button -->
        <button
            class="md:hidden bg-transparent border-none cursor-pointer text-[#333] transition-all duration-300 z-50 relative p-2 rounded-lg hover:bg-gray-100 hover:bg-[#D32F2F]/10 max-[375px]:p-1.5"
            id="mobile-menu-toggle">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16">
                </path>
            </svg>
        </button>
    </div>

    <!-- Mobile Navigation Menu (Hidden by default) -->
    <div class="hidden md:hidden absolute top-full left-0 right-0 bg-white rounded-b-[20px] shadow-[0_20px_40px_rgba(0,0,0,0.15)] overflow-hidden z-[9999] animate-[slideDown_0.3s_ease] mt-4 p-6 border-t border-black/5 origin-top max-md:mt-3 max-[375px]:p-3 max-[375px]:pb-6"
        id="mobile-nav-menu">
        <div class="flex flex-col space-y-3">
            <a href="{{ url('/') }}"
                class="block p-3 text-[#333] no-underline font-semibold text-base transition-all duration-300 rounded-lg mx-2 hover:bg-[#D32F2F]/10 hover:text-[#D32F2F] {{ request()->is('/') ? 'bg-[#D32F2F]/10 text-[#D32F2F]' : '' }} max-md:text-[0.95rem] max-md:p-2.5 max-[375px]:text-sm max-[375px]:p-2">Home</a>
            <a href="{{ url('/voting') }}"
                class="block p-3 text-[#333] no-underline font-semibold text-base transition-all duration-300 rounded-lg mx-2 hover:bg-[#D32F2F]/10 hover:text-[#D32F2F] {{ request()->is('voting') ? 'bg-[#D32F2F]/10 text-[#D32F2F]' : '' }} max-md:text-[0.95rem] max-md:p-2.5 max-[375px]:text-sm max-[375px]:p-2">Voting</a>
            <a href="{{ url('/kampus') }}"
                class="block p-3 text-[#333] no-underline font-semibold text-base transition-all duration-300 rounded-lg mx-2 hover:bg-[#D32F2F]/10 hover:text-[#D32F2F] {{ request()->is('kampus') ? 'bg-[#D32F2F]/10 text-[#D32F2F]' : '' }} max-md:text-[0.95rem] max-md:p-2.5 max-[375px]:text-sm max-[375px]:p-2">Kampus</a>
            <a href="{{ url('/kegiatan') }}"
                class="block p-3 text-[#333] no-underline font-semibold text-base transition-all duration-300 rounded-lg mx-2 hover:bg-[#D32F2F]/10 hover:text-[#D32F2F] {{ request()->is('kegiatan') ? 'bg-[#D32F2F]/10 text-[#D32F2F]' : '' }} max-md:text-[0.95rem] max-md:p-2.5 max-[375px]:text-sm max-[375px]:p-2">Kegiatan</a>
            <a href="{{ url('/toko') }}"
                class="block p-3 text-[#333] no-underline font-semibold text-base transition-all duration-300 rounded-lg mx-2 hover:bg-[#D32F2F]/10 hover:text-[#D32F2F] {{ request()->is('toko') ? 'bg-[#D32F2F]/10 text-[#D32F2F]' : '' }} max-md:text-[0.95rem] max-md:p-2.5 max-[375px]:text-sm max-[375px]:p-2">Toko</a>

            <div class="border-t my-2"></div>

            @auth
                <div class="px-4 py-2">
                    <span class="text-sm font-semibold">Hi, {{ Auth::user()->name }}</span>
                </div>
                {{-- <a href="{{ route('profile') }}" class="block p-3 text-[#333] no-underline font-semibold text-base transition-all duration-300 rounded-lg mx-2 hover:bg-[#D32F2F]/10 hover:text-[#D32F2F]">Profile</a> --}}
                {{-- <a href="{{ route('dashboard') }}" class="block p-3 text-[#333] no-underline font-semibold text-base transition-all duration-300 rounded-lg mx-2 hover:bg-[#D32F2F]/10 hover:text-[#D32F2F]">Dashboard</a> --}}
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"
                        class="w-full text-left block p-3 text-red-600 no-underline font-semibold text-base transition-all duration-300 rounded-lg mx-2 hover:bg-red-50">Logout</button>
                </form>
            @else
                <a href="{{ route('google.login') }}"
                    class="block bg-gradient-to-br from-[#D32F2F] to-[#B71C1C] text-white border-0 py-3 px-6 rounded-[25px] font-semibold text-base cursor-pointer transition-all duration-300 no-underline text-center mx-2 shadow-[0_4px_12px_rgba(211,47,47,0.3)] hover:-translate-y-[2px] hover:shadow-[0_6px_16px_rgba(211,47,47,0.4)] max-md:text-[0.95rem] max-md:py-2.5 max-md:mt-2 max-[375px]:text-sm max-[375px]:py-2">Login
                    with Google</a>
            @endauth
        </div>
    </div>
</nav>

<script>
    // Navbar JavaScript - Mobile Menu Toggle
    document.addEventListener('DOMContentLoaded', function() {
        const mobileMenuToggle = document.getElementById('mobile-menu-toggle');
        const mobileNavMenu = document.getElementById('mobile-nav-menu');
        const navbar = document.getElementById('main-navbar');
        const body = document.body;

        if (mobileMenuToggle && mobileNavMenu) {
            mobileMenuToggle.addEventListener('click', function(e) {
                e.stopPropagation();
                const isOpening = mobileNavMenu.classList.contains('hidden');

                mobileNavMenu.classList.toggle('hidden');

                // Toggle class pada body untuk mencegah scroll
                if (isOpening) {
                    body.classList.add('overflow-hidden');
                    // Tingkatkan z-index navbar saat menu terbuka
                    navbar.style.zIndex = '9999';
                } else {
                    body.classList.remove('overflow-hidden');
                    // Kembalikan z-index navbar saat menu tertutup
                    navbar.style.zIndex = '';
                }

                // Toggle icon antara menu dan close
                const icon = mobileMenuToggle.querySelector('svg');
                if (mobileNavMenu.classList.contains('hidden')) {
                    icon.innerHTML = `
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    `;
                } else {
                    icon.innerHTML = `
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    `;
                }
            });

            // Tutup menu mobile ketika klik di luar
            document.addEventListener('click', function(e) {
                if (!mobileNavMenu.contains(e.target) && !mobileMenuToggle.contains(e.target)) {
                    mobileNavMenu.classList.add('hidden');
                    body.classList.remove('overflow-hidden');
                    navbar.style.zIndex = '';

                    const icon = mobileMenuToggle.querySelector('svg');
                    icon.innerHTML = `
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    `;
                }
            });
        }

        // User dropdown functionality
        const userMenuBtn = document.querySelector('.user-menu-btn');
        const userDropdownMenu = document.querySelector('.user-dropdown-menu');

        if (userMenuBtn && userDropdownMenu) {
            userMenuBtn.addEventListener('click', function(e) {
                e.stopPropagation();
                userDropdownMenu.classList.toggle('hidden');
            });

            // Close dropdown when clicking outside
            document.addEventListener('click', function() {
                userDropdownMenu.classList.add('hidden');
            });

            userDropdownMenu.addEventListener('click', function(e) {
                e.stopPropagation();
            });
        }

        // Close mobile menu when clicking on a link
        const mobileLinks = document.querySelectorAll('#mobile-nav-menu a');
        mobileLinks.forEach(link => {
            link.addEventListener('click', function() {
                mobileNavMenu.classList.add('hidden');
                body.classList.remove('overflow-hidden');
                navbar.style.zIndex = '';

                const icon = mobileMenuToggle.querySelector('svg');
                icon.innerHTML = `
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                `;
            });
        });

        // Navbar scroll effect
        let lastScroll = 0;

        window.addEventListener('scroll', function() {
            const currentScroll = window.pageYOffset;

            if (currentScroll <= 0) {
                navbar.classList.add('shadow-[0_8px_32px_rgba(0,0,0,0.15)]');
            }

            // Hanya aktifkan efek scroll jika menu mobile tertutup
            if (!mobileNavMenu.classList.contains('hidden')) return;

            if (currentScroll > lastScroll && currentScroll > 100) {
                // Scrolling down
                navbar.classList.add('-translate-y-full', 'opacity-0');
            } else {
                // Scrolling up
                navbar.classList.remove('-translate-y-full', 'opacity-0');
            }

            lastScroll = currentScroll;
        });

        // Navbar hover effect enhancement (using JS for easier control if needed, but CSS hover is already added)
        // Kept empty to ensure no conflict, CSS handles hover now.
    });
</script>
