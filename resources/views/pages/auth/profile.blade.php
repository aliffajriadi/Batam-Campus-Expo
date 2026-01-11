<x-layout.app :title="'Profile'" :nohp="'78797979'" :lokasi="'Batam'">
    <!-- BACKGROUND -->
    <div class="absolute inset-0 -z-10">
        <div class="w-full h-full bg-gradient-to-br from-[#A61E22] via-[#8a1a1e] to-[#6d1518]"></div>
    </div>

    <!-- CONTENT -->
    <div class="relative z-10 min-h-screen py-12 px-4">
        <div class="max-w-4xl mx-auto">


            <!-- HEADER -->
            <div class="text-center mb-10 animate-fade-in">
                <h1 class="text-4xl md:text-5xl font-bold text-white mb-3 [text-shadow:_2px_2px_8px_rgba(0,0,0,0.3)]">
                    Profil Saya
                </h1>
            </div>

            <!-- MAIN CARD -->
            <div
                class="bg-white rounded-3xl shadow-[0_20px_60px_rgba(0,0,0,0.3)] overflow-hidden backdrop-blur-sm animate-slide-up">
                <!-- Accent Bar -->
                <div class="h-2 bg-gradient-to-r from-[#D32F2F] via-[#FF5252] to-[#B71C1C]"></div>
                @if (session('error'))
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                        <strong class="font-bold">Haiii </strong>
                        <span class="block sm:inline">{{ session('error') }}</span>
                    </div>
                @endif
                @if (session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative"
                        role="alert">
                        <strong class="font-bold">Yeaaay </strong>
                        <span class="block sm:inline">{{ session('success') }}</span>
                    </div>
                @endif
                <div class="p-6 md:p-10">
                    <!-- Profile Photo Section -->
                    <div class="flex flex-col items-center mb-8 pb-8 border-b border-gray-200">
                        <div class="relative group">
                            <div
                                class="absolute inset-0 bg-gradient-to-br from-[#D32F2F] to-[#B71C1C] rounded-full blur-xl opacity-50 group-hover:opacity-75 transition-opacity duration-300">
                            </div>
                            <img src="{{ Auth::user()->photo }}" alt="Profile Photo"
                                class="relative w-32 h-32 md:w-40 md:h-40 rounded-full object-cover border-4 border-white shadow-[0_10px_30px_rgba(0,0,0,0.2)] group-hover:scale-105 transition-transform duration-300">
                            <div
                                class="absolute bottom-2 right-2 bg-green-500 w-6 h-6 rounded-full border-4 border-white">
                            </div>
                        </div>
                        <p class="text-sm text-gray-500 mt-4 text-center max-w-xs">
                            <svg class="w-4 h-4 inline mr-1" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M21.35 11.1h-9.17v-9.17c0-0.48-0.39-0.87-0.87-0.87s-0.87 0.39-0.87 0.87v9.17h-9.17c-0.48 0-0.87 0.39-0.87 0.87s0.39 0.87 0.87 0.87h9.17v9.17c0 0.48 0.39 0.87 0.87 0.87s0.87-0.39 0.87-0.87v-9.17h9.17c0.48 0 0.87-0.39 0.87-0.87s-0.39-0.87-0.87-0.87z" />
                            </svg>
                            Foto profil otomatis dari akun Google Anda
                        </p>
                    </div>

                    <form action="#" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="space-y-6">
                            <!-- Nama Lengkap -->
                            <div class="group">
                                <label class="block text-sm font-bold text-gray-700 mb-2 ml-1 flex items-center gap-2">
                                    <svg class="w-4 h-4 text-[#D32F2F]" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    Nama Lengkap
                                </label>
                                <div class="relative">
                                    <span
                                        class="absolute inset-y-0 left-0 pl-4 flex items-center text-gray-400 group-focus-within:text-[#D32F2F] transition-colors">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                        </svg>
                                    </span>
                                    <input type="text" disabled name="name" value="{{ Auth::user()->name }}"
                                        class="w-full pl-12 pr-4 py-4 bg-gray-50 border-2 border-gray-200 rounded-2xl focus:ring-2 focus:ring-[#D32F2F]/20 focus:border-[#D32F2F] outline-none transition-all duration-300 hover:border-gray-300"
                                        placeholder="Masukkan nama lengkap Anda" required>
                                </div>
                            </div>

                            <!-- Grid for School and Phone -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <!-- Asal Sekolah -->
                                <div class="group">
                                    <label
                                        class="block text-sm font-bold text-gray-700 mb-2 ml-1 flex items-center gap-2">
                                        <svg class="w-4 h-4 text-[#D32F2F]" fill="currentColor" viewBox="0 0 20 20">
                                            <path
                                                d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01.356-.257l4-1.714a1 1 0 11.788 1.838L7.667 9.088l1.94.831a1 1 0 00.787 0l7-3a1 1 0 000-1.838l-7-3zM3.31 9.397L5 10.12v4.102a8.969 8.969 0 00-1.05-.174 1 1 0 01-.89-.89 11.115 11.115 0 01.25-3.762zM9.3 16.573A9.026 9.026 0 007 14.935v-3.957l1.818.78a3 3 0 002.364 0l5.508-2.361a11.026 11.026 0 01.25 3.762 1 1 0 01-.89.89 8.968 8.968 0 00-5.35 2.524 1 1 0 01-1.4 0zM6 18a1 1 0 001-1v-2.065a8.935 8.935 0 00-2-.712V17a1 1 0 001 1z" />
                                        </svg>
                                        Asal Sekolah
                                    </label>
                                    <div class="relative">
                                        <span
                                            class="absolute inset-y-0 left-0 pl-4 flex items-center text-gray-400 group-focus-within:text-[#D32F2F] transition-colors pointer-events-none">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                            </svg>
                                        </span>
                                        @php
                                            $daftar_sekolah = [
                                                'SMAN 1 BATAM',
                                                'SMAN 2 BATAM',
                                                'SMAN 3 BATAM',
                                                'SMAN 4 BATAM',
                                                'SMAN 5 BATAM',
                                                'SMAN 6 BATAM',
                                                'SMAN 7 BATAM',
                                                'SMAN 8 BATAM',
                                                'SMAN 9 BATAM',
                                                'SMAN 10 BATAM',
                                                'SMAN 11 BATAM',
                                                'SMAN 12 BATAM',
                                                'SMAN 13 BATAM',
                                                'SMAN 14 BATAM',
                                                'SMAN 15 BATAM',
                                                'SMAN 16 BATAM',
                                                'SMAN 17 BATAM',
                                                'SMAN 18 BATAM',
                                                'SMAN 19 BATAM',
                                                'SMAN 20 BATAM',
                                                'SMAN 21 BATAM',
                                                'SMAN 22 BATAM',
                                                'SMAN 23 BATAM',
                                                'SMAN 24 BATAM',
                                                'SMAN 25 BATAM',
                                                'SMAN 26 BATAM',
                                                'SMAN 27 BATAM',
                                                'SMAN 28 BATAM',
                                                'SMA NEGERI 29 BATAM',
                                                'SMA ADHI NUSANTARA',
                                                'SMA Daarut Tauhiid Boarding School Batam',
                                                'SMA ELSADAI',
                                                'SMA ISLAM ANDALUSIA',
                                                'SMA IT FAJAR ILAHI BENGKONG',
                                                'SMA IT NURUL MUHAJIRIN BATAM',
                                                'SMA MEDINA UMAH CENDEKIA',
                                                'SMA PUTRA BATAM',
                                                'SMA ST ANDREWS SCHOOL BATAM',
                                                'SMA TARUNA KEPULAUAN RIAU',
                                                'SMA YOS SUDARSO',
                                                'SMAIT DARUSSALAM 01 BATAM',
                                                'SMAIT FAJAR ILAHI',
                                                'SMAIT FAJAR ILAHI BATU AJI',
                                                'SMAS AL KAHFI ISLAMIC SCHOOL',
                                                'SMAS AL-AZHAR',
                                                'SMAS AL-KAUTSAR',
                                                'SMAS ANANDA',
                                                'SMAS ANSVIN',
                                                'SMAS AUSTRALIAN INTERCULTURAL SCHOOL',
                                                'SMAS AVAVA',
                                                'SMAS BAITUL HIKMAH',
                                                'SMAS BINA NUSANTARA BATAM',
                                                'SMAS BODHI DHARMA BATAM',
                                                'SMAS BUDI LUHUR BOARDING SCHOOL',
                                                'SMAS DJUWITA',
                                                'SMAS GLOBE NATIONAL PLUS',
                                                'SMAS GLOBE NATIONAL PLUS 2',
                                                'SMAS GLOBE NATIONAL PLUS 3',
                                                'SMAS GRANADA ISLAMIC BOARDING SCHOOL',
                                                'SMAS GURINDAM BOARDING SCHOOL',
                                                'SMAS HARAPAN UTAMA',
                                                'SMAS IMMANUEL',
                                                'SMAS INTEGRAL HIDAYATULLAH',
                                                'SMAS INTEGRAL HIDAYATULLAH BOARDING SCHOOL',
                                                'SMAS ISLAM HANG TUAH',
                                                'SMAS ISLAM NABILAH',
                                                'SMAS ISLAM TERPADU ULIL ALBAB',
                                                'SMAS IT IMAM SYAFII',
                                                'SMAS IT JABAL RAHMAH',
                                                'SMAS KALLISTA',
                                                'SMAS KARTINI',
                                                'SMAS KEMILAU ISLAMIC SCHOOL BATAM',
                                                'SMAS KRISTEN BASIC BATAM',
                                                'SMAS KRISTEN KALAM KUDUS 2',
                                                'SMAS KRISTEN TABQHA BATAM',
                                                'SMAS MAITREYAWIRA',
                                                'SMAS MONTE SIENNA',
                                                'SMAS MUHAMMADIYAH 1',
                                                'SMAS NIZAM AL MULK',
                                                'SMAS PELITA UTAMA',
                                                'SMAS PERMATA HARAPAN 2 BATAM',
                                                'SMAS PLUS AL-USTMANIYAH QUEEN AL FALAH',
                                                'SMAS PUTRA PERSADA BATAM',
                                                'SMAS RIIHATUL JANNAH',
                                                'SMAS SWASTA ISLAM HANG NADIM MALAY SCHOOL',
                                                'SMAS TERBUKA STIPAK',
                                                'SMAS TUNAS BARU JIN SEUNG',
                                                'SMAS ULUL ILMI CENDIKIA',
                                                'SMAS VISI KUDUS INDONESIA',
                                                'SMAS YEHONALA',
                                                'Sekolah Menengah Atas Global Indo-Asia',
                                                'Sekolah Menengah Atas Mondial',
                                                'Sekolah Menengah Atas Swasta Kristen Basic 2',
                                                'SMK NEGERI 1 BATAM',
                                                'SMK NEGERI 2 BATAM',
                                                'SMK NEGERI 3 BATAM',
                                                'SMK NEGERI 4 BATAM',
                                                'SMK NEGERI 5 BATAM',
                                                'SMK NEGERI 6 BATAM',
                                                'SMK NEGERI 7 BATAM',
                                                'SMK NEGERI 8 BATAM',
                                                'SMK NEGERI 9 BATAM',
                                                'SMK NEGERI 10 BATAM',
                                                'SMK NEGERI 11 BATAM',
                                                'SMK NEGERI 12 BATAM',
                                                'SMK IBNU SINA 2 BATAM',
                                                'SMK ISLAMIC CENTRE NW',
                                                'SMK MISI BAGI BANGSA',
                                                'SMK MUHAMMADIYAH KABIL',
                                                'SMK Satu Bangsa Harmoni',
                                                'SMKS ADVENT BATAM',
                                                'SMKS AL AMIN 1 BATAM',
                                                'SMKS AL AZHAR BATAM',
                                                'SMKS AL MUGNII MANDIRI',
                                                'SMKS ALJABAR BATAM',
                                                'SMKS BATAM INTERNATIONAL SCHOOL',
                                                'SMKS EBEN HAEZER BATAM',
                                                'SMKS ELSADAI BATAM',
                                                'SMKS GLOBE NATIONAL PLUS',
                                                'SMKS GLOBE NATIONAL PLUS 2',
                                                'SMKS HANG NADIM BATAM',
                                                'SMKS HARAPAN UTAMA',
                                                'SMKS HIDAYATULLAH BATAM',
                                                'SMKS IBNU SINA BATAM',
                                                'SMKS ISLAM HANG TUAH BATAM',
                                                'SMKS IT AR RISALAH',
                                                'SMKS IT DARUSSALAM BOARDING SCHOOL 01',
                                                'SMKS KARTINI BATAM',
                                                'SMKS KOLESE TIARA BANGSA',
                                                'SMKS MAARIF NU KOTA BATAM',
                                                'SMKS MAITREYAWIRA',
                                                'SMKS MUHAMMADIYAH BATAM',
                                                'SMKS MULTISTUDI HIGH SCHOOL BATAM',
                                                'SMKS NIZAM AL MULK',
                                                'SMKS NURUL JADID BATAM',
                                                'SMKS PARIWISATA ADIMULIA',
                                                'SMKS PELAYARAN KEPULAUAN RIAU',
                                                'SMKS PELAYARAN NASIONAL BATAM',
                                                'SMKS PELAYARAN SINAR METTA',
                                                'SMKS PELITA BANGSA SCHOOL',
                                                'SMKS PENERBANGAN',
                                                'SMKS PENERBANGAN NASIONAL BATAM',
                                                'SMKS PENERBANGAN SPN DIRGANTARA',
                                                'SMKS PERMATA HARAPAN 1 BATAM',
                                                'SMKS PERMATA HARAPAN 2 BATAM',
                                                'SMKS PERTIWI BATAM',
                                                'SMKS PLUS KEMILAU BANGSA',
                                                'SMKS PUTRA JAYA CENTRE',
                                                'SMKS PUTRA JAYA SCHOOL BATAM',
                                                'SMKS REAL INFORMATIKA BATAM',
                                                'SMKS RESTU BUNDA',
                                                'SMKS SULTAN AGUNG BATAM',
                                                'SMKS TAHFIDZ AN NASHICHAH',
                                                'SMKS TELADAN BATAM',
                                                'SMKS TERPADU PUTRA JAYA BATAM',
                                                'SMKS TUNAS MUDA BERKARYA BATAM',
                                                'SMKS YEHONALA',
                                                'SMKS YOS ANUGERAH',
                                                'MAN 2 Kota Batam',
                                                'MAN BATAM',
                                                'MAN INSAN CENDEKIA KOTA BATAM',
                                                'MA MANBAUL HIDAYAH',
                                                'MA YA HUSNAYA',
                                                'MAS AL MARHAMAH',
                                                'MAS AL-MUKARRAMAH',
                                                'MAS AMANATUL UMMAH',
                                                'MAS AN NI`MAH',
                                                'MAS BATAMIYAH',
                                                'MAS DARUL FALAH',
                                                'MAS DARUL IHSAN',
                                                'MAS DARUL IHSAN',
                                                'MAS INDUSTRI ALJABAR',
                                                'MAS NAHDLATUL WATHAN',
                                                'MAS PLUS NURUL HAQ',
                                                'MAS QUR`AN CENTRE',
                                                'SLB ANAK BRILIANT BATAM',
                                                'SLB CENDEKIARA',
                                                'SLB KARTINI BATAM',
                                                'SLB KARTINI SEKUPANG BATAM',
                                                'SLB NEGERI BATAM',
                                                'SLB PUTRAKAMI',
                                                'SLB RUMAH KITA BATAM',
                                                'SLB STIPAK',
                                                'Sekolah Khusus Smart Aurica',
                                                'Lainnya',
                                            ];
                                        @endphp

                                        <select name="asal_sekolah"
                                            class="w-full pl-12 pr-10 py-4 bg-gray-50 border-2 border-gray-200 rounded-2xl focus:ring-2 focus:ring-[#D32F2F]/20 focus:border-[#D32F2F] outline-none transition-all duration-300 hover:border-gray-300 appearance-none cursor-pointer"
                                            required>
                                            <option value="">Pilih asal sekolah</option>

                                            @foreach ($daftar_sekolah as $sekolah)
                                                <option value="{{ $sekolah }}"
                                                    {{ Auth::user()->asal_sekolah == $sekolah ? 'selected' : '' }}>
                                                    {{ $sekolah }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <span
                                            class="absolute inset-y-0 right-0 pr-4 flex items-center text-gray-400 pointer-events-none">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M19 9l-7 7-7-7" />
                                            </svg>
                                        </span>
                                    </div>
                                </div>

                                <!-- Nomor WhatsApp -->
                                <div class="group">
                                    <label
                                        class="block text-sm font-bold text-gray-700 mb-2 ml-1 flex items-center gap-2">
                                        <svg class="w-4 h-4 text-[#D32F2F]" fill="currentColor" viewBox="0 0 24 24">
                                            <path
                                                d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z" />
                                        </svg>
                                        Nomor WhatsApp
                                    </label>
                                    <div class="relative">
                                        <span
                                            class="absolute inset-y-0 left-0 pl-4 flex items-center text-gray-400 group-focus-within:text-[#D32F2F] transition-colors">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                            </svg>
                                        </span>
                                        <input type="tel" name="nohp" value="{{ Auth::user()->nohp }}"
                                            class="w-full pl-12 pr-4 py-4 bg-gray-50 border-2 border-gray-200 rounded-2xl focus:ring-2 focus:ring-[#D32F2F]/20 focus:border-[#D32F2F] outline-none transition-all duration-300 hover:border-gray-300"
                                            placeholder="Contoh: 08123456789" pattern="[0-9]{10,13}" required>
                                    </div>
                                    <p class="text-xs text-gray-500 mt-1 ml-1">Format: 08xxxxxxxxxx</p>
                                </div>
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div
                            class="mt-10 pt-6 border-t border-gray-200 flex flex-col-reverse md:flex-row gap-4 items-center justify-between">
                            <a href="{{ url('/') }}"
                                class="w-full md:w-auto text-center px-8 py-3 text-gray-600 font-semibold hover:text-gray-800 hover:bg-gray-100 rounded-xl transition-all duration-300">
                                ← Kembali
                            </a>
                            <button type="submit"
                                class="w-full md:w-auto bg-gradient-to-br from-[#D32F2F] to-[#B71C1C] text-white px-10 py-4 rounded-2xl font-bold shadow-[0_10px_25px_rgba(211,47,47,0.3)] hover:scale-[1.02] hover:shadow-[0_15px_35px_rgba(211,47,47,0.4)] active:scale-[0.98] transition-all duration-300 flex items-center justify-center gap-2">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7" />
                                </svg>
                                Simpan Perubahan
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Info Card -->
            <div
                class="mt-8 p-6 bg-white/95 backdrop-blur-sm rounded-2xl border-2 border-blue-200 shadow-[0_10px_30px_rgba(0,0,0,0.2)] animate-fade-in-delayed">
                <div class="flex items-start gap-4">
                    <div class="flex-shrink-0">
                        <div
                            class="w-12 h-12 bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl flex items-center justify-center shadow-lg">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                    </div>
                    <div class="flex-1">
                        <h4 class="font-bold text-gray-800 mb-1 flex items-center gap-2">
                            Informasi Akun
                            <span
                                class="px-2 py-0.5 bg-green-100 text-green-700 text-xs font-semibold rounded-full">Connected</span>
                        </h4>
                        <p class="text-sm text-gray-600 leading-relaxed">
                            Akun Anda terhubung dengan <strong class="text-gray-800">Google</strong>.
                            Data profil akan tersinkronisasi otomatis untuk kemudahan akses.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

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
                    transform: translateY(40px);
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

            .animate-fade-in-delayed {
                animation: fade-in 0.8s ease-out 0.3s both;
            }

            /* Custom scrollbar */
            ::-webkit-scrollbar {
                width: 10px;
            }

            ::-webkit-scrollbar-track {
                background: rgba(255, 255, 255, 0.1);
            }

            ::-webkit-scrollbar-thumb {
                background: rgba(211, 47, 47, 0.5);
                border-radius: 5px;
            }

            ::-webkit-scrollbar-thumb:hover {
                background: rgba(211, 47, 47, 0.7);
            }
        </style>
    @endpush
</x-layout.app>
