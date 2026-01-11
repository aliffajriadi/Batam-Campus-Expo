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
                    <img src="{{ asset('storage/' . $kampus->logo_campus) }}" alt="{{ $kampus->singkatan }}"
                        class="w-full h-full object-cover rounded-full">
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
                <svg class="w-4 h-4 mt-0.5 text-[#D32F2F] flex-shrink-0" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24">
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
                    <svg class="w-4 h-4 transform group-btn-hover:translate-x-1 transition-transform" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M14 5l7 7m0 0l-7 7m7-7H3" />
                    </svg>
                </button>
            </div>
        </div>
    </div>
@endforeach
