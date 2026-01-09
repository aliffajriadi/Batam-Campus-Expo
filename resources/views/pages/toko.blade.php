<x-layout.app title="Toko" nohp="Toko" lokasi="Toko">
    <!-- Enhanced background dengan modern gradient dan overlay -->
    <div class="absolute inset-0 -z-10">
        <div class="w-full h-full bg-gradient-to-br from-[#A61E22] via-[#8a1a1e] to-[#6b1419]"></div>
        <div class="absolute inset-0 bg-black/10"></div>
    </div>

    <!-- CONTENT -->
    <div class="relative z-10 min-h-screen">
        <div class="container mx-auto py-16 px-4 sm:px-6 lg:px-8">
            
            <!-- Improved header dengan better typography dan spacing -->
            <div class="text-center mb-16 pt-6">
                <span class="inline-block text-red-100 text-sm font-semibold tracking-widest uppercase mb-4 opacity-80">
                    ✨ Koleksi Eksklusif Kami
                </span>
                <h1 class="font-sancreek uppercase text-white leading-[0.85] text-4xl sm:text-5xl md:text-7xl lg:text-9xl mb-6 [text-shadow:_4px_4px_0_rgba(0,0,0,0.3),_8px_8px_0_rgba(0,0,0,0.2)]">
                    MERCHANDISE
                </h1>
                <h1 class="font-sancreek uppercase text-white leading-[0.85] text-4xl sm:text-5xl md:text-6xl lg:text-7xl mb-6 [text-shadow:_4px_4px_0_rgba(0,0,0,0.3),_8px_8px_0_rgba(0,0,0,0.2)]">
                    PRODUCTS
                </h1>
                <p class="text-red-50 text-lg sm:text-xl md:text-2xl opacity-95 max-w-3xl mx-auto leading-relaxed [text-shadow:_2px_2px_4px_rgba(0,0,0,0.3)]">
                    Temukan koleksi produk premium kami yang dirancang khusus untuk memenuhi kebutuhan Anda
                </p>
            </div>

            <!-- Enhanced products grid dengan better card design dan animations -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 sm:gap-8 mb-12">
                @foreach ($produk as $item)
                <div class="group h-full">
                    <div class="bg-white rounded-3xl overflow-hidden shadow-xl transition-all duration-500 hover:shadow-2xl hover:-translate-y-2 h-full flex flex-col">
                        
                        <!-- Product image dengan better overlay dan zoom effect -->
                        <div class="relative overflow-hidden bg-gradient-to-br from-gray-50 to-gray-100 h-64 sm:h-72 flex-shrink-0">
                            <div class="w-full h-full flex items-center justify-center overflow-hidden">
                                <img src="{{ asset('storage/' . $item->photo) }}" 
                                     alt="{{ $item->name_product }}" 
                                     loading="lazy" 
                                     class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                            </div>
                            <!-- Improved overlay gradient -->
                            <div class="absolute inset-0 bg-gradient-to-t from-black/30 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                        </div>

                        <!-- Product info dengan improved spacing dan typography -->
                        <div class="p-6 sm:p-7 flex flex-col flex-grow">
                            <h3 class="text-lg sm:text-xl font-bold text-gray-900 mb-3 line-clamp-2 min-h-[3rem] leading-tight">
                                {{ $item->name_product }}
                            </h3>
                            <p class="text-gray-600 text-sm leading-relaxed mb-6 line-clamp-3 min-h-[4.5rem] flex-grow">
                                {{ $item->description }}
                            </p>

                            <!-- Improved footer dengan better visual hierarchy -->
                            <div class="flex flex-col gap-4 pt-6 border-t border-gray-100">
                                <span class="text-3xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-[#A61E22] to-[#8a1a1e]">
                                    Rp {{ number_format($item->price, 0, ',', '.') }}
                                </span>
                                <button class="w-full bg-gradient-to-r from-[#A61E22] to-[#8a1a1e] text-white font-bold px-6 py-3.5 rounded-full transition-all duration-300 hover:scale-105 hover:shadow-lg active:scale-95 text-base sm:text-lg">
                                    Beli Sekarang
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </div>
</x-layout.app>
