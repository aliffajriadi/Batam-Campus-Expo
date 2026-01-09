<x-layout.app title="Komunitas" nohp="Komunitas" lokasi="Komunitas">
    <!-- BACKGROUND -->
    <div class="absolute inset-0 -z-10">
        <div class="w-full h-full bg-gradient-to-br from-[#A61E22] via-[#8a1a1e] to-[#6b1419]"></div>
    </div>

    <!-- CONTENT -->
    <div class="relative z-10 pt-8 pb-12 px-4 md:px-8 max-w-7xl mx-auto">
        <!-- Header -->
        <div class="mb-10 text-center animate-fade-in">
            <h1
                class="text-4xl md:text-5xl lg:text-6xl font-bold text-white mb-2 [text-shadow:_3px_3px_8px_rgba(0,0,0,0.4)]">
                Komunitas BCE 2026
            </h1>
            <p class="text-white/90 text-lg md:text-xl [text-shadow:_1px_1px_4px_rgba(0,0,0,0.3)]">
                Berbagi cerita, bertanya, dan berdiskusi bersama seluruh siswa
            </p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
            <!-- LEFT SIDEBAR: Navigation & Filters -->
            <div class="lg:col-span-3 space-y-6 animate-fade-in order-2 lg:order-1">
                <div
                    class="bg-white/95 backdrop-blur-xl rounded-3xl p-6 shadow-[0_15px_40px_rgba(0,0,0,0.3)] border border-white/20">
                    <h3 class="text-gray-900 font-bold mb-4 flex items-center gap-2">
                        <svg class="w-5 h-5 text-[#A61E22]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 4.5h18m-18 5h18m-18 5h18m-18 5h18" />
                        </svg>
                        Filter Postingan
                    </h3>
                    <div class="space-y-2">
                        <a href="{{ route('komunitas', ['sort' => 'latest']) }}"
                            class="flex items-center gap-3 p-3 rounded-2xl transition-all {{ $sort == 'latest' ? 'bg-[#A61E22] text-white shadow-lg' : 'text-gray-600 hover:bg-gray-100' }}">
                            <svg class="w-5 h-5 {{ $sort == 'latest' ? 'text-white' : 'text-[#A61E22]' }}"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <span class="font-bold text-sm">Terbaru</span>
                        </a>
                        <a href="{{ route('komunitas', ['sort' => 'popular']) }}"
                            class="flex items-center gap-3 p-3 rounded-2xl transition-all {{ $sort == 'popular' ? 'bg-[#A61E22] text-white shadow-lg' : 'text-gray-600 hover:bg-gray-100' }}">
                            <svg class="w-5 h-5 {{ $sort == 'popular' ? 'text-white' : 'text-[#A61E22]' }}"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                            </svg>
                            <span class="font-bold text-sm">Terpopuler</span>
                        </a>
                        <a href="{{ route('komunitas', ['sort' => 'comments']) }}"
                            class="flex items-center gap-3 p-3 rounded-2xl transition-all {{ $sort == 'comments' ? 'bg-[#A61E22] text-white shadow-lg' : 'text-gray-600 hover:bg-gray-100' }}">
                            <svg class="w-5 h-5 {{ $sort == 'comments' ? 'text-white' : 'text-[#A61E22]' }}"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z" />
                            </svg>
                            <span class="font-bold text-sm">Banyak Komentar</span>
                        </a>
                        @auth
                            <div class="pt-4 mt-4 border-t border-gray-100">
                                <a href="{{ route('komunitas', ['author' => 'me']) }}"
                                    class="flex items-center gap-3 p-3 rounded-2xl transition-all {{ $author == 'me' ? 'bg-[#A61E22] text-white shadow-lg' : 'text-gray-600 hover:bg-gray-100' }}">
                                    <svg class="w-5 h-5 {{ $author == 'me' ? 'text-white' : 'text-[#A61E22]' }}"
                                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                    </svg>
                                    <span class="font-bold text-sm">Postingan Saya</span>
                                </a>
                            </div>
                        @endauth
                    </div>
                </div>

                <div
                    class="bg-gradient-to-br from-white/10 to-white/5 backdrop-blur-md rounded-3xl p-6 border border-white/10 shadow-xl hidden lg:block">
                    <p class="text-white/80 text-xs leading-relaxed">
                        &copy; 2026 Batam Campus Expo.<br>Berbagi inspirasi, membangun mimpi bersama.
                    </p>
                </div>
            </div>

            <!-- MAIN FEED: Tengah -->
            <div class="lg:col-span-6 space-y-6 order-3 lg:order-2">
                <!-- Feed Container -->
                <div id="posts-container" class="space-y-6">
                    @include('pages.partials.post-card', ['posts' => $posts])
                </div>

                <!-- Sentinel & Spinner -->
                <div id="load-more-sentinel"
                    class="py-12 flex justify-center {{ $posts->hasMorePages() ? '' : 'hidden' }}">
                    <div class="flex flex-col items-center gap-3">
                        <div class="w-10 h-10 border-4 border-white/20 border-t-[#A61E22] rounded-full animate-spin">
                        </div>
                        <p class="text-white/60 text-sm font-medium">Memuat postingan lainnya...</p>
                    </div>
                </div>

                <!-- End of Feed Message -->
                <div id="no-more-posts" class="py-12 text-center {{ $posts->hasMorePages() ? 'hidden' : '' }}">
                    <p class="text-white/40 text-sm italic">Horee! Kamu sudah melihat semua postingan ✨</p>
                </div>
            </div>

            <!-- RIGHT SIDEBAR: Buat Postingan -->
            <div class="lg:col-span-3 space-y-6 animate-fade-in order-1 lg:order-3">
                @auth
                    <div
                        class="bg-white/95 backdrop-blur-xl rounded-3xl p-6 shadow-[0_20px_60px_rgba(0,0,0,0.4)] border border-white/20 sticky top-24">
                        <h3 class="text-gray-900 font-bold mb-4 flex items-center gap-2">
                            <svg class="w-5 h-5 text-[#A61E22]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                            </svg>
                            Buat Postingan
                        </h3>
                        <form action="{{ route('komunitas.post.store') }}" method="POST">
                            @csrf
                            <div class="space-y-4">
                                <textarea name="content" rows="6"
                                    class="w-full bg-gray-50 border-2 border-gray-200 rounded-2xl px-4 py-3 text-gray-800 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-[#A61E22]/30 focus:border-[#A61E22] transition-all resize-none text-sm"
                                    placeholder="Apa yang ingin kamu bagikan hari ini?" required></textarea>
                                <button type="submit"
                                    class="w-full py-3 bg-gradient-to-br from-[#A61E22] to-[#8a1a1e] text-white font-bold rounded-full shadow-[0_8px_20px_rgba(166,30,34,0.3)] hover:scale-[1.02] hover:shadow-[0_12px_28px_rgba(166,30,34,0.4)] active:scale-95 transition-all duration-300 flex items-center justify-center gap-2 text-sm">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8" />
                                    </svg>
                                    Kirim
                                </button>
                            </div>
                        </form>
                    </div>
                @else
                    <div
                        class="bg-white/90 backdrop-blur-xl rounded-3xl p-6 border-2 border-dashed border-white/40 shadow-[0_20px_60px_rgba(0,0,0,0.3)] sticky top-24 text-center">
                        <div
                            class="w-12 h-12 bg-gradient-to-br from-[#A61E22] to-[#8a1a1e] rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                            </svg>
                        </div>
                        <h4 class="text-sm font-bold text-gray-800 mb-2">Ingin berdiskusi?</h4>
                        <p class="text-xs text-gray-600 mb-4">Login terlebih dahulu untuk berinteraksi!</p>
                        <a href="{{ route('google.login') }}"
                            class="inline-flex items-center gap-2 px-4 py-2 bg-white text-gray-800 font-bold rounded-full hover:bg-gray-50 transition-all shadow-sm border border-gray-200 text-xs">
                            <svg class="w-4 h-4" viewBox="0 0 24 24" fill="currentColor">
                                <path
                                    d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" />
                                <path
                                    d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" />
                                <path
                                    d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z" />
                                <path
                                    d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" />
                            </svg>
                            Login
                        </a>
                    </div>
                @endauth

                <div class="bg-white/95 backdrop-blur-xl rounded-3xl p-6 shadow-xl border border-white/20">
                    <h4 class="text-gray-900 font-bold text-sm mb-3">Tentang Komunitas</h4>
                    <p class="text-gray-600 text-xs leading-relaxed">
                        Wadah komunikasi resmi untuk seluruh siswa Batam Campus Expo 2026. Gunakanlah bahasa yang sopan
                        dan saling menghargai.
                    </p>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            let page = 1;
            let loading = false;
            let hasMore = {{ $posts->hasMorePages() ? 'true' : 'false' }};
            const currentSort = '{{ $sort }}';
            const currentAuthor = '{{ $author }}';

            // Initialize Observer for Infinite Scroll
            const observer = new IntersectionObserver((entries) => {
                if (entries[0].isIntersecting && !loading && hasMore) {
                    loadMorePosts();
                }
            }, {
                rootMargin: '200px',
                threshold: 0.1
            });

            const sentinel = document.getElementById('load-more-sentinel');
            if (sentinel) observer.observe(sentinel);

            function loadMorePosts() {
                if (loading) return;
                loading = true;
                page++;

                fetch(`/komunitas?page=${page}&sort=${currentSort}&author=${currentAuthor}`, {
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest'
                        }
                    })
                    .then(response => response.text())
                    .then(html => {
                        if (html.trim() === "") {
                            hasMore = false;
                            document.getElementById('load-more-sentinel').classList.add('hidden');
                            document.getElementById('no-more-posts').classList.remove('hidden');
                        } else {
                            const container = document.getElementById('posts-container');
                            const tempDiv = document.createElement('div');
                            tempDiv.innerHTML = html;

                            while (tempDiv.firstChild) {
                                container.appendChild(tempDiv.firstChild);
                            }

                            loading = false;
                            if (html.split('animate-fade-in-up').length - 1 < 10) {
                                hasMore = false;
                                document.getElementById('load-more-sentinel').classList.add('hidden');
                                document.getElementById('no-more-posts').classList.remove('hidden');
                            }
                        }
                    })
                    .catch(error => {
                        console.error('Error loading posts:', error);
                        loading = false;
                    });
            }

            function toggleLike(postId) {
                @guest
                window.location.href = "{{ route('google.login') }}";
                return;
            @endguest

            fetch(`/komunitas/like/${postId}`, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Accept': 'application/json',
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                })
                .then(response => response.json())
                .then(data => {
                    const btn = document.getElementById(`like-btn-${postId}`);
                    const count = document.getElementById(`like-count-${postId}`);
                    if (!btn || !count) return;

                    const icon = btn.querySelector('svg');
                    const btnWrapper = btn.querySelector('div');

                    if (data.action === 'liked') {
                        btn.classList.add('text-[#A61E22]');
                        btn.classList.remove('text-gray-500');
                        btnWrapper.classList.add('bg-[#A61E22]/10');
                        btnWrapper.classList.remove('hover:bg-gray-100');
                        icon.classList.add('fill-current');
                    } else {
                        btn.classList.remove('text-[#A61E22]');
                        btn.classList.add('text-gray-500');
                        btnWrapper.classList.remove('bg-[#A61E22]/10');
                        btnWrapper.classList.add('hover:bg-gray-100');
                        icon.classList.remove('fill-current');
                    }
                    count.innerText = data.likes_count;
                })
                .catch(error => console.error('Error:', error));
            }
        </script>
    @endpush

    @push('styles')
        <style>
            @keyframes fade-in {
                from {
                    opacity: 0;
                    transform: translateY(-20px);
                }

                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }

            @keyframes slide-up {
                from {
                    opacity: 0;
                    transform: translateY(30px);
                }

                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }

            @keyframes fade-in-up {
                from {
                    opacity: 0;
                    transform: translateY(20px);
                }

                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }

            .animate-fade-in {
                animation: fade-in 0.6s ease-out;
            }

            .animate-slide-up {
                animation: slide-up 0.8s ease-out;
            }

            .animate-fade-in-up {
                animation: fade-in-up 0.5s ease-out;
            }

            /* Stagger animation for posts */
            .animate-fade-in-up:nth-child(1) {
                animation-delay: 0.1s;
            }

            .animate-fade-in-up:nth-child(2) {
                animation-delay: 0.2s;
            }

            .animate-fade-in-up:nth-child(3) {
                animation-delay: 0.3s;
            }

            .animate-fade-in-up:nth-child(4) {
                animation-delay: 0.4s;
            }

            .animate-fade-in-up:nth-child(5) {
                animation-delay: 0.5s;
            }
        </style>
    @endpush
</x-layout.app>
