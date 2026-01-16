@php
    // Define variables yang diperlukan
    $nohp = $nohp ?? '+62 812-3456-7890';
    $lokasi = $lokasi ?? 'Pollux Mall Batam Centre';
@endphp

<x-layout.app :title="'Voting Kampus - Batam Campus Expo'" :nohp="$nohp" :lokasi="$lokasi">
    <!-- HERO SECTION VOTING -->


    {{-- MODAL UNTUK BILANG KALAU HALAMAN INI SUDAH TIDAK DISEDIAKAN --}}
    <div id="modal" class="fixed inset-0 z-50 overflow-y-auto">
        <div class="flex items-center justify-center min-h-screen bg-amber-950/50 backdrop-blur-3xl">
            <div class="bg-white p-6 rounded-lg shadow-lg">
                <h2 class="text-2xl font-bold mb-4">Maaf, Halaman Ini Tidak Tersedia</h2>
                <p class="mb-4">Maaf, halaman voting kampus tidak tersedia lagi. <br> Kami menghargai partisipasi Anda dalam voting kampus dan menjaga sportifitas antar kampus.</p>
                <a href="{{ route('home') }}" class="bg-green-600 rounded-4xl text-white px-4 py-2 hover:bg-green-700">Hmmm Oke dech bang</a>
            </div>
        </div>
    </div>

    <section class="relative min-h-screen overflow-hidden bg-gradient-to-br from-gray-50 to-gray-100">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-16 lg:py-20">
            <!-- Header -->
            <div class="text-center mb-12">
                <h1
                    class="font-sancreek uppercase text-[#D32F2F] text-5xl sm:text-6xl md:text-7xl lg:text-8xl mb-4 [text-shadow:_2px_2px_0_rgba(0,0,0,0.1)]">
                    VOTING KAMPUS
                </h1>
                <p class="text-gray-700 text-lg sm:text-xl md:text-2xl max-w-3xl mx-auto leading-relaxed">
                    Lihat kampus favorit pilihan pengunjung Batam Campus Expo!
                </p>
            </div>

            <!-- Top 3 Campuses -->
            <div class="mb-16">
                <h2 class="text-3xl font-bold text-gray-800 mb-8 text-center">🏆 Top 3 Kampus Favorit</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 max-w-6xl mx-auto">
                    @foreach ($topCampuses as $index => $campus)
                        <div
                            class="bg-white rounded-2xl shadow-xl overflow-hidden transform transition-all duration-300 hover:scale-105 {{ $index === 0 ? 'md:scale-110 md:z-10' : '' }}">
                            <!-- Rank Badge -->
                            <div class="relative">
                                <div class="absolute top-4 left-4 z-10">
                                    <div
                                        class="w-12 h-12 rounded-full flex items-center justify-center font-bold text-white text-xl shadow-lg
                                        {{ $index === 0 ? 'bg-yellow-500' : ($index === 1 ? 'bg-gray-400' : 'bg-orange-600') }}">
                                        {{ $index + 1 }}
                                    </div>
                                </div>

                                <!-- Campus Image/Logo -->
                                <div
                                    class="h-48 bg-gradient-to-br from-red-100 to-red-200 flex items-center justify-center p-6">
                                    @if ($campus->logo_campus && file_exists(public_path('storage/' . $campus->logo_campus)))
                                        <div
                                            class="w-32 h-32 bg-white rounded-full p-2 shadow-lg overflow-hidden flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                                            <img src="{{ asset('storage/' . $campus->logo_campus) }}"
                                                class="w-full h-full object-contain rounded-full"
                                                alt="{{ $campus->name_campus }}">
                                        </div>
                                    @else
                                        <div
                                            class="w-32 h-32 bg-white rounded-full flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform duration-300">
                                            <span
                                                class="text-5xl font-bold text-red-600">{{ substr($campus->singkatan, 0, 3) }}</span>
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <!-- Campus Info -->
                            <div class="p-6">
                                <h3 class="font-bold text-xl text-gray-800 mb-2 text-center">{{ $campus->name_campus }}
                                </h3>
                                <div class="text-center">
                                    <div
                                        class="inline-flex items-center gap-2 bg-red-50 text-red-700 px-4 py-2 rounded-full font-bold">
                                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                            <path
                                                d="M2 10.5a1.5 1.5 0 113 0v6a1.5 1.5 0 01-3 0v-6zM6 10.333v5.43a2 2 0 001.106 1.79l.05.025A4 4 0 008.943 18h5.416a2 2 0 001.962-1.608l1.2-6A2 2 0 0015.56 8H12V4a2 2 0 00-2-2 1 1 0 00-1 1v.667a4 4 0 01-.8 2.4L6.8 7.933a4 4 0 00-.8 2.4z" />
                                        </svg>
                                        <span class="text-2xl">{{ number_format($campus->votes_count) }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- All Campuses List -->
            <div class="max-w-4xl mx-auto">
                <h2 class="text-3xl font-bold text-gray-800 mb-8 text-center">🏆 Top 10 Besar</h2>
                <div class="bg-white rounded-2xl shadow-xl overflow-hidden">
                    <div class="overflow-x-auto">
                        <table class="w-full">
                            <thead class="bg-gradient-to-r from-red-600 to-red-700 text-white">
                                <tr>
                                    <th class="px-6 py-4 text-left text-sm font-bold uppercase tracking-wider">Peringkat
                                    </th>
                                    <th class="px-6 py-4 text-left text-sm font-bold uppercase tracking-wider">Kampus
                                    </th>
                                    <th class="px-6 py-4 text-center text-sm font-bold uppercase tracking-wider">Total
                                        Vote</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200">
                                @foreach ($allCampuses as $index => $campus)
                                    <tr
                                        class="hover:bg-gray-50 transition-colors {{ $index < 3 ? 'bg-red-50/30' : '' }}">
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <span
                                                    class="font-bold text-lg {{ $index < 3 ? 'text-red-600' : 'text-gray-600' }}">
                                                    #{{ $index + 1 }}
                                                </span>
                                                @if ($index === 0)
                                                    <span class="ml-2">🥇</span>
                                                @elseif ($index === 1)
                                                    <span class="ml-2">🥈</span>
                                                @elseif ($index === 2)
                                                    <span class="ml-2">🥉</span>
                                                @endif
                                            </div>
                                        </td>
                                        <td class="px-6 py-4">
                                            <div class="flex items-center gap-3">
                                                @if ($campus->logo_campus && file_exists(public_path('storage/' . $campus->logo_campus)))
                                                    <img src="{{ asset('storage/' . $campus->logo_campus) }}"
                                                        class="w-10 h-10 rounded-full object-cover"
                                                        alt="{{ $campus->name_campus }}">
                                                @else
                                                    <div
                                                        class="w-10 h-10 bg-red-100 rounded-full flex items-center justify-center">
                                                        <span
                                                            class="text-xs font-bold text-red-600">{{ substr($campus->singkatan, 0, 2) }}</span>
                                                    </div>
                                                @endif
                                                <div>
                                                    <div class="font-semibold text-gray-900">{{ $campus->name_campus }}
                                                    </div>
                                                    <div class="text-sm text-gray-500">{{ $campus->singkatan }}</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 text-center">
                                            <span
                                                class="inline-flex items-center gap-1 font-bold text-lg {{ $index < 3 ? 'text-red-600' : 'text-gray-700' }}">
                                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                                    <path
                                                        d="M2 10.5a1.5 1.5 0 113 0v6a1.5 1.5 0 01-3 0v-6zM6 10.333v5.43a2 2 0 001.106 1.79l.05.025A4 4 0 008.943 18h5.416a2 2 0 001.962-1.608l1.2-6A2 2 0 0015.56 8H12V4a2 2 0 00-2-2 1 1 0 00-1 1v.667a4 4 0 01-.8 2.4L6.8 7.933a4 4 0 00-.8 2.4z" />
                                                </svg>
                                                {{ number_format($campus->votes_count) }}
                                            </span>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Info Box -->
                <div class="mt-8 bg-blue-50 border-l-4 border-blue-500 p-6 rounded-lg">
                    <div class="flex items-start gap-3">
                        <svg class="w-6 h-6 text-blue-500 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                clip-rule="evenodd" />
                        </svg>
                        <div>
                            <h4 class="font-bold text-blue-900 mb-1">Cara Memberikan Vote</h4>
                            <p class="text-blue-800 text-sm">
                                Kunjungi halaman <a href="{{ route('kampus') }}"
                                    class="font-semibold underline hover:text-blue-600">Kampus</a>,
                                klik "Lihat Detail" pada kampus favorit Anda, lalu klik tombol "Vote" di dalam modal.
                                <span class="font-semibold">Login diperlukan untuk memberikan vote.</span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-layout.app>
