<x-layout.app title="Toko" nohp="Toko" lokasi="Toko">
    <!-- Enhanced background dengan modern gradient dan overlay -->
   <div class="absolute inset-0 -z-10 overflow-hidden">
        <!-- Gradient -->
        <div class="absolute inset-0 bg-gradient-to-br from-[#D32F2F] to-[#800000]"></div>
        <!-- Pattern -->
          <div class="absolute inset-0 opacity-20">
            <svg width="100%" height="100%" xmlns="http://www.w3.org/2000/svg">
                <defs>
                    <!-- Circus Pattern -->
                    <pattern id="circusPattern" x="0" y="0" width="200" height="250" patternUnits="userSpaceOnUse">
                        <!-- Big Top Tent -->
                        <g transform="translate(20, 30)">
                            <polygon points="40,0 80,60 0,60" fill="#fbbf24" stroke="#f59e0b" stroke-width="2"/>
                            <polygon points="40,0 60,60 20,60" fill="#ff6b6b" stroke="#ee5a24" stroke-width="1"/>
                            <rect x="35" y="60" width="10" height="20" fill="#8B4513"/>
                            <circle cx="40" cy="5" r="3" fill="#FFD700"/>
                        </g>
                        
                        <!-- Ferris Wheel -->
                        <g transform="translate(120, 40)">
                            <circle cx="30" cy="30" r="25" fill="none" stroke="#fbbf24" stroke-width="3"/>
                            <circle cx="30" cy="5" r="4" fill="#ff6b6b"/>
                            <circle cx="55" cy="30" r="4" fill="#4CAF50"/>
                            <circle cx="30" cy="55" r="4" fill="#2196F3"/>
                            <circle cx="5" cy="30" r="4" fill="#FF5722"/>
                            <circle cx="30" cy="30" r="3" fill="#FFD700"/>
                            <line x1="30" y1="30" x2="30" y2="5" stroke="#333" stroke-width="1"/>
                            <line x1="30" y1="30" x2="55" y2="30" stroke="#333" stroke-width="1"/>
                            <line x1="30" y1="30" x2="30" y2="55" stroke="#333" stroke-width="1"/>
                            <line x1="30" y1="30" x2="5" y2="30" stroke="#333" stroke-width="1"/>
                        </g>
                        
                        <!-- Playing Cards -->
                        <g transform="translate(10, 120) rotate(15)">
                            <rect width="25" height="35" rx="3" fill="white" stroke="#D32F2F" stroke-width="2"/>
                            <path d="M12.5 8 C10 6, 6 6, 8 12 C6 6, 2 6, 4 12 L12.5 18 L21 12 C19 6, 15 6, 17 12 C15 6, 11 6, 12.5 8 Z" fill="#D32F2F"/>
                            <text x="2" y="7" font-size="4" fill="#D32F2F" font-weight="bold">K</text>
                        </g>
                        
                        <!-- Joker Card -->
                        <g transform="translate(140, 140) rotate(-20)">
                            <rect width="25" height="35" rx="3" fill="#8B5CF6" stroke="#7C3AED" stroke-width="2"/>
                            <circle cx="12.5" cy="17.5" r="6" fill="white"/>
                            <circle cx="10.5" cy="15.5" r="1" fill="#333"/>
                            <circle cx="14.5" cy="15.5" r="1" fill="#333"/>
                            <path d="M9 20 Q12.5 23 16 20" stroke="#D32F2F" stroke-width="1" fill="none"/>
                            <text x="6" y="30" font-size="3" fill="white" font-weight="bold">JOKER</text>
                        </g>
                        
                        <!-- Dice -->
                        <g transform="translate(60, 180)">
                            <rect width="20" height="20" rx="2" fill="white" stroke="#333" stroke-width="2"/>
                            <circle cx="7" cy="7" r="1.5" fill="#333"/>
                            <circle cx="13" cy="7" r="1.5" fill="#333"/>
                            <circle cx="7" cy="13" r="1.5" fill="#333"/>
                            <circle cx="13" cy="13" r="1.5" fill="#333"/>
                            <circle cx="10" cy="10" r="1.5" fill="#333"/>
                        </g>
                        
                        <!-- Carnival Mask -->
                        <g transform="translate(160, 200)">
                            <ellipse cx="15" cy="12" rx="12" ry="8" fill="#FFD700" stroke="#f59e0b" stroke-width="2"/>
                            <circle cx="10" cy="10" r="2" fill="#333"/>
                            <circle cx="20" cy="10" r="2" fill="#333"/>
                            <path d="M10 16 Q15 20 20 16" stroke="#D32F2F" stroke-width="2" fill="none"/>
                            <path d="M5 8 Q0 5 -2 10" stroke="#8B5CF6" stroke-width="3" fill="none"/>
                            <path d="M25 8 Q30 5 32 10" stroke="#8B5CF6" stroke-width="3" fill="none"/>
                        </g>
                        
                        <!-- Magic Wand -->
                        <g transform="translate(80, 80) rotate(45)">
                            <rect x="0" y="8" width="30" height="2" fill="#8B4513"/>
                            <polygon points="30,5 35,10 30,15" fill="#FFD700"/>
                            <circle cx="32" cy="7" r="1" fill="#ff6b6b"/>
                            <circle cx="32" cy="13" r="1" fill="#4CAF50"/>
                        </g>
                        
                        <!-- Balloon Cluster -->
                        <g transform="translate(40, 200)">
                            <ellipse cx="5" cy="10" rx="4" ry="6" fill="#ff6b6b"/>
                            <ellipse cx="12" cy="8" rx="4" ry="6" fill="#4CAF50"/>
                            <ellipse cx="19" cy="12" rx="4" ry="6" fill="#2196F3"/>
                            <line x1="5" y1="16" x2="8" y2="25" stroke="#333" stroke-width="1"/>
                            <line x1="12" y1="14" x2="8" y2="25" stroke="#333" stroke-width="1"/>
                            <line x1="19" y1="18" x2="8" y2="25" stroke="#333" stroke-width="1"/>
                        </g>
                    </pattern>
                    
                    <!-- Floating Lights -->
                    <pattern id="floatingLights" x="0" y="0" width="100" height="100" patternUnits="userSpaceOnUse">
                        <circle cx="20" cy="20" r="2" fill="#fbbf24" opacity="0.8">
                            <animate attributeName="opacity" values="0.3;1;0.3" dur="2s" repeatCount="indefinite"/>
                        </circle>
                        <circle cx="60" cy="40" r="2" fill="#ff6b6b" opacity="0.8">
                            <animate attributeName="opacity" values="1;0.3;1" dur="2.5s" repeatCount="indefinite"/>
                        </circle>
                        <circle cx="80" cy="70" r="2" fill="#4CAF50" opacity="0.8">
                            <animate attributeName="opacity" values="0.3;1;0.3" dur="1.8s" repeatCount="indefinite"/>
                        </circle>
                        <circle cx="30" cy="80" r="2" fill="#2196F3" opacity="0.8">
                            <animate attributeName="opacity" values="1;0.3;1" dur="2.2s" repeatCount="indefinite"/>
                        </circle>
                    </pattern>
                </defs>
                
                <rect width="100%" height="100%" fill="url(#circusPattern)"/>
                <rect width="100%" height="100%" fill="url(#floatingLights)" opacity="0.6"/>
            </svg>
            </div>
        </div>
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
                <h1 class="font-sancreek uppercase text-yellow-400 leading-[0.85] text-4xl sm:text-5xl md:text-6xl lg:text-7xl mb-6 [text-shadow:_4px_4px_0_rgba(0,0,0,0.3),_8px_8px_0_rgba(0,0,0,0.2)]">
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
