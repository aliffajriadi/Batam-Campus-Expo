@php
    // Define variables yang diperlukan
    $nohp = $nohp ?? '+62 812-3456-7890';
    $lokasi = $lokasi ?? 'Pollux Mall Batam Centre';
@endphp

<x-layout.app :title="'Voting Kampus - Batam Campus Expo'" :nohp="$nohp" :lokasi="$lokasi">
    <!-- HERO SECTION VOTING -->
    <section class="relative min-h-screen overflow-hidden" style="background: linear-gradient(135deg, #DC2626 0%, #B91C1C 50%, #991B1B 100%);">
        <!-- Background Pattern -->
        <div class="absolute inset-0 opacity-10">
            <div class="absolute inset-0" style="background-image: url('{{ asset('images/pattern.svg') }}'); background-size: 200px; background-repeat: repeat;"></div>
        </div>
        
        <!-- Floating Elements -->
        <img src="{{ asset('images/balloon.svg') }}" class="absolute left-10 top-20 w-16 opacity-60 animate-bounce" alt="decoration">
        <img src="{{ asset('images/balloon.svg') }}" class="absolute right-16 top-32 w-12 opacity-50 animate-bounce" style="animation-delay: 0.5s;" alt="decoration">
        <img src="{{ asset('images/balloon.svg') }}" class="absolute left-20 bottom-32 w-14 opacity-70 animate-bounce" style="animation-delay: 1s;" alt="decoration">
        
        <div class="relative container mx-auto px-4 sm:px-6 lg:px-8 py-16 lg:py-20">
            <!-- Header -->
            <div class="text-center mb-12">
                <h1 class="font-sancreek uppercase text-white text-5xl sm:text-6xl md:text-7xl lg:text-8xl mb-4 [text-shadow:_4px_4px_0_rgba(0,0,0,0.5),_8px_8px_0_rgba(0,0,0,0.3)]">
                    VOTING KAMPUS
                </h1>
                <p class="text-white/90 text-lg sm:text-xl md:text-2xl max-w-3xl mx-auto leading-relaxed">
                    Pilih kampus favorit Anda dan bantu calon mahasiswa menemukan pilihan terbaik!
                </p>
            </div>

            <!-- Voting Cards Container -->
            <div class="relative" id="voting-container">
                @auth
                    <!-- User sudah login - tampilkan voting normal -->
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 sm:gap-8">
                        @php
                            $campuses = [
                                [
                                    'name' => 'Universitas Batam',
                                    'description' => 'Universitas swasta terkemuka di Batam dengan program studi teknik dan bisnis.',
                                    'votes' => 1250,
                                    'image' => 'campus1.jpg',
                                    'id' => 1
                                ],
                                [
                                    'name' => 'Politeknik Negeri Batam',
                                    'description' => 'Institusi vokasi negeri dengan fokus pada teknologi dan industri.',
                                    'votes' => 980,
                                    'image' => 'campus2.jpg',
                                    'id' => 2
                                ],
                                [
                                    'name' => 'Universitas Internasional Batam',
                                    'description' => 'Universitas dengan standar internasional dan program kolaborasi global.',
                                    'votes' => 756,
                                    'image' => 'campus3.jpg',
                                    'id' => 3
                                ],
                                [
                                    'name' => 'STMIK Primakara',
                                    'description' => 'Perguruan tinggi komputer dan teknologi informasi terkemuka.',
                                    'votes' => 623,
                                    'image' => 'campus4.jpg',
                                    'id' => 4
                                ],
                                [
                                    'name' => 'Institut Teknologi Batam',
                                    'description' => 'Fokus pada pendidikan teknik dan sains terapan.',
                                    'votes' => 512,
                                    'image' => 'campus5.jpg',
                                    'id' => 5
                                ],
                                [
                                    'name' => 'Universitas Kepulauan Riau',
                                    'description' => 'Universitas negeri dengan berbagai program studi unggulan.',
                                    'votes' => 445,
                                    'image' => 'campus6.jpg',
                                    'id' => 6
                                ]
                            ];
                        @endphp

                        @foreach ($campuses as $campus)
                            <div class="bg-white rounded-2xl shadow-2xl overflow-hidden transform transition-all duration-300 hover:scale-105 hover:shadow-3xl voting-card">
                                <!-- Campus Image -->
                                <div class="relative h-48 bg-gradient-to-br from-red-100 to-red-200">
                                    <img src="{{ asset('images/' . $campus['image']) }}" 
                                         class="w-full h-full object-cover" 
                                         alt="{{ $campus['name'] }}"
                                         onerror="this.style.display='none'; this.parentElement.innerHTML='<div class=\\'flex items-center justify-center h-full\\'><svg class=\\'w-16 h-16 text-red-400\\' fill=\\'currentColor\\' viewBox=\\'0 0 20 20\\'><path d=\\'M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01.356-.257l4-1.714a1 1 0 11.788 1.838L7.667 9.088l1.94.831a1 1 0 00.787 0l7-3a1 1 0 000-1.838l-7-3zM3.31 9.397L5 10.12v4.102a8.969 8.969 0 00-1.05-.174 1 1 0 01-.89-.89 11.115 11.115 0 01.25-3.762zM9.3 16.573A9.026 9.026 0 007 14.935v-3.957l1.818.78a3 3 0 002.364 0l5.508-2.361a11.026 11.026 0 01.25 3.762 1 1 0 01-.89.89 8.968 8.968 0 00-5.35 2.524 1 1 0 01-1.4 0zM6 18a1 1 0 001-1v-2.065a8.935 8.935 0 00-2-.712V17a1 1 0 001 1z\\'/></svg></div>';">
                                    
                                    <!-- Vote Count Badge -->
                                    <div class="absolute top-4 right-4 bg-red-600 text-white px-3 py-1 rounded-full text-sm font-bold shadow-lg">
                                        {{ number_format($campus['votes']) }} Votes
                                    </div>
                                </div>
                                
                                <!-- Campus Info -->
                                <div class="p-6">
                                    <h3 class="font-bold text-xl text-gray-800 mb-2">{{ $campus['name'] }}</h3>
                                    <p class="text-gray-600 text-sm mb-4 line-clamp-2">{{ $campus['description'] }}</p>
                                    
                                    <!-- Vote Button -->
                                    <button onclick="voteForCampus({{ $campus['id'] }}, '{{ $campus['name'] }}')" 
                                            class="w-full bg-gradient-to-r from-red-600 to-red-700 hover:from-red-700 hover:to-red-800 text-white font-bold py-3 px-4 rounded-lg transition-all duration-300 transform hover:scale-105 shadow-lg">
                                        <svg class="w-5 h-5 inline mr-2" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M2 10.5a1.5 1.5 0 113 0v6a1.5 1.5 0 01-3 0v-6zM6 10.333v5.43a2 2 0 001.106 1.79l.05.025A4 4 0 008.943 18h5.416a2 2 0 001.962-1.608l1.2-6A2 2 0 0015.56 8H12V4a2 2 0 00-2-2 1 1 0 00-1 1v.667a4 4 0 01-.8 2.4L6.8 7.933a4 4 0 00-.8 2.4z"/>
                                        </svg>
                                        Vote Sekarang
                                    </button>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <!-- User belum login - tampilkan blur content dengan alert -->
                    <div class="backdrop-blur-md bg-white/10 rounded-3xl p-8 text-center">
                        <!-- Alert Icon -->
                        <div class="mb-6">
                            <div class="w-20 h-20 bg-red-100 rounded-full flex items-center justify-center mx-auto">
                                <svg class="w-10 h-10 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m0 0h.01M12 9h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            </div>
                        </div>
                        
                        <!-- Alert Message -->
                        <div class="bg-white/20 backdrop-blur-sm rounded-2xl p-6 mb-6 border border-white/30">
                            <h2 class="text-2xl font-bold text-white mb-3">Login Required!</h2>
                            <p class="text-white/90 text-lg mb-4">
                                Anda harus login terlebih dahulu untuk dapat memberikan voting pada kampus favorit Anda.
                            </p>
                            <div class="flex items-center justify-center space-x-2 text-white/80">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
                                </svg>
                                <span>Voting akan membantu calon mahasiswa membuat keputusan yang tepat</span>
                            </div>
                        </div>
                        
                        <!-- Login Button -->
                        <a href="{{ route('google.login') }}" 
                           class="inline-flex items-center bg-white hover:bg-gray-50 text-red-600 font-bold py-4 px-8 rounded-full transition-all duration-300 transform hover:scale-105 shadow-xl hover:shadow-2xl">
                            <svg class="w-6 h-6 mr-3" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z"/>
                                <path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z"/>
                                <path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z"/>
                                <path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z"/>
                            </svg>
                            Sign in with Google
                        </a>
                        
                        <!-- Additional Info -->
                        <div class="mt-6 text-white/70 text-sm">
                            <p>Belum punya akun? Login dengan Google akan membuat akun otomatis untuk Anda.</p>
                        </div>
                    </div>
                    
                    <!-- Preview Cards (Blurred) -->
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 sm:gap-8 mt-8 opacity-30 blur-sm">
                        @for ($i = 1; $i <= 6; $i++)
                            <div class="bg-white/20 rounded-2xl h-80 backdrop-blur-sm"></div>
                        @endfor
                    </div>
                @endauth
            </div>
        </div>
    </section>

    <!-- Success Modal -->
    <div id="successModal" class="fixed inset-0 bg-black/50 backdrop-blur-sm hidden z-50 flex items-center justify-center">
        <div class="bg-white rounded-2xl p-8 max-w-md mx-4 transform transition-all duration-300 scale-95 opacity-0" id="modalContent">
            <div class="text-center">
                <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                    </svg>
                </div>
                <h3 class="text-2xl font-bold text-gray-800 mb-2">Vote Berhasil!</h3>
                <p class="text-gray-600 mb-6">Terima kasih telah voting untuk <span id="votedCampus" class="font-bold text-red-600"></span></p>
                <button onclick="closeModal()" class="bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-6 rounded-lg transition-colors">
                    OK
                </button>
            </div>
        </div>
    </div>
