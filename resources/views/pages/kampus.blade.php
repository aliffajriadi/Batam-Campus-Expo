<x-layout.app :title="'Kampus - Batam Campus Expo'" :nohp="$nohp" :lokasi="$lokasi">
    <!-- HERO SECTION -->
    <section class="relative bg-gradient-to-br from-[#D32F2F] to-[#800000] py-20 overflow-hidden">
        <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')] opacity-10">
        </div>
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center">
            <h1 class="text-4xl md:text-6xl font-bold text-white mb-6 tracking-tight">
                Temukan Kampus Impianmu
            </h1>
            <p class="text-lg md:text-xl text-white/90 max-w-2xl mx-auto mb-10 leading-relaxed">
                Jelajahi berbagai pilihan universitas terbaik di Indonesia. Mulai masa depan gemilangmu dari sini
                bersama Batam Campus Expo.
            </p>

            <!-- Search & Filter Container -->
            <div
                class="max-w-4xl mx-auto bg-white p-4 rounded-2xl shadow-xl flex flex-col md:flex-row gap-4 items-center">
                <div class="relative flex-1 w-full">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                            fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                    <input type="text" id="search-kampus"
                        class="block w-full pl-10 pr-3 py-3 border-none rounded-xl bg-gray-50 text-gray-900 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-[#D32F2F]/50 transition-all font-medium"
                        placeholder="Cari nama kampus, kota, atau provinsi...">
                </div>

                <div
                    class="flex gap-2 w-full md:w-auto overflow-x-auto pb-2 md:pb-0 hide-scrollbar justify-center md:justify-end">
                    <button onclick="filterKampus('all')"
                        class="filter-btn active whitespace-nowrap px-5 py-2.5 rounded-xl font-semibold text-sm transition-all duration-200 bg-gray-100 text-gray-600 hover:bg-gray-200">
                        Semua
                    </button>
                    <button onclick="filterKampus('negeri')"
                        class="filter-btn whitespace-nowrap px-5 py-2.5 rounded-xl font-semibold text-sm transition-all duration-200 bg-gray-100 text-gray-600 hover:bg-gray-200">
                        Negeri
                    </button>
                    <button onclick="filterKampus('swasta')"
                        class="filter-btn whitespace-nowrap px-5 py-2.5 rounded-xl font-semibold text-sm transition-all duration-200 bg-gray-100 text-gray-600 hover:bg-gray-200">
                        Swasta
                    </button>
                </div>
            </div>
        </div>
    </section>

    <!-- CONTENT SECTION -->
    <section class="bg-gray-50 py-16 min-h-[60vh]">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Grid Kampus -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8" id="kampus-grid">
                @foreach ($kampuses as $kampus)
                    <div class="kampus-card group bg-white rounded-2xl shadow-sm hover:shadow-xl transition-all duration-300 overflow-hidden border border-gray-100 flex flex-col h-full"
                        data-status="{{ $kampus->status }}">

                        <!-- Card Header / Logo Area -->
                        <div class="h-32 bg-gray-100 relative flex items-center justify-center overflow-hidden">
                            <!-- Background Pattern/Shape -->
                            <div class="absolute inset-0 bg-gradient-to-tr from-gray-200/50 to-transparent"></div>

                            <!-- Logo Wrapper -->
                            <div
                                class="relative z-10 w-20 h-20 bg-white rounded-full shadow-md flex items-center justify-center p-2 group-hover:scale-110 transition-transform duration-300">
                                @if ($kampus->logo_campus && file_exists(public_path('storage/' . $kampus->logo_campus)))
                                    <img src="{{ asset('storage/' . $kampus->logo_campus) }}"
                                        alt="{{ $kampus->singkatan }}" class="w-full h-full object-cover rounded-full">
                                @else
                                    <span
                                        class="text-xl font-bold text-[#D32F2F] tracking-tighter">{{ substr($kampus->singkatan, 0, 3) }}</span>
                                @endif
                            </div>

                            <!-- Status Badge -->
                            <span
                                class="absolute top-4 right-4 px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider
                                {{ $kampus->status === 'negeri' ? 'bg-green-100 text-green-700' : 'bg-orange-100 text-orange-700' }}">
                                {{ $kampus->status }}
                            </span>
                        </div>

                        <!-- Card Body -->
                        <div class="p-6 flex-1 flex flex-col">
                            <div class="flex items-center justify-between mb-2">
                                <span
                                    class="text-xs font-semibold text-gray-500 uppercase tracking-wide">{{ $kampus->singkatan }}</span>
                                <div class="flex items-center gap-1">
                                    <span class="text-xs text-gray-400">Akreditasi</span>
                                    <span
                                        class="px-2 py-0.5 rounded text-xs font-bold bg-[#D32F2F] text-white">{{ $kampus->akreditasi }}</span>
                                </div>
                            </div>

                            <h3
                                class="text-xl font-bold text-gray-800 mb-3 group-hover:text-[#D32F2F] transition-colors line-clamp-2 min-h-[3.5rem]">
                                {{ $kampus->name_campus }}
                            </h3>

                            <div class="flex items-start gap-2 text-gray-600 mb-4 text-sm min-h-[2.5rem]">
                                <svg class="w-4 h-4 mt-0.5 text-[#D32F2F] flex-shrink-0" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                                <span>{{ $kampus->kota }}, {{ $kampus->provinsi }}</span>
                            </div>

                            <p class="text-gray-500 text-sm mb-6 line-clamp-3">
                                {{ $kampus->deskripsi }}
                            </p>

                            <!-- Spacer to push button to bottom -->
                            <div class="mt-auto pt-4 border-t border-gray-100">
                                <button onclick="showKampusDetail({{ $kampus->id }})"
                                    class="w-full bg-white border border-[#D32F2F] text-[#D32F2F] hover:bg-[#D32F2F] hover:text-white font-semibold py-2.5 px-4 rounded-xl transition-all duration-300 flex items-center justify-center gap-2 group-btn">
                                    <span>Lihat Detail</span>
                                    <svg class="w-4 h-4 transform group-btn-hover:translate-x-1 transition-transform"
                                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Empty State (Hidden by default) -->
            <div id="empty-state" class="hidden text-center py-20">
                <div class="w-24 h-24 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <h3 class="text-lg font-medium text-gray-900 mb-1">Tidak ada kampus yang ditemukan</h3>
                <p class="text-gray-500">Coba ubah kata kunci pencarian atau filter Anda.</p>
                <button onclick="resetFilters()" class="mt-4 text-[#D32F2F] font-semibold hover:underline">Reset
                    Filter</button>
            </div>

            <!-- Load More Button -->
            <div id="load-more-container" class="text-center mt-12 {{ $kampuses->hasMorePages() ? '' : 'hidden' }}">
                <button id="load-more-btn" onclick="loadMore()"
                    class="inline-flex items-center gap-2 bg-[#D32F2F] hover:bg-[#b71c1c] text-white font-semibold px-8 py-3 rounded-xl transition-all duration-300 shadow-lg hover:shadow-xl transform hover:scale-105">
                    <span>Jelajahi Lagi</span>
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                <div id="loading-spinner" class="hidden mt-4">
                    <div class="inline-block animate-spin rounded-full h-8 w-8 border-b-2 border-[#D32F2F]"></div>
                    <p class="text-gray-600 mt-2">Memuat data...</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Modal Detail Kampus -->
    <div id="kampus-modal" class="fixed inset-0 z-[9999] hidden" aria-labelledby="modal-title" role="dialog"
        aria-modal="true">
        <!-- Backdrop -->
        <div class="absolute inset-0 bg-gray-900/60 backdrop-blur-sm transition-opacity opacity-0"
            id="modal-backdrop">
        </div>

        <div class="fixed inset-0 z-10 overflow-y-auto">
            <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                <div class="relative transform overflow-hidden rounded-2xl bg-white text-left shadow-2xl transition-all sm:my-8 sm:w-full sm:max-w-3xl scale-95 opacity-0"
                    id="modal-panel">

                    <!-- Close button -->
                    <button onclick="closeKampusModal()"
                        class="absolute top-4 right-4 z-10 text-gray-400 hover:text-gray-500 bg-white/50 rounded-full p-1 hover:bg-white transition-colors">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>

                    <div id="modal-content">
                        <!-- Content will be injected via JS -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            // Store kampuses data globally
            let kampusesData = {};

            // Initialize with server data
            @foreach ($kampuses as $kampus)
                kampusesData[{{ $kampus->id }}] = @json($kampus);
            @endforeach

            // Element References
            const searchInput = document.getElementById('search-kampus');
            const grid = document.getElementById('kampus-grid');
            const emptyState = document.getElementById('empty-state');
            const loadMoreContainer = document.getElementById('load-more-container');
            const loadMoreBtn = document.getElementById('load-more-btn');
            const loadingSpinner = document.getElementById('loading-spinner');
            const modal = document.getElementById('kampus-modal');
            const modalBackdrop = document.getElementById('modal-backdrop');
            const modalPanel = document.getElementById('modal-panel');
            const body = document.body;

            // State
            let currentFilter = 'all';
            let currentSearch = '';
            let currentPage = 1;
            let nextPageUrl = '{{ $kampuses->nextPageUrl() }}';
            let isLoading = false;

            // Debounce function
            function debounce(func, wait) {
                let timeout;
                return function executedFunction(...args) {
                    const later = () => {
                        clearTimeout(timeout);
                        func(...args);
                    };
                    clearTimeout(timeout);
                    timeout = setTimeout(later, wait);
                };
            }

            // Fetch kampuses from server
            async function fetchKampuses(page = 1, append = false) {
                if (isLoading) return;
                isLoading = true;

                if (append) {
                    loadMoreBtn.classList.add('hidden');
                    loadingSpinner.classList.remove('hidden');
                } else {
                    grid.innerHTML =
                        '<div class="col-span-full text-center py-20"><div class="inline-block animate-spin rounded-full h-12 w-12 border-b-2 border-[#D32F2F]"></div><p class="text-gray-600 mt-4">Memuat data...</p></div>';
                }

                try {
                    const params = new URLSearchParams({
                        page: page,
                        search: currentSearch,
                        status: currentFilter
                    });

                    const response = await fetch(`/kampus?${params}`, {
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest'
                        }
                    });

                    const data = await response.json();

                    if (append) {
                        grid.insertAdjacentHTML('beforeend', data.html);
                    } else {
                        grid.innerHTML = data.html;
                    }

                    // Update kampusesData with new data
                    if (data.kampuses_data) {
                        data.kampuses_data.forEach(kampus => {
                            kampusesData[kampus.id] = kampus;
                        });
                    }

                    // Update next page URL
                    nextPageUrl = data.next_page_url;

                    // Show/hide load more button
                    if (nextPageUrl) {
                        loadMoreContainer.classList.remove('hidden');
                    } else {
                        loadMoreContainer.classList.add('hidden');
                    }

                    // Check if empty
                    const cards = grid.querySelectorAll('.kampus-card');
                    if (cards.length === 0) {
                        grid.classList.add('hidden');
                        emptyState.classList.remove('hidden');
                        loadMoreContainer.classList.add('hidden');
                    } else {
                        grid.classList.remove('hidden');
                        emptyState.classList.add('hidden');
                    }

                } catch (error) {
                    console.error('Error fetching kampuses:', error);
                    if (!append) {
                        grid.innerHTML =
                            '<div class="col-span-full text-center py-20 text-red-600">Terjadi kesalahan saat memuat data. Silakan refresh halaman.</div>';
                    }
                } finally {
                    isLoading = false;
                    if (append) {
                        loadMoreBtn.classList.remove('hidden');
                        loadingSpinner.classList.add('hidden');
                    }
                }
            }

            // Load more function
            window.loadMore = function() {
                if (nextPageUrl) {
                    const url = new URL(nextPageUrl);
                    const page = url.searchParams.get('page');
                    fetchKampuses(parseInt(page), true);
                }
            };

            // Search handler
            const handleSearch = debounce((value) => {
                currentSearch = value.toLowerCase().trim();
                currentPage = 1;
                fetchKampuses(1, false);
            }, 500);

            searchInput.addEventListener('input', (e) => {
                handleSearch(e.target.value);
            });

            // Filter handler
            window.filterKampus = function(status) {
                currentFilter = status;
                currentPage = 1;

                // Update UI buttons
                document.querySelectorAll('.filter-btn').forEach(btn => {
                    btn.classList.remove('active', 'bg-[#D32F2F]', 'text-white');
                    btn.classList.add('bg-gray-100', 'text-gray-600');
                });

                // Find specific button clicked
                const clickedBtn = Array.from(document.querySelectorAll('.filter-btn')).find(b =>
                    b.textContent.trim().toLowerCase().includes(status === 'all' ? 'semua' : status)
                );
                if (clickedBtn) {
                    clickedBtn.classList.remove('bg-gray-100', 'text-gray-600');
                    clickedBtn.classList.add('active', 'bg-[#D32F2F]', 'text-white');
                }

                fetchKampuses(1, false);
            };

            // Reset filters
            window.resetFilters = function() {
                searchInput.value = '';
                currentSearch = '';
                currentFilter = 'all';
                currentPage = 1;

                // Reset button states
                document.querySelectorAll('.filter-btn').forEach(btn => {
                    btn.classList.remove('active', 'bg-[#D32F2F]', 'text-white');
                    btn.classList.add('bg-gray-100', 'text-gray-600');
                });
                const semuaBtn = document.querySelector('.filter-btn');
                if (semuaBtn) {
                    semuaBtn.classList.add('active', 'bg-[#D32F2F]', 'text-white');
                    semuaBtn.classList.remove('bg-gray-100', 'text-gray-600');
                }

                fetchKampuses(1, false);
            };

            // Modal Logic
            window.showKampusDetail = function(id) {
                const kampus = kampusesData[id];
                if (!kampus) {
                    console.error('Kampus not found:', id);
                    return;
                }

                const content = `
                <div class="h-32 sm:h-48 bg-gradient-to-r from-[#D32F2F] to-[#800000] relative">
                    <div class="absolute -bottom-12 left-6 sm:left-10 text-white flex items-end">
                        <div class="w-24 h-24 sm:w-32 sm:h-32 bg-white rounded-xl shadow-lg p-2 flex items-center justify-center">
                             ${kampus.logo_campus ? `<img src="/storage/${kampus.logo_campus}" class="w-full h-full object-cover rounded-full">` : `<span class="text-3xl font-bold text-[#D32F2F]">${kampus.singkatan.substring(0,3)}</span>`}
                        </div>
                    </div>
                </div>
                
                <div class="pt-16 pb-8 px-6 sm:px-10">
                    <div class="flex flex-col sm:flex-row justify-between items-start gap-4 mb-6">
                        <div>
                            <h2 class="text-2xl sm:text-3xl font-bold text-gray-900 mb-2">${kampus.name_campus}</h2>
                            <div class="flex items-center gap-3 text-gray-600 text-sm">
                                <span class="bg-gray-100 px-3 py-1 rounded-full">${kampus.singkatan}</span>
                                <span class="flex items-center gap-1">
                                    <svg class="w-4 h-4 text-[#D32F2F]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/></svg>
                                    ${kampus.kota}, ${kampus.provinsi}
                                </span>
                            </div>
                        </div>
                        <div class="flex gap-2">
                            ${kampus.website ? `<a href="${kampus.website}" target="_blank" class="flex items-center gap-2 bg-[#D32F2F] text-white px-5 py-2.5 rounded-lg hover:bg-[#b71c1c] transition-colors font-semibold text-sm">
                                                                                                        <span>Kunjungi Website</span>
                                                                                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                                                                                                    </a>` : ''}
                            <button onclick="voteForCampus(${kampus.id}, '${kampus.name_campus}')" class="flex items-center gap-2 bg-green-600 text-white px-5 py-2.5 rounded-lg hover:bg-green-700 transition-colors font-semibold text-sm">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M2 10.5a1.5 1.5 0 113 0v6a1.5 1.5 0 01-3 0v-6zM6 10.333v5.43a2 2 0 001.106 1.79l.05.025A4 4 0 008.943 18h5.416a2 2 0 001.962-1.608l1.2-6A2 2 0 0015.56 8H12V4a2 2 0 00-2-2 1 1 0 00-1 1v.667a4 4 0 01-.8 2.4L6.8 7.933a4 4 0 00-.8 2.4z"/>
                                </svg>
                                @auth
                                    <span>Vote Kampus Ini</span>
                                @endauth
                                @guest
                                    <span>Login untuk Voting</span>
                                @endguest
                            </button>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                        <div class="md:col-span-2 space-y-6">
                            <div>
                                <h3 class="text-lg font-bold text-gray-900 mb-3 border-l-4 border-[#D32F2F] pl-3">Tentang Kampus</h3>
                                <p class="text-gray-600 leading-relaxed text-justify">${kampus.deskripsi}</p>
                            </div>

                            <div>
                                <h3 class="text-lg font-bold text-gray-900 mb-3 border-l-4 border-[#D32F2F] pl-3">Fakultas</h3>
                                <div class="flex flex-wrap gap-2">
                                    ${kampus.fakultas ? kampus.fakultas.map(f => `
                                                                                                                <span class="px-3 py-1.5 bg-red-50 text-red-700 rounded-lg text-sm font-medium border border-red-100 hover:bg-red-100 transition-colors cursor-default">
                                                                                                                    ${f}
                                                                                                                </span>
                                                                                                            `).join('') : '<span class="text-gray-500 italic">Data fakultas belum tersedia</span>'}
                                </div>
                            </div>
                        </div>
                        
                        <div class="md:col-span-1 space-y-4">
                            <div class="bg-gray-50 p-5 rounded-2xl border border-gray-100">
                                <h4 class="font-bold text-gray-900 mb-4 text-sm uppercase tracking-wider">Informasi Singkat</h4>
                                <div class="space-y-4">
                                    <div>
                                        <p class="text-xs text-gray-500 mb-1">Status Perguruan Tinggi</p>
                                        <p class="font-semibold text-gray-900 capitalize">${kampus.status}</p>
                                    </div>
                                    <div>
                                        <p class="text-xs text-gray-500 mb-1">Akreditasi</p>
                                        <div class="inline-block px-3 py-1 bg-green-100 text-green-700 rounded font-bold text-sm">
                                            ${kampus.akreditasi}
                                        </div>
                                    </div>
                                    <div>
                                        <p class="text-xs text-gray-500 mb-1">Tahun Berdiri</p>
                                        <p class="font-semibold text-gray-900">${kampus.tahun_berdiri}</p>
                                    </div>
                                    <div>
                                        <p class="text-xs text-gray-500 mb-1">Total Mahasiswa</p>
                                        <p class="font-semibold text-gray-900">${kampus.jumlah_mahasiswa ? kampus.jumlah_mahasiswa.toLocaleString('id-ID') : '-'}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            `;

                document.getElementById('modal-content').innerHTML = content;

                modal.classList.remove('hidden');
                requestAnimationFrame(() => {
                    modalBackdrop.classList.remove('opacity-0');
                    modalPanel.classList.remove('opacity-0', 'scale-95');
                    modalPanel.classList.add('opacity-100', 'scale-100');
                });
                body.style.overflow = 'hidden';
            };

            window.closeKampusModal = function() {
                modalBackdrop.classList.add('opacity-0');
                modalPanel.classList.remove('opacity-100', 'scale-100');
                modalPanel.classList.add('opacity-0', 'scale-95');

                setTimeout(() => {
                    modal.classList.add('hidden');
                    body.style.overflow = '';
                }, 300);
            };

            // Close on backdrop click
            modal.addEventListener('click', (e) => {
                if (e.target === modal || e.target.closest('#modal-backdrop')) {
                    closeKampusModal();
                }
            });

            // Close on Escape
            document.addEventListener('keydown', (e) => {
                if (e.key === 'Escape' && !modal.classList.contains('hidden')) {
                    closeKampusModal();
                }
            });

            // Initial state for "Semua" button
            document.addEventListener('DOMContentLoaded', function() {
                const semuaBtn = document.querySelector('.filter-btn');
                if (semuaBtn) {
                    semuaBtn.classList.add('active', 'bg-[#D32F2F]', 'text-white');
                    semuaBtn.classList.remove('bg-gray-100', 'text-gray-600');
                }
            });

            // Vote function
            // Vote function
            window.voteForCampus = async function(campusId, campusName) {
                console.log('Voting for:', campusName, 'ID:', campusId);
                @guest
                window.location.href = '{{ route('google.login') }}';
                return;
            @endguest

            try {
                const response = await fetch('{{ route('kampus.vote') }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify({
                        campus_id: campusId
                    })
                });

                if (response.status === 419) {
                    alert('Sesi kadaluarsa. Silakan refresh halaman.');
                    return;
                }

                const data = await response.json();

                if (data.success) {
                    alert('✅ ' + data.message + '\n\nTotal vote untuk ' + campusName + ' sekarang: ' + data.vote_count);
                    // Refresh voting page if open, or at least update the local state
                    if (confirm('Lihat hasil voting sekarang?')) {
                        window.location.href = '{{ route('voting') }}';
                    }
                } else {
                    alert('⚠️ ' + data.message);
                }
            } catch (error) {
                console.error('Error voting:', error);
                alert('Terjadi kesalahan saat melakukan voting.');
            }
            };
        </script>
    @endpush
    <style>
        .hide-scrollbar::-webkit-scrollbar {
            display: none;
        }

        .hide-scrollbar {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }
    </style>
</x-layout.app>
