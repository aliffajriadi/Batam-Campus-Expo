<x-layout.app :title="'Kampus - Batam Campus Expo'" :nohp="$nohp" :lokasi="$lokasi">
    <!-- HERO SECTION -->
    <section class="hero-section min-h-[60vh] relative overflow-hidden">
        <!-- Background utama -->
        <div class="absolute inset-0 bg-gradient-to-br from-[#D32F2F] via-[#B71C1C] to-[#A61E22] z-0"></div>
        
        <!-- Decorative Elements -->
        <img src="{{ asset('images/balloon.svg') }}" class="absolute left-8 top-20 w-16 opacity-70 animate-bounce" alt="balloon">
        <img src="{{ asset('images/balloon.svg') }}" class="absolute right-12 top-32 w-12 opacity-60 animate-bounce" style="animation-delay: 0.5s;" alt="balloon">
        <img src="{{ asset('images/balloon.svg') }}" class="absolute left-1/4 top-40 w-10 opacity-50 animate-bounce" style="animation-delay: 1s;" alt="balloon">
        <img src="{{ asset('images/balloon.svg') }}" class="absolute right-1/3 top-16 w-14 opacity-80 animate-bounce" style="animation-delay: 1.5s;" alt="balloon">
        
        <!-- KONTEN UTAMA -->
        <div class="relative z-10 w-full h-full flex items-center">
            <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-16 text-center">
                <!-- HEADLINE -->
                <div class="mb-8">
                    <h1 class="font-sancreek uppercase text-white leading-[0.85] text-5xl sm:text-6xl md:text-7xl lg:text-8xl mb-4 [text-shadow:_3px_3px_0_rgba(0,0,0,0.8),_6px_6px_0_rgba(0,0,0,0.6)]">
                        KAMPUS
                    </h1>
                    <h2 class="font-sancreek uppercase text-[#fbbf24] leading-[0.85] text-3xl sm:text-4xl md:text-5xl lg:text-6xl [text-shadow:_2px_2px_0_rgba(0,0,0,0.8)]">
                        TERBAIK INDONESIA
                    </h2>
                    <p class="text-white/90 text-lg sm:text-xl mt-6 max-w-3xl mx-auto">
                        Temukan kampus impianmu dari berbagai universitas terbaik di Indonesia
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- SEPARATOR -->
    <div class="relative w-full h-[60px] overflow-visible z-30 -mt-1">
        <div class="absolute inset-0 bg-gradient-to-b from-[#A61E22] to-[#f5f5f5] opacity-80"></div>
    </div>

    <!-- KAMPUS CARDS SECTION -->
    <section class="relative w-full py-16 bg-gradient-to-b from-[#f5f5f5] to-white overflow-hidden">
        <!-- Decorative Elements -->
        <img src="{{ asset('images/GajahKiri.svg') }}" class="absolute left-0 bottom-0 w-24 opacity-30" alt="elephant left">
        <img src="{{ asset('images/GajahKanan.svg') }}" class="absolute right-0 bottom-0 w-28 opacity-30" alt="elephant right">
        
        <div class="relative container mx-auto px-4 sm:px-6 lg:px-8 z-10">
            <!-- Section Title -->
            <div class="text-center mb-12">
                <h2 class="font-sancreek uppercase text-[#D32F2F] text-4xl sm:text-5xl md:text-6xl mb-4 [text-shadow:_2px_2px_0_rgba(0,0,0,0.3)]">
                    Daftar Kampus
                </h2>
                <p class="text-gray-700 text-lg max-w-2xl mx-auto">
                    Jelajahi berbagai pilihan universitas terbaik dari seluruh Indonesia
                </p>
            </div>

            <!-- Filter Section -->
            <div class="flex flex-col items-center gap-6 mb-12">
                <!-- Search Bar -->
                <div class="relative w-full max-w-md">
                    <input type="text" id="search-kampus" placeholder="Cari kampus..." 
                           class="w-full px-4 py-3 pl-12 rounded-full border-2 border-[#D32F2F]/20 focus:border-[#D32F2F] focus:ring-2 focus:ring-[#D32F2F]/20 outline-none transition-all duration-300 text-gray-700">
                    <svg class="absolute left-4 top-1/2 transform -translate-y-1/2 w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                </div>
                
                <!-- Filter Buttons -->
                <div class="flex flex-wrap justify-center gap-4">
                    <button onclick="filterKampus('all')" class="filter-btn active bg-[#D32F2F] text-white px-6 py-3 rounded-full font-semibold transition-all duration-300 hover:bg-[#B71C1C] hover:-translate-y-1 shadow-lg">
                        Semua Kampus
                    </button>
                    <button onclick="filterKampus('negeri')" class="filter-btn bg-white text-[#D32F2F] border-2 border-[#D32F2F] px-6 py-3 rounded-full font-semibold transition-all duration-300 hover:bg-[#D32F2F] hover:text-white hover:-translate-y-1 shadow-lg">
                        Negeri
                    </button>
                    <button onclick="filterKampus('swasta')" class="filter-btn bg-white text-[#D32F2F] border-2 border-[#D32F2F] px-6 py-3 rounded-full font-semibold transition-all duration-300 hover:bg-[#D32F2F] hover:text-white hover:-translate-y-1 shadow-lg">
                        Swasta
                    </button>
                </div>
            </div>

            <!-- Kampus Cards Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8" id="kampus-grid">
                @foreach($kampuses as $kampus)
                    <div class="kampus-card bg-white rounded-2xl shadow-xl overflow-hidden transition-all duration-300 hover:-translate-y-2 hover:shadow-2xl border-4 border-transparent hover:border-[#fbbf24] group" data-status="{{ $kampus->status }}">
                        <!-- Card Header -->
                        <div class="relative bg-gradient-to-br from-[#D32F2F] to-[#B71C1C] p-6 text-white">
                            <!-- Status Badge -->
                            <div class="absolute top-4 right-4">
                                <span class="px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wide
                                    {{ $kampus->status === 'negeri' ? 'bg-[#4CAF50] text-white' : 'bg-[#fbbf24] text-black' }}">
                                    {{ $kampus->status }}
                                </span>
                            </div>
                            
                            <!-- Logo Placeholder -->
                            <div class="w-16 h-16 bg-white/20 rounded-full flex items-center justify-center mb-4">
                                <span class="text-2xl font-bold">{{ substr($kampus->singkatan, 0, 2) }}</span>
                            </div>
                            
                            <!-- Kampus Name -->
                            <h3 class="font-bold text-xl mb-2 group-hover:text-[#fbbf24] transition-colors">
                                {{ $kampus->nama_kampus }}
                            </h3>
                            <p class="text-white/80 text-sm">{{ $kampus->singkatan }}</p>
                        </div>

                        <!-- Card Body -->
                        <div class="p-6">
                            <!-- Location -->
                            <div class="flex items-center gap-2 mb-4 text-gray-600">
                                <svg class="w-5 h-5 text-[#D32F2F]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                </svg>
                                <span class="text-sm font-medium">{{ $kampus->kota }}, {{ $kampus->provinsi }}</span>
                            </div>

                            <!-- Description -->
                            <p class="text-gray-700 text-sm leading-relaxed mb-4 line-clamp-3">
                                {{ $kampus->deskripsi }}
                            </p>

                            <!-- Stats -->
                            <div class="grid grid-cols-2 gap-4 mb-6">
                                <div class="text-center p-3 bg-gray-50 rounded-lg">
                                    <div class="text-[#D32F2F] font-bold text-lg">{{ $kampus->tahun_berdiri }}</div>
                                    <div class="text-gray-600 text-xs">Tahun Berdiri</div>
                                </div>
                                <div class="text-center p-3 bg-gray-50 rounded-lg">
                                    <div class="text-[#D32F2F] font-bold text-lg">{{ number_format($kampus->jumlah_mahasiswa) }}</div>
                                    <div class="text-gray-600 text-xs">Mahasiswa</div>
                                </div>
                            </div>

                            <!-- Akreditasi -->
                            <div class="flex items-center justify-between mb-4">
                                <span class="text-gray-600 text-sm">Akreditasi:</span>
                                <span class="px-3 py-1 rounded-full text-sm font-bold
                                    {{ $kampus->akreditasi === 'A' ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">
                                    {{ $kampus->akreditasi }}
                                </span>
                            </div>

                            <!-- Fakultas Preview -->
                            <div class="mb-6">
                                <h4 class="text-gray-800 font-semibold text-sm mb-2">Fakultas Unggulan:</h4>
                                <div class="flex flex-wrap gap-1">
                                    @foreach(array_slice($kampus->fakultas, 0, 3) as $fakultas)
                                        <span class="px-2 py-1 bg-[#D32F2F]/10 text-[#D32F2F] text-xs rounded-full">
                                            {{ $fakultas }}
                                        </span>
                                    @endforeach
                                    @if(count($kampus->fakultas) > 3)
                                        <span class="px-2 py-1 bg-gray-100 text-gray-600 text-xs rounded-full">
                                            +{{ count($kampus->fakultas) - 3 }} lainnya
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <!-- Action Buttons -->
                            <div class="flex gap-2">
                                <button onclick="showKampusDetail({{ $kampus->id }})" 
                                        class="flex-1 bg-gradient-to-r from-[#D32F2F] to-[#B71C1C] text-white py-3 px-4 rounded-lg font-semibold transition-all duration-300 hover:-translate-y-1 hover:shadow-lg text-sm">
                                    Detail
                                </button>
                                @if($kampus->website)
                                    <a href="{{ $kampus->website }}" target="_blank" 
                                       class="flex-1 bg-gradient-to-r from-[#fbbf24] to-[#f59e0b] text-black py-3 px-4 rounded-lg font-semibold transition-all duration-300 hover:-translate-y-1 hover:shadow-lg text-sm text-center">
                                        Website
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Load More Button -->
            <div class="text-center mt-12">
                <button class="bg-gradient-to-r from-[#D32F2F] to-[#B71C1C] text-white py-4 px-8 rounded-full font-bold text-lg transition-all duration-300 hover:-translate-y-2 hover:shadow-xl">
                    Muat Lebih Banyak
                </button>
            </div>
        </div>
    </section>

    <!-- Modal Detail Kampus -->
    <div id="kampus-modal" class="fixed inset-0 bg-black/50 backdrop-blur-sm z-[9999] hidden items-center justify-center p-4">
        <div class="bg-white rounded-2xl max-w-4xl w-full max-h-[90vh] overflow-y-auto">
            <div class="sticky top-0 bg-gradient-to-r from-[#D32F2F] to-[#B71C1C] text-white p-6 rounded-t-2xl">
                <div class="flex justify-between items-center">
                    <h3 class="text-2xl font-bold" id="modal-title">Detail Kampus</h3>
                    <button onclick="closeKampusModal()" class="text-white hover:text-[#fbbf24] transition-colors">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </div>
            </div>
            <div class="p-6" id="modal-content">
                <!-- Content will be loaded here -->
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        // Search functionality
        document.getElementById('search-kampus').addEventListener('input', function(e) {
            const searchTerm = e.target.value.toLowerCase();
            const cards = document.querySelectorAll('.kampus-card');
            
            cards.forEach(card => {
                const kampusName = card.querySelector('h3').textContent.toLowerCase();
                const kampusLocation = card.querySelector('.text-gray-600 span').textContent.toLowerCase();
                const kampusDesc = card.querySelector('.text-gray-700').textContent.toLowerCase();
                
                if (kampusName.includes(searchTerm) || 
                    kampusLocation.includes(searchTerm) || 
                    kampusDesc.includes(searchTerm)) {
                    card.style.display = 'block';
                    setTimeout(() => {
                        card.style.opacity = '1';
                        card.style.transform = 'translateY(0)';
                    }, 100);
                } else {
                    card.style.opacity = '0';
                    card.style.transform = 'translateY(20px)';
                    setTimeout(() => {
                        card.style.display = 'none';
                    }, 300);
                }
            });
        });

        // Filter functionality
        function filterKampus(status) {
            const cards = document.querySelectorAll('.kampus-card');
            const buttons = document.querySelectorAll('.filter-btn');
            const searchInput = document.getElementById('search-kampus');
            
            // Clear search when filtering
            searchInput.value = '';
            
            // Update button states
            buttons.forEach(btn => {
                btn.classList.remove('active', 'bg-[#D32F2F]', 'text-white');
                btn.classList.add('bg-white', 'text-[#D32F2F]', 'border-2', 'border-[#D32F2F]');
            });
            
            event.target.classList.add('active', 'bg-[#D32F2F]', 'text-white');
            event.target.classList.remove('bg-white', 'text-[#D32F2F]', 'border-2', 'border-[#D32F2F]');
            
            // Filter cards
            cards.forEach(card => {
                if (status === 'all' || card.dataset.status === status) {
                    card.style.display = 'block';
                    setTimeout(() => {
                        card.style.opacity = '1';
                        card.style.transform = 'translateY(0)';
                    }, 100);
                } else {
                    card.style.opacity = '0';
                    card.style.transform = 'translateY(20px)';
                    setTimeout(() => {
                        card.style.display = 'none';
                    }, 300);
                }
            });
        }

        // Modal functionality
        function showKampusDetail(kampusId) {
            const kampuses = @json($kampuses);
            const kampus = kampuses.find(k => k.id === kampusId);
            
            if (!kampus) return;
            
            document.getElementById('modal-title').textContent = kampus.nama_kampus;
            
            const modalContent = `
                <div class="space-y-6">
                    <!-- Header Info -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <h4 class="text-lg font-bold text-[#D32F2F] mb-3">Informasi Umum</h4>
                            <div class="space-y-2 text-sm">
                                <div><strong>Nama:</strong> ${kampus.nama_kampus}</div>
                                <div><strong>Singkatan:</strong> ${kampus.singkatan}</div>
                                <div><strong>Status:</strong> <span class="capitalize">${kampus.status}</span></div>
                                <div><strong>Akreditasi:</strong> ${kampus.akreditasi}</div>
                                <div><strong>Tahun Berdiri:</strong> ${kampus.tahun_berdiri}</div>
                                <div><strong>Jumlah Mahasiswa:</strong> ${kampus.jumlah_mahasiswa?.toLocaleString() || 'N/A'}</div>
                            </div>
                        </div>
                        <div>
                            <h4 class="text-lg font-bold text-[#D32F2F] mb-3">Lokasi</h4>
                            <div class="space-y-2 text-sm">
                                <div><strong>Kota:</strong> ${kampus.kota}</div>
                                <div><strong>Provinsi:</strong> ${kampus.provinsi}</div>
                                ${kampus.website ? `<div><strong>Website:</strong> <a href="${kampus.website}" target="_blank" class="text-blue-600 hover:underline">${kampus.website}</a></div>` : ''}
                            </div>
                        </div>
                    </div>
                    
                    <!-- Description -->
                    <div>
                        <h4 class="text-lg font-bold text-[#D32F2F] mb-3">Deskripsi</h4>
                        <p class="text-gray-700 leading-relaxed">${kampus.deskripsi}</p>
                    </div>
                    
                    <!-- Fakultas -->
                    <div>
                        <h4 class="text-lg font-bold text-[#D32F2F] mb-3">Fakultas (${kampus.fakultas?.length || 0})</h4>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-2">
                            ${kampus.fakultas?.map(fakultas => `
                                <div class="flex items-center gap-2 p-2 bg-gray-50 rounded-lg">
                                    <svg class="w-4 h-4 text-[#D32F2F]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4"/>
                                    </svg>
                                    <span class="text-sm">${fakultas}</span>
                                </div>
                            `).join('') || '<p class="text-gray-500">Tidak ada data fakultas</p>'}
                        </div>
                    </div>
                </div>
            `;
            
            document.getElementById('modal-content').innerHTML = modalContent;
            document.getElementById('kampus-modal').classList.remove('hidden');
            document.getElementById('kampus-modal').classList.add('flex');
            document.body.style.overflow = 'hidden';
        }

        function closeKampusModal() {
            document.getElementById('kampus-modal').classList.add('hidden');
            document.getElementById('kampus-modal').classList.remove('flex');
            document.body.style.overflow = 'auto';
        }

        // Close modal on outside click
        document.getElementById('kampus-modal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeKampusModal();
            }
        });

        // Close modal on escape key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                closeKampusModal();
            }
        });

        // Animation on scroll
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                }
            });
        }, observerOptions);

        // Observe all kampus cards
        document.querySelectorAll('.kampus-card').forEach(card => {
            card.style.opacity = '0';
            card.style.transform = 'translateY(30px)';
            card.style.transition = 'all 0.6s ease';
            observer.observe(card);
        });
    </script>
    @endpush

    <style>
        .line-clamp-3 {
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
        
        .filter-btn.active {
            background: linear-gradient(135deg, #D32F2F, #B71C1C) !important;
            color: white !important;
            border: none !important;
        }

        /* Additional circus-themed animations */
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
        }

        .kampus-card:nth-child(odd) {
            animation: float 6s ease-in-out infinite;
        }

        .kampus-card:nth-child(even) {
            animation: float 6s ease-in-out infinite;
            animation-delay: 3s;
        }

        /* Hover effects for circus theme */
        .kampus-card:hover {
            transform: translateY(-8px) scale(1.02);
            box-shadow: 0 20px 40px rgba(211, 47, 47, 0.2);
        }

        /* Modal animations */
        #kampus-modal.flex {
            animation: modalFadeIn 0.3s ease-out;
        }

        @keyframes modalFadeIn {
            from {
                opacity: 0;
                transform: scale(0.9);
            }
            to {
                opacity: 1;
                transform: scale(1);
            }
        }
    </style>
</x-layout.app>