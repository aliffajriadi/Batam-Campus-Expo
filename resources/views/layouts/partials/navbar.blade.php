<nav class="navbar" id="main-navbar">
    <div class="nav-container">
        <!-- Logo/Brand -->
        <div class="nav-logo">
            <a href="{{ url('/') }}" class="logo-link">
                <div class="logo-text">BATAM<br>CAMPUS EXPO</div>
            </a>
        </div>
        
        <!-- Desktop Navigation Links -->
        <div class="nav-main-links hidden md:flex">
            <a href="{{ url('/') }}" class="nav-link {{ request()->is('/') ? 'active' : '' }}">Home</a>
            <a href="{{ url('/voting') }}" class="nav-link {{ request()->is('voting') ? 'active' : '' }}">Voting</a>
            <a href="{{ url('/kampus') }}" class="nav-link {{ request()->is('kampus') ? 'active' : '' }}">Kampus</a>
            <a href="{{ url('/kegiatan') }}" class="nav-link {{ request()->is('kegiatan') ? 'active' : '' }}">Kegiatan</a>
            <a href="{{ url('/toko') }}" class="nav-link {{ request()->is('toko') ? 'active' : '' }}">Toko</a>
            
            {{-- 
            @auth
                <!-- Jika user sudah login -->
                <span class="nav-separator">|</span>
                <div class="relative user-dropdown">
                    <button class="user-menu-btn flex items-center gap-2">
                        <span class="text-sm font-semibold">{{ Auth::user()->name }}</span>
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"/>
                        </svg>
                    </button>
                    <div class="user-dropdown-menu hidden absolute right-0 mt-2 py-2 w-48 bg-white rounded-lg shadow-xl z-50">
                        <a href="{{ route('profile') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Profile</a>
                        <a href="{{ route('dashboard') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Dashboard</a>
                        <div class="border-t my-1"></div>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-gray-100">Logout</button>
                        </form>
                    </div>
                </div>
            @else
                <!-- Jika user belum login -->
                <span class="nav-separator">|</span>
                <a href="{{ route('login') }}" class="signin-button">Sign In</a>
            @endauth
            --}}
        </div> 
        
        <!-- Mobile Menu Button -->
        <button class="md:hidden mobile-menu-btn p-2 rounded-lg hover:bg-gray-100" id="mobile-menu-toggle">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
            </svg>
        </button>
    </div>
    
    <!-- Mobile Navigation Menu (Hidden by default) -->
    <div class="mobile-nav-links hidden md:hidden" id="mobile-nav-menu">
        <div class="flex flex-col space-y-3">
            <a href="{{ url('/') }}" class="nav-link {{ request()->is('/') ? 'active' : '' }}">Home</a>
            <a href="{{ url('/voting') }}" class="nav-link {{ request()->is('voting') ? 'active' : '' }}">Voting</a>
            <a href="{{ url('/kampus') }}" class="nav-link {{ request()->is('kampus') ? 'active' : '' }}">Kampus</a>
            <a href="{{ url('/kegiatan') }}" class="nav-link {{ request()->is('kegiatan') ? 'active' : '' }}">Kegiatan</a>
            <a href="{{ url('/toko') }}" class="nav-link {{ request()->is('toko') ? 'active' : '' }}">Toko</a>
            
            <div class="border-t my-2"></div>
            
            {{-- 
            @auth
                <div class="px-4 py-2">
                    <span class="text-sm font-semibold">Hi, {{ Auth::user()->name }}</span>
                </div>
                <a href="{{ route('profile') }}" class="mobile-nav-link">Profile</a>
                <a href="{{ route('dashboard') }}" class="mobile-nav-link">Dashboard</a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="w-full text-left mobile-nav-link text-red-600">Logout</button>
                </form>
            @else
                <a href="{{ route('login') }}" class="mobile-signin-button">Sign In</a>
            @endauth
            --}}
        </div>
    </div>
</nav>

