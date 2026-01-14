<footer class="relative z-10 w-full mt-auto " role="contentinfo">
    <div
        class="bg-gradient-to-b from-[#A61E22] to-[#800F12] pt-6 pb-8 px-4  shadow-[0_-4px_20px_rgba(166,30,34,0.3)] border-t border-[#ff6b6b]/30">
        <div class="container mx-auto max-w-6xl">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 md:gap-12 items-start px-10">

                <!-- Left Section - Logo & Title -->
                <div class="flex flex-col items-center md:items-start text-center md:text-left">
                    <h3
                        class="font-sancreek text-4xl md:text-5xl lg:text-6xl text-[#fbbf24] mb-4 drop-shadow-[0_4px_8px_rgba(0,0,0,0.6)] tracking-wider leading-tight">
                        BATAM<br>CAMPUS<br>EXPO
                    </h3>
                    <p class="text-white/80 text-sm md:text-base max-w-xs mt-2">
                        Pameran Kampus Terbesar di Batam untuk Masa Depan Cemerlangmu
                    </p>
                </div>

                <!-- Right Section - Contact & Social -->
                <div class="flex flex-col items-center md:items-end space-y-6">

                    <!-- Contact Info -->
                    <div class="text-center md:text-right space-y-3">
                        <h4 class="text-[#fbbf24] font-semibold text-lg mb-4 tracking-wide">
                            Hubungi Kami
                        </h4>

                        <!-- Email -->
                        <a href="mailto:{{ $settings->email ?? 'batamcampusexpo@gmail.com' }}"
                            class="flex items-center justify-center md:justify-end gap-3 text-white/90 hover:text-[#fbbf24] transition-colors duration-300 group">
                            <svg class="w-5 h-5 group-hover:scale-110 transition-transform" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                            <span class="text-sm md:text-base">batamcampusexpo@gmail.com</span>
                        </a>

                        <!-- Location -->
                        <div
                            class="flex items-center justify-center md:justify-end gap-3 text-white/90 hover:text-[#fbbf24] transition-colors duration-300 group">
                            <svg class="w-5 h-5 group-hover:scale-110 transition-transform" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            <span class="text-sm md:text-base">{{ $lokasi }}</span>
                        </div>

                        <!-- Phone -->
                        <a href="tel:{{ preg_replace('/[^0-9+]/', '', $nohp) }}"
                            class="flex items-center justify-center md:justify-end gap-3 text-white/90 hover:text-[#fbbf24] transition-colors duration-300 group">
                            <svg class="w-5 h-5 group-hover:scale-110 transition-transform" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                            </svg>
                            <span class="text-sm md:text-base">{{ $nohp }}</span>
                        </a>

                    </div>

                    <!-- Social Links -->
                    <div class="flex flex-col items-center md:items-end">
                        <h4 class="text-[#fbbf24] font-semibold text-lg mb-4 tracking-wide">
                            Ikuti Kami
                        </h4>
                        <div class="flex gap-4">
                            <!-- Instagram -->
                            <a href="https://instagram.com/batamcampusexpo" target="_blank" rel="noopener noreferrer"
                                class="group relative p-3 bg-white/10 backdrop-blur-sm rounded-full hover:bg-[#fbbf24] transition-all duration-300 hover:-translate-y-2 hover:shadow-[0_8px_20px_rgba(251,191,36,0.6)]"
                                aria-label="Instagram">
                                <svg class="w-6 h-6 text-white group-hover:text-[#800F12] transition-colors"
                                    fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z"
                                        clip-rule="evenodd" />
                                </svg>
                            </a>

                            <!-- TikTok -->
                            <a href="https://tiktok.com/@batamcampusexpo" target="_blank" rel="noopener noreferrer"
                                class="group relative p-3 bg-white/10 backdrop-blur-sm rounded-full hover:bg-[#fbbf24] transition-all duration-300 hover:-translate-y-2 hover:shadow-[0_8px_20px_rgba(251,191,36,0.6)]"
                                aria-label="TikTok">
                                <svg class="w-6 h-6 text-white group-hover:text-[#800F12] transition-colors"
                                    fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path
                                        d="M19.59 6.69a4.83 4.83 0 0 1-3.77-4.25V2h-3.45v13.67a2.89 2.89 0 0 1-5.2 1.74 2.89 2.89 0 0 1 2.31-4.64 2.93 2.93 0 0 1 .88.13V9.4a6.84 6.84 0 0 0-1-.05A6.33 6.33 0 0 0 5 20.1a6.34 6.34 0 0 0 10.86-4.43v-7a8.16 8.16 0 0 0 4.77 1.52v-3.4a4.85 4.85 0 0 1-1-.1z" />
                                </svg>
                            </a>

                            <!-- Website -->
                            <a href="https://batamcampusexpo.com" target="_blank" rel="noopener noreferrer"
                                class="group relative p-3 bg-white/10 backdrop-blur-sm rounded-full hover:bg-[#fbbf24] transition-all duration-300 hover:-translate-y-2 hover:shadow-[0_8px_20px_rgba(251,191,36,0.6)]"
                                aria-label="Website">
                                <svg class="w-6 h-6 text-white group-hover:text-[#800F12] transition-colors"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Separator -->
            <div class="w-full h-px bg-gradient-to-r from-transparent via-[#fbbf24]/50 to-transparent my-8"></div>

            <!-- Bottom Copyright -->
            <div class="flex flex-col md:flex-row justify-between px-10 items-center gap-4 text-center md:text-left">
                <a href="https://www.instagram.com/p/DSul6yDjyIg/?img_index=14" rel="noopener noreferrer"
                    class="text-white/80 hover:underline text-sm md:text-base">
                    &copy; <span id="year"></span> IT Department Batam Campus Expo
                </a>
                <p class="text-white/60 text-xs md:text-sm">
                    All Rights Reserved
                </p>
            </div>
        </div>
    </div>
</footer>

<script>
    // Auto update year
    document.getElementById('year').textContent = new Date().getFullYear();
</script>