</x-layout.app>

@push('styles')
<style>
/* Custom animations */
@keyframes slideUp {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.animate-slide-up {
    animation: slideUp 0.6s ease-out forwards;
}

/* Line clamp utility */
.line-clamp-2 {
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

/* Hover effects */
.voting-card {
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
}

.voting-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.2);
}

/* Modal animations */
.modal-enter {
    animation: modalEnter 0.3s ease-out forwards;
}

@keyframes modalEnter {
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
@endpush

@push('scripts')
<script>
function voteForCampus(campusId, campusName) {
    // Simulasi voting request
    console.log('Voting for campus:', campusId, campusName);
    
    // Tampilkan success modal
    const modal = document.getElementById('successModal');
    const modalContent = document.getElementById('modalContent');
    const votedCampusSpan = document.getElementById('votedCampus');
    
    votedCampusSpan.textContent = campusName;
    modal.classList.remove('hidden');
    
    // Trigger animation
    setTimeout(() => {
        modalContent.classList.remove('scale-95', 'opacity-0');
        modalContent.classList.add('scale-100', 'opacity-100', 'modal-enter');
    }, 10);
    
    // Simulasi update vote count (dalam implementasi nyata, ini akan mengupdate database)
    updateVoteCount(campusId);
}

function closeModal() {
    const modal = document.getElementById('successModal');
    const modalContent = document.getElementById('modalContent');
    
    modalContent.classList.add('scale-95', 'opacity-0');
    modalContent.classList.remove('scale-100', 'opacity-100');
    
    setTimeout(() => {
        modal.classList.add('hidden');
    }, 300);
}

function updateVoteCount(campusId) {
    // Dalam implementasi nyata, ini akan melakukan AJAX call ke server
    // Untuk sekarang, kita hanya simulasi dengan menambahkan 1 ke vote count
    console.log('Updating vote count for campus:', campusId);
}

// Close modal when clicking outside
document.getElementById('successModal').addEventListener('click', function(e) {
    if (e.target === this) {
        closeModal();
    }
});

// Add entrance animations to cards
document.addEventListener('DOMContentLoaded', function() {
    const cards = document.querySelectorAll('.voting-card');
    cards.forEach((card, index) => {
        card.style.opacity = '0';
        card.style.transform = 'translateY(30px)';
        
        setTimeout(() => {
            card.style.transition = 'all 0.6s ease-out';
            card.style.opacity = '1';
            card.style.transform = 'translateY(0)';
        }, index * 100);
    });
});
</script>
@endpush