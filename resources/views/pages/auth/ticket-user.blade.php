<x-layout.app :title="'Tickets'" :nohp="'089808043'" :lokasi="'jasdkashd'">
    <!-- BACKGROUND -->
    <div class="absolute inset-0 -z-10">
        <div class="w-full h-full bg-gradient-to-br from-[#A61E22] to-[#8a1a1e]"></div>
    </div>

    <!-- CONTENT -->
    <div class="relative z-10 min-h-screen py-12">
        <div class="container mx-auto px-4 max-w-2xl">

            <!-- HEADER -->
            <div class="text-center mb-8">
                <h1
                    class="font-bold uppercase text-white leading-tight text-4xl md:text-5xl mb-3 [text-shadow:_3px_3px_0_rgba(0,0,0,0.8),_6px_6px_0_rgba(0,0,0,0.6)]">
                    BELI TIKET
                </h1>
                <p class="text-white text-lg opacity-90 [text-shadow:_1px_1px_2px_rgba(0,0,0,0.5)]">
                    Dapatkan tiket Anda sekarang!
                </p>
            </div>

            <!-- MESSAGES -->
            @if (session('success'))
                <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded-r shadow-md animate-fade-in"
                    role="alert">
                    <p class="font-bold">Berhasil!</p>
                    <p>{{ session('success') }}</p>
                </div>
            @endif

            @if (session('error'))
                <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6 rounded-r shadow-md animate-fade-in"
                    role="alert">
                    <p class="font-bold">Gagal!</p>
                    <p>{{ session('error') }}</p>
                </div>
            @endif

            @if ($errors->any())
                <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6 rounded-r shadow-md animate-fade-in"
                    role="alert">
                    <p class="font-bold">Perhatian!</p>
                    <ul class="list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- PAYMENT INFO CARD -->
            @if (!$ticket || $ticket->status_acc === false)
                <div class="bg-white rounded-2xl shadow-[0_10px_30px_rgba(0,0,0,0.4)] p-6 mb-6">
                    <div class="flex items-center mb-4">
                        <svg class="w-6 h-6 text-[#A61E22] mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                clip-rule="evenodd" />
                        </svg>
                        <h3 class="text-xl font-bold text-gray-800">Informasi Pembayaran</h3>
                    </div>

                    <!-- TICKET SELECTION -->
                    <div class="mb-6">
                        <h4 class="text-sm font-semibold text-gray-700 mb-3">Pilih Jenis Tiket</h4>
                        <div class="grid grid-cols-1 gap-4" id="ticket-list">
                            @forelse ($tickets as $t)
                                @php
                                    $finalPrice = $t->price * (1 - $t->discount / 100);
                                    $isSoldOut = $t->sold_ticket >= $t->kuota_ticket;
                                @endphp
                                <label
                                    class="relative flex items-center p-4 border-2 rounded-xl transition-all {{ $isSoldOut ? 'bg-gray-100 border-gray-200 opacity-75 cursor-not-allowed' : 'cursor-pointer hover:bg-gray-50 border-gray-200 ticket-option' }}"
                                    data-price="{{ $finalPrice }}" data-id="{{ $t->id }}"
                                    data-ticket="{{ json_encode($t) }}">
                                    <input type="radio" name="selected_ticket" value="{{ $t->id }}"
                                        class="hidden" onchange="selectTicket(this)" {{ $isSoldOut ? 'disabled' : '' }}>
                                    <div class="flex-1">
                                        <div class="flex justify-between items-center mb-1">
                                            <div class="flex items-center gap-2">
                                                <span class="font-bold text-gray-800">{{ $t->name }}</span>
                                                @if ($isSoldOut)
                                                    <span
                                                        class="bg-gray-600 text-white text-xs px-2 py-1 rounded-full font-bold">SOLD
                                                        OUT</span>
                                                @endif
                                            </div>
                                            @if ($t->discount > 0)
                                                <span
                                                    class="bg-red-100 text-red-600 text-xs px-2 py-1 rounded-full font-bold">-{{ $t->discount }}%</span>
                                            @endif
                                        </div>
                                        <p class="text-sm text-gray-500 mb-2">{{ $t->description }}</p>
                                        <div class="flex items-center justify-between">
                                            <div class="flex items-center">
                                                @if ($t->discount > 0)
                                                    <span class="text-xs text-gray-400 line-through mr-2">Rp
                                                        {{ number_format($t->price, 0, ',', '.') }}</span>
                                                @endif
                                                <span class="text-[#A61E22] font-bold">Rp
                                                    {{ number_format($finalPrice, 0, ',', '.') }}</span>
                                            </div>
                                            <span class="text-xs text-gray-400">{{ $t->sold_ticket }} /
                                                {{ $t->kuota_ticket }} sold</span>
                                        </div>
                                    </div>
                                    <div
                                        class="w-5 h-5 border-2 border-gray-300 rounded-full flex items-center justify-center ml-4 check-circle">
                                        <div class="w-3 h-3 bg-[#A61E22] rounded-full hidden"></div>
                                    </div>
                                    <!-- Border highlight when selected will be handled by JS/CSS -->
                                </label>
                            @empty
                                <div class="text-center p-4 bg-gray-100 rounded-lg text-gray-500">
                                    Belum ada tiket yang tersedia saat ini.
                                </div>
                            @endforelse
                        </div>
                    </div>

                    <div
                        class="bg-gradient-to-br from-gray-50 to-gray-100 rounded-xl p-4 mb-4 border-2 border-[#A61E22]">
                        <p class="text-sm text-gray-600 mb-3">Silakan transfer ke rekening berikut:</p>

                        <div class="space-y-3">
                            <div class="bg-white rounded-lg p-3 shadow-sm">
                                <p class="text-xs text-gray-500 mb-1">Bank</p>
                                <p class="font-bold text-gray-800" id="bank-name">BCA</p>
                            </div>

                            <div class="bg-white rounded-lg p-3 shadow-sm">
                                <p class="text-xs text-gray-500 mb-1">Nomor Rekening</p>
                                <div class="flex items-center justify-between">
                                    <p class="font-bold text-gray-800 text-lg" id="account-number">1234567890</p>
                                    <button onclick="copyToClipboard()"
                                        class="text-[#A61E22] hover:text-[#8a1a1e] transition">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z" />
                                        </svg>
                                    </button>
                                </div>
                            </div>

                            <div class="bg-white rounded-lg p-3 shadow-sm">
                                <p class="text-xs text-gray-500 mb-1">Atas Nama</p>
                                <p class="font-bold text-gray-800" id="account-name">BATAM CAMPUS EXPO</p>
                            </div>

                            <div class="bg-white rounded-lg p-3 shadow-sm hidden" id="qr-container">
                                <p class="text-xs text-gray-500 mb-2">Scan QRIS</p>
                                <img id="qr-image" src="" alt="QRIS"
                                    class="w-full max-w-[200px] mx-auto h-auto rounded-lg border border-gray-200">
                            </div>

                            <div class="bg-white rounded-lg p-3 shadow-sm">
                                <p class="text-xs text-gray-500 mb-1">Jumlah Transfer</p>
                                <p class="font-bold text-[#A61E22] text-2xl" id="display-price">Rp 0</p>
                            </div>
                        </div>
                    </div>

                    <div class="bg-yellow-50 border-l-4 border-yellow-400 p-3 rounded">
                        <p class="text-sm text-yellow-800">
                            <span class="font-semibold">⚠️ Penting:</span> Pilih tiket terlebih dahulu, lalu transfer
                            sesuai nominal yang tertera.
                        </p>
                    </div>
                </div>

                <!-- FORM UPLOAD BUKTI TRANSFER -->
                <div class="bg-white rounded-2xl shadow-[0_10px_30px_rgba(0,0,0,0.4)] p-6 mb-6">
                    <h3 class="text-xl font-bold text-gray-800 mb-4">Upload Bukti Transfer</h3>

                    <form action="{{ route('ticket-user.store') }}" method="POST" enctype="multipart/form-data"
                        id="uploadForm">
                        @csrf
                        <input type="hidden" name="ticket_id" id="ticket_id" required>

                        <!-- File Upload Area -->
                        <div class="mb-6">
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                Bukti Pembayaran <span class="text-red-500">*</span>
                            </label>

                            <div class="relative border-2 border-dashed border-gray-300 rounded-xl p-6 text-center hover:border-[#A61E22] transition-colors cursor-pointer bg-gray-50"
                                id="dropzone">
                                <input type="file" name="payment_proof" id="payment_proof" class="hidden"
                                    accept="image/*,.pdf" required onchange="handleFileSelect(event)">

                                <div id="upload-placeholder">
                                    <svg class="mx-auto h-12 w-12 text-gray-400 mb-3" stroke="currentColor"
                                        fill="none" viewBox="0 0 48 48">
                                        <path
                                            d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                    <p class="text-sm text-gray-600 mb-1">
                                        <span class="font-semibold text-[#A61E22]">Klik untuk upload</span> atau drag &
                                        drop
                                    </p>
                                    <p class="text-xs text-gray-500">PNG, JPG, JPEG atau PDF (Max. 5MB)</p>
                                </div>

                                <div id="file-preview" class="hidden">
                                    <div class="flex items-center justify-center space-x-3">
                                        <svg class="h-10 w-10 text-green-500" fill="currentColor"
                                            viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        <div class="text-left">
                                            <p class="text-sm font-semibold text-gray-800" id="file-name"></p>
                                            <p class="text-xs text-gray-500" id="file-size"></p>
                                        </div>
                                        <button type="button" onclick="removeFile()"
                                            class="text-red-500 hover:text-red-700">
                                            <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd"
                                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>

                            @error('payment_proof')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                            @error('ticket_id')
                                <p class="text-red-500 text-xs mt-1">Silakan pilih tiket terlebih dahulu.</p>
                            @enderror
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" id="submitBtn" disabled
                            class="w-full bg-gradient-to-br from-[#A61E22] to-[#8a1a1e] text-white font-bold py-4 rounded-xl transition-all duration-300 hover:scale-[1.02] hover:shadow-[0_10px_25px_rgba(166,30,34,0.4)] flex items-center justify-center disabled:opacity-50 disabled:cursor-not-allowed">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            Kirim Bukti Pembayaran
                        </button>
                    </form>
                </div>
            @endif

            <!-- STATUS TIKET (jika sudah ada tiket) -->
            @if (isset($ticket))
                <div
                    class="max-w-md mx-auto bg-white rounded-3xl shadow-[0_20px_50px_rgba(0,0,0,0.1)] overflow-hidden border border-gray-100">
                    <div
                        class="relative p-6 text-white @if ($ticket->status_acc === true) bg-gradient-to-br from-green-500 to-green-600 @elseif($ticket->status_acc === false) bg-gradient-to-br from-red-500 to-red-600 @else bg-gradient-to-br from-amber-400 to-orange-500 @endif">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm opacity-80 uppercase tracking-wider font-semibold">Status Tiket</p>
                                <h3 class="text-2xl font-black">
                                    @if ($ticket->status_acc === true)
                                        Verified
                                    @elseif($ticket->status_acc === false)
                                        Rejected
                                    @else
                                        Pending Review
                                    @endif
                                </h3>
                                <p class="text-xs mt-1 bg-white/20 inline-block px-2 py-0.5 rounded">
                                    {{ $ticket->ticket->name ?? 'Unknown Ticket' }}</p>
                            </div>
                            @if ($ticket->status_acc === true)
                                <div class="bg-white/20 p-2 rounded-full backdrop-blur-md">
                                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                            d="M5 13l4 4L19 7" />
                                    </svg>
                                </div>
                            @elseif($ticket->status_acc === false)
                                <div class="bg-white/20 p-2 rounded-full backdrop-blur-md">
                                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                            d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </div>
                            @else
                                <div class="bg-white/20 p-2 rounded-full backdrop-blur-md animate-pulse">
                                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="p-8">
                        @if ($ticket->status_acc === true)
                            {{-- Approved status message or similar --}}
                        @elseif($ticket->status_acc === false)
                            <div class="text-center mb-6">
                                <p class="text-red-500 font-bold mb-2">Pembayaran Ditolak</p>
                                <p class="text-gray-500 text-sm leading-relaxed">
                                    Mohon maaf, bukti pembayaran Kamu tidak valid atau tidak sesuai. Silakan
                                    <span class="font-bold text-gray-700">unggah ulang bukti pembayaran yang
                                        benar</span>
                                    melalui form di bawah ini.
                                </p>
                            </div>
                        @else
                            <div class="text-center mb-6">
                                <p class="text-gray-500 text-sm leading-relaxed">
                                    Bukti pembayaran Anda sedang kami cek. Proses verifikasi biasanya memakan waktu
                                    <span class="font-bold text-gray-700">maksimal 24 jam</span>.
                                </p>
                            </div>
                        @endif

                        @if ($ticket->status_acc && $ticket->ticket->link)
                            <div class="mb-6">
                                <a href="{{ $ticket->ticket->link }}" target="_blank"
                                    class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-4 rounded-xl transition-all duration-300 flex items-center justify-center shadow-lg hover:shadow-blue-500/30">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                                    </svg>
                                    Masuk ke Link Tiket
                                </a>
                            </div>
                        @endif

                        <div class="space-y-6">
                            <div class="grid grid-cols-2 gap-6 py-4 border-y border-dashed border-gray-200">
                                <div class="space-y-1">
                                    <p class="text-[10px] uppercase font-bold text-gray-400 tracking-widest">Nomor
                                        Tiket</p>
                                    <p class="font-mono font-bold text-gray-800">
                                        {{ $ticket->code ?? 'TCK-' . str_pad($ticket->id, 6, '0', STR_PAD_LEFT) }}
                                    </p>
                                </div>
                                <div class="space-y-1 text-right">
                                    <p class="text-[10px] uppercase font-bold text-gray-400 tracking-widest">Type</p>
                                    <p class="font-bold text-gray-800">
                                        {{ $ticket->ticket->name ?? '-' }}
                                    </p>
                                </div>
                                <div class="space-y-1">
                                    <p class="text-[10px] uppercase font-bold text-gray-400 tracking-widest">Tanggal
                                        Beli</p>
                                    <p class="font-bold text-gray-800">
                                        {{ \Carbon\Carbon::parse($ticket->created_at)->format('d M Y') }}
                                    </p>
                                </div>
                            </div>

                            @if ($ticket->status_acc)
                                <div class="flex flex-col items-center justify-center space-y-4">
                                    <div class="p-4 bg-gray-50 rounded-2xl border-2 border-gray-100 shadow-inner">
                                        {!! QrCode::size(160)->margin(1)->generate($ticket->token) !!}
                                    </div>
                                    <p class="text-[10px] text-gray-400 font-medium">SIMPAN QR INI, KARENA QR INI AKAN
                                        DI CEK PADA HARI ACARA</p>
                                </div>
                            @else
                                <div
                                    class="flex flex-col items-center justify-center p-8 bg-gray-50 rounded-3xl border border-dashed border-gray-300">
                                    <div
                                        class="w-16 h-16 bg-gray-200 rounded-full mb-4 flex items-center justify-center text-gray-400">
                                        <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                    <p class="text-xs font-bold text-gray-400 uppercase tracking-widest">QR Code Locked
                                    </p>
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="bg-gray-50 px-8 py-4 flex justify-between items-center overflow-hidden relative">
                        <div class="w-6 h-6 bg-white absolute -left-3 rounded-full shadow-inner"></div>
                        <div class="w-full border-t border-gray-200 border-dashed"></div>
                        <div class="w-6 h-6 bg-white absolute -right-3 rounded-full shadow-inner"></div>
                    </div>
                </div>
            @endif
        </div>
    </div>

    @push('scripts')
        <script>
            function validateForm() {
                const ticketId = document.getElementById('ticket_id').value;
                const fileInput = document.getElementById('payment_proof');
                const hasFile = fileInput.files && fileInput.files.length > 0;

                document.getElementById('submitBtn').disabled = !(ticketId && hasFile);
            }

            // Ticket Selection Logic
            function selectTicket(radio) {
                // Remove selected styling from all
                document.querySelectorAll('.ticket-option').forEach(el => {
                    el.classList.remove('border-[#A61E22]', 'bg-red-50');
                    el.querySelector('.check-circle div').classList.add('hidden');
                    el.querySelector('.check-circle').classList.remove('border-[#A61E22]', 'bg-white');
                    el.querySelector('.check-circle').classList.add('border-gray-300');
                });

                // Add styling to selected
                const label = radio.closest('label');
                label.classList.add('border-[#A61E22]', 'bg-red-50');
                label.querySelector('.check-circle div').classList.remove('hidden');
                label.querySelector('.check-circle').classList.remove('border-gray-300');
                label.querySelector('.check-circle').classList.add('border-[#A61E22]', 'bg-white');

                // Update Display Price
                const price = label.getAttribute('data-price');
                const formattedPrice = new Intl.NumberFormat('id-ID', {
                    style: 'currency',
                    currency: 'IDR'
                }).format(price);
                const cleanPrice = formattedPrice.replace(/,00$/, ''); // Clean trailing zeros
                document.getElementById('display-price').textContent = cleanPrice;

                // Update Bank Details
                const ticket = JSON.parse(label.getAttribute('data-ticket'));
                document.getElementById('bank-name').textContent = ticket.bank_name || '-';
                document.getElementById('account-number').textContent = ticket.account_number || '-';
                document.getElementById('account-name').textContent = ticket.account_name || '-';

                // Update QR Image
                const qrContainer = document.getElementById('qr-container');
                const qrImage = document.getElementById('qr-image');

                if (ticket.qr_image) {
                    qrImage.src = "{{ asset('storage') }}/" + ticket.qr_image;
                    qrContainer.classList.remove('hidden');
                } else {
                    qrContainer.classList.add('hidden');
                }

                // Update Hidden Input
                document.getElementById('ticket_id').value = radio.value;
                validateForm();
            }

            function copyToClipboard() {
                const text = document.getElementById('account-number').textContent;
                navigator.clipboard.writeText(text).then(() => {
                    alert('Nomor rekening berhasil disalin!');
                });
            }
            // Drag and drop functionality
            const dropzone = document.getElementById('dropzone');
            const fileInput = document.getElementById('payment_proof');

            dropzone.addEventListener('click', () => fileInput.click());

            dropzone.addEventListener('dragover', (e) => {
                e.preventDefault();
                dropzone.classList.add('border-[#A61E22]', 'bg-red-50');
            });

            dropzone.addEventListener('dragleave', () => {
                dropzone.classList.remove('border-[#A61E22]', 'bg-red-50');
            });

            dropzone.addEventListener('drop', (e) => {
                e.preventDefault();
                dropzone.classList.remove('border-[#A61E22]', 'bg-red-50');

                const files = e.dataTransfer.files;
                if (files.length > 0) {
                    fileInput.files = files;
                    handleFileSelect({
                        target: {
                            files
                        }
                    });
                }
            });

            function handleFileSelect(event) {
                const file = event.target.files[0];
                if (file) {
                    // Validasi ukuran file (max 5MB)
                    if (file.size > 5 * 1024 * 1024) {
                        alert('Ukuran file terlalu besar. Maksimal 5MB.');
                        fileInput.value = '';
                        validateForm();
                        return;
                    }

                    // Tampilkan preview
                    document.getElementById('upload-placeholder').classList.add('hidden');
                    document.getElementById('file-preview').classList.remove('hidden');
                    document.getElementById('file-name').textContent = file.name;
                    document.getElementById('file-size').textContent = formatFileSize(file.size);
                    validateForm();
                }
            }

            function removeFile() {
                fileInput.value = '';
                document.getElementById('upload-placeholder').classList.remove('hidden');
                document.getElementById('file-preview').classList.add('hidden');
                validateForm();
            }

            function formatFileSize(bytes) {
                if (bytes === 0) return '0 Bytes';
                const k = 1024;
                const sizes = ['Bytes', 'KB', 'MB'];
                const i = Math.floor(Math.log(bytes) / Math.log(k));
                return Math.round(bytes / Math.pow(k, i) * 100) / 100 + ' ' + sizes[i];
            }

            const submitBtn = document.getElementById('submitBtn');
            const uploadForm = document.getElementById('uploadForm');

            if (uploadForm) {
                uploadForm.addEventListener('submit', function(e) {
                    const ticketId = document.getElementById('ticket_id').value;
                    if (!ticketId) {
                        e.preventDefault();
                        alert('Silakan pilih jenis tiket terlebih dahulu!');
                        return false;
                    }
                });
            }

            function copyToClipboard(text) {
                navigator.clipboard.writeText(text).then(() => {
                    alert('Nomor rekening berhasil disalin!');
                });
            }
        </script>
    @endpush
</x-layout.app>