<style>
    /* NAVBAR STYLES - RESPONSIVE */
    .navbar {
        background: rgba(255, 255, 255, 0.98);
        backdrop-filter: blur(10px);
        border-radius: 35px;
        padding: 0.75rem 2rem;
        margin: 1.5rem auto;
        max-width: 1200px;
        border: 2px solid rgba(0, 0, 0, 0.1);
        box-shadow: 0 8px 32px rgba(0, 0, 0, 0.15);
        transition: all 0.3s ease;
        position: relative;
        z-index: 40; /* Default z-index untuk desktop */
    }

    .nav-container {
        display: flex;
        justify-content: space-between;
        align-items: center;
        position: relative;
    }

    .nav-logo {
        display: flex;
        align-items: center;
        z-index: 45; /* Lebih tinggi dari navbar */
    }

    .logo-link {
        text-decoration: none;
        transition: transform 0.3s ease;
    }

    .logo-link:hover {
        transform: scale(1.05);
    }

    .logo-text {
        font-family: 'Sancreek', cursive;
        color: #D32F2F;
        font-size: 1.5rem;
        line-height: 0.9;
        text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.2);
    }

    /* Desktop Navigation */
    .nav-main-links {
        display: flex;
        gap: 1.5rem;
        align-items: center;
    }

    .nav-link {
        color: #333;
        text-decoration: none;
        font-weight: 600;
        font-size: 1rem;
        transition: all 0.3s ease;
        position: relative;
        padding: 0.5rem 0;
    }

    .nav-link:hover {
        color: #D32F2F;
        transform: translateY(-1px);
    }

    .nav-link.active {
        color: #D32F2F;
    }

    .nav-link.active::after {
        width: 100%;
    }

    .nav-link::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 0;
        height: 2px;
        background: #D32F2F;
        transition: width 0.3s ease;
    }

    .nav-link:hover::after {
        width: 100%;
    }

    /* Separator */
    .nav-separator {
        color: #ccc;
        margin: 0 0.5rem;
        font-weight: 300;
    }

    /* Sign In Button */
    .signin-button {
        background: linear-gradient(135deg, #D32F2F 0%, #B71C1C 100%);
        color: white;
        border: none;
        padding: 0.5rem 1.5rem;
        border-radius: 25px;
        font-weight: 600;
        font-size: 0.9rem;
        cursor: pointer;
        transition: all 0.3s ease;
        text-decoration: none;
        display: inline-block;
        text-align: center;
        box-shadow: 0 4px 12px rgba(211, 47, 47, 0.3);
    }

    .signin-button:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 16px rgba(211, 47, 47, 0.4);
        background: linear-gradient(135deg, #E53935 0%, #C62828 100%);
    }

    /* User Dropdown */
    .user-dropdown {
        position: relative;
    }

    .user-menu-btn {
        background: linear-gradient(135deg, #4CAF50 0%, #388E3C 100%);
        color: white;
        border: none;
        padding: 0.5rem 1.2rem;
        border-radius: 25px;
        font-weight: 600;
        font-size: 0.9rem;
        cursor: pointer;
        transition: all 0.3s ease;
        box-shadow: 0 4px 12px rgba(76, 175, 80, 0.3);
    }

    .user-menu-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 16px rgba(76, 175, 80, 0.4);
    }

    .user-dropdown-menu {
        background: white;
        border: 1px solid #e5e7eb;
        border-radius: 8px;
        min-width: 200px;
    }

    /* Mobile Menu Button */
    .mobile-menu-btn {
        background: transparent;
        border: none;
        cursor: pointer;
        color: #333;
        transition: all 0.3s ease;
        z-index: 50; /* Lebih tinggi dari navbar */
        position: relative;
    }

    .mobile-menu-btn:hover {
        background: rgba(211, 47, 47, 0.1);
    }

    /* Mobile Navigation */
    .mobile-nav-links {
        position: absolute;
        top: 100%;
        left: 0;
        right: 0;
        background: white;
        border-radius: 0 0 20px 20px;
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
        overflow: hidden;
        z-index: 9999; /* Sangat tinggi untuk overlay di atas konten lain */
        animation: slideDown 0.3s ease;
        margin-top: 1rem;
        padding: 1.5rem 1rem 2rem 1rem;
        border-top: 1px solid rgba(0, 0, 0, 0.05);
        transform-origin: top;
    }

    @keyframes slideDown {
        from {
            opacity: 0;
            transform: translateY(-10px) scaleY(0.95);
        }
        to {
            opacity: 1;
            transform: translateY(0) scaleY(1);
        }
    }

    .mobile-nav-link {
        display: block;
        padding: 0.75rem 1.5rem;
        color: #333;
        text-decoration: none;
        font-weight: 600;
        font-size: 1rem;
        transition: all 0.3s ease;
        border-radius: 8px;
        margin: 0 0.5rem;
    }

    .mobile-nav-link:hover,
    .mobile-nav-link.active {
        background: rgba(211, 47, 47, 0.1);
        color: #D32F2F;
    }

    .mobile-signin-button {
        display: block;
        background: linear-gradient(135deg, #D32F2F 0%, #B71C1C 100%);
        color: white;
        border: none;
        padding: 0.75rem 1.5rem;
        border-radius: 25px;
        font-weight: 600;
        font-size: 1rem;
        cursor: pointer;
        transition: all 0.3s ease;
        text-decoration: none;
        text-align: center;
        margin: 0 0.5rem;
        box-shadow: 0 4px 12px rgba(211, 47, 47, 0.3);
    }

    .mobile-signin-button:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 16px rgba(211, 47, 47, 0.4);
    }

    /* RESPONSIVE BREAKPOINTS */
    
    /* Tablet (768px - 1023px) - Tingkatkan z-index */
    @media (max-width: 1023px) {
        .navbar {
            padding: 0.75rem 1.5rem;
            margin: 1.5rem 1rem;
            border-radius: 25px;
            position: sticky;
            top: 0;
            z-index: 100; /* Tingkatkan z-index untuk tablet */
        }
        
        .logo-text {
            font-size: 1.3rem;
        }
        
        .nav-main-links {
            gap: 1rem;
        }
        
        .nav-link {
            font-size: 0.9rem;
        }
        
        .signin-button,
        .user-menu-btn {
            padding: 0.4rem 1.2rem;
            font-size: 0.85rem;
        }
    }
    
    /* Mobile (max-width: 767px) - Tingkatkan z-index lebih tinggi */
    @media (max-width: 767px) {
        .navbar {
            padding: 0.75rem 1rem;
            margin: 1rem 0.75rem;
            border-radius: 20px;
            position: sticky;
            top: 0;
            z-index: 1000; /* Z-index sangat tinggi untuk mobile */
        }
        
        .logo-text {
            font-size: 1.2rem;
        }
        
        .nav-main-links {
            display: none; /* Hide desktop menu on mobile */
        }
        
        .nav-separator {
            display: none;
        }
        
        .mobile-nav-links {
            z-index: 9999; /* Z-index ekstra tinggi untuk dropdown mobile */
            margin-top: 0.75rem;
        }
        
        .mobile-nav-link {
            font-size: 0.95rem;
            padding: 0.6rem 1.25rem;
        }
        
        .mobile-signin-button {
            padding: 0.6rem 1.25rem;
            font-size: 0.95rem;
            margin-top: 0.5rem;
        }
        
        /* Body style untuk mencegah scroll ketika menu terbuka */
        body.menu-open {
            overflow: hidden;
        }
    }
    
    /* Small Mobile (max-width: 375px) */
    @media (max-width: 375px) {
        .navbar {
            padding: 0.5rem 0.75rem;
            margin: 0.75rem 0.5rem;
            z-index: 1000; /* Tetap tinggi untuk small mobile */
        }
        
        .logo-text {
            font-size: 1.1rem;
        }
        
        .mobile-menu-btn {
            padding: 0.4rem;
        }
        
        .mobile-nav-links {
            padding: 1rem 0.75rem 1.5rem 0.75rem;
        }
        
        .mobile-nav-link,
        .mobile-signin-button {
            font-size: 0.9rem;
            padding: 0.5rem 1rem;
        }
    }
</style>

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
                    body.classList.add('menu-open');
                    // Tingkatkan z-index navbar saat menu terbuka
                    navbar.style.zIndex = '9999';
                } else {
                    body.classList.remove('menu-open');
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
                    body.classList.remove('menu-open');
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
        const mobileLinks = document.querySelectorAll('.mobile-nav-link, .mobile-signin-button');
        mobileLinks.forEach(link => {
            link.addEventListener('click', function() {
                mobileNavMenu.classList.add('hidden');
                body.classList.remove('menu-open');
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
                navbar.style.boxShadow = '0 8px 32px rgba(0, 0, 0, 0.15)';
            }
            
            // Hanya aktifkan efek scroll jika menu mobile tertutup
            if (!mobileNavMenu.classList.contains('hidden')) return;
            
            if (currentScroll > lastScroll && currentScroll > 100) {
                // Scrolling down
                navbar.style.transform = 'translateY(-100%)';
                navbar.style.opacity = '0';
            } else {
                // Scrolling up
                navbar.style.transform = 'translateY(0)';
                navbar.style.opacity = '1';
            }
            
            lastScroll = currentScroll;
        });
        
        // Navbar hover effect enhancement
        const navLinks = document.querySelectorAll('.nav-link');
        navLinks.forEach(link => {
            link.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-2px)';
            });
            
            link.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0)';
            });
        });
        
        // Handle window resize
        window.addEventListener('resize', function() {
            // Tutup menu mobile jika beralih ke desktop
            if (window.innerWidth >= 768) {
                mobileNavMenu.classList.add('hidden');
                body.classList.remove('menu-open');
                navbar.style.zIndex = '';
                
                const icon = mobileMenuToggle.querySelector('svg');
                icon.innerHTML = `
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                `;
            }
        });
    });
</script>