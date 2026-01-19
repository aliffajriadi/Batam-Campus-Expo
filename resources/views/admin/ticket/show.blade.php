@extends('admin.layouts.app')

@section('title', 'Ticket Details')

@section('content')
    <div class="mb-8">
        <a href="{{ route('admin.ticket.index') }}"
            class="text-indigo-400 hover:text-indigo-300 transition flex items-center gap-2 mb-4">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
            </svg>
            Back to Tickets
        </a>
        <h1 class="text-2xl font-bold text-gray-100">Ticket Purchase Details</h1>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <!-- Buyer Info -->
        <div class="bg-gray-800 rounded-xl p-6 border border-gray-700">
            <h2 class="text-lg font-semibold text-gray-100 mb-4">Buyer Information</h2>
            <div class="space-y-4">
                <div class="flex items-center gap-4">
                    @if ($buyer->user && $buyer->user->photo)
                        <img src="{{ $buyer->user->photo }}" class="w-16 h-16 rounded-full object-cover" alt="">
                    @else
                        <div class="w-16 h-16 bg-gray-600 rounded-full flex items-center justify-center">
                            <span
                                class="text-xl text-gray-300">{{ strtoupper(substr($buyer->user->name ?? 'U', 0, 1)) }}</span>
                        </div>
                    @endif
                    <div>
                        <p class="text-xl font-semibold text-gray-100">{{ $buyer->user->name ?? 'Unknown' }}</p>
                        <p class="text-gray-400">{{ $buyer->user->email ?? '-' }}</p>
                    </div>
                </div>
                <div class="border-t border-gray-700 pt-4 space-y-2">
                    <div class="flex justify-between">
                        <span class="text-gray-400">Total Price</span>
                        <span class="text-gray-100 font-medium">Rp
                            {{ number_format($buyer->total_price, 0, ',', '.') }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-400">Purchase Date</span>
                        <span class="text-gray-100">{{ $buyer->created_at }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-400">Status</span>
                        @if (!$buyer->done_check)
                            <span
                                class="px-3 py-1 bg-yellow-900/50 text-yellow-300 rounded-full text-xs font-medium">Pending</span>
                        @elseif($buyer->status_acc)
                            <span
                                class="px-3 py-1 bg-green-900/50 text-green-300 rounded-full text-xs font-medium">Approved</span>
                        @else
                            <span
                                class="px-3 py-1 bg-red-900/50 text-red-300 rounded-full text-xs font-medium">Rejected</span>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <!-- Transfer Proof -->
        <div class="bg-gray-800 rounded-xl p-6 border border-gray-700">
            <h2 class="text-lg font-semibold text-gray-100 mb-4">Transfer Proof</h2>
            @if ($buyer->photo_transfer)
                <img src="{{ asset('images/payment_proof/' . $buyer->photo_transfer) }}"
                    class="w-full max-h-96 object-contain rounded-lg bg-gray-900" alt="Transfer Proof">
            @else
                <div class="h-48 bg-gray-700 rounded-lg flex items-center justify-center">
                    <p class="text-gray-400">No transfer proof uploaded</p>
                </div>
            @endif
        </div>
    </div>

    <!-- Actions -->
    <div class="mt-6">
        <h3 class="text-sm font-medium text-gray-300 mb-3">Ubah Status</h3>
        <div class="flex flex-wrap gap-4">
            <form action="{{ route('admin.ticket.approve', $buyer->id) }}" method="POST">
                @csrf
                <button type="submit"
                    class="px-6 py-3 {{ $buyer->status_acc && $buyer->done_check ? 'bg-green-800' : 'bg-green-600 hover:bg-green-700' }} text-white font-semibold rounded-lg transition flex items-center gap-2">
                    @if ($buyer->status_acc && $buyer->done_check)
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                clip-rule="evenodd"></path>
                        </svg>
                    @endif
                    Approve
                </button>
            </form>
            <form action="{{ route('admin.ticket.reject', $buyer->id) }}" method="POST">
                @csrf
                <button type="submit"
                    class="px-6 py-3 {{ !$buyer->status_acc && $buyer->done_check ? 'bg-red-800' : 'bg-red-600 hover:bg-red-700' }} text-white font-semibold rounded-lg transition flex items-center gap-2">
                    @if (!$buyer->status_acc && $buyer->done_check)
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                clip-rule="evenodd"></path>
                        </svg>
                    @endif
                    Reject
                </button>
            </form>

            <button type="button" onclick="openDeleteModal()"
                class="px-6 py-3 bg-gray-700 hover:bg-red-600 text-gray-300 hover:text-white font-semibold rounded-lg transition flex items-center gap-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                    </path>
                </svg>
                Hapus Data
            </button>

            @if ($buyer->status_acc)
                <form action="{{ route('admin.ticket.toggle-check', $buyer->id) }}" method="POST">
                    @csrf
                    <button type="submit"
                        class="px-6 py-3 {{ $buyer->done_check ? 'bg-amber-600 hover:bg-amber-700' : 'bg-blue-600 hover:bg-blue-700' }} text-white font-semibold rounded-lg transition flex items-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            @if ($buyer->done_check)
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            @else
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            @endif
                        </svg>
                        {{ $buyer->done_check ? 'Mark Unchecked' : 'Mark Checked-in' }}
                    </button>
                </form>
            @endif
        </div>
        @if ($buyer->done_check)
            <p class="text-gray-500 text-sm mt-2">Terakhir diubah: {{ $buyer->check_at }}</p>
        @endif
    </div>

    <!-- Delete Confirmation Modal -->
    <div id="deleteModal" class="hidden fixed inset-0 bg-black/50 z-50 p-4">
        <div class="flex items-center justify-center min-h-full">
            <div class="bg-gray-800 rounded-xl border border-gray-700 max-w-md w-full p-6">
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-12 h-12 bg-red-900/50 rounded-full flex items-center justify-center">
                        <svg class="w-6 h-6 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z">
                            </path>
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-lg font-semibold text-gray-100">Konfirmasi Penghapusan</h3>
                        <p class="text-sm text-gray-400">Tindakan ini tidak dapat dibatalkan</p>
                    </div>
                </div>

                <p class="text-gray-300 mb-4">
                    Anda akan menghapus data pembeli: <span
                        class="font-semibold text-white">{{ $buyer->user->name ?? 'Unknown' }}</span>
                </p>

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-400 mb-2">
                        Ketik <span class="text-red-400 font-bold">KONFIRMASI</span> untuk melanjutkan:
                    </label>
                    <input type="text" id="confirmInput"
                        class="w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-lg text-gray-100 focus:outline-none focus:ring-2 focus:ring-red-500"
                        placeholder="Ketik KONFIRMASI">
                    <p id="errorMsg" class="text-red-400 text-sm mt-1 hidden">Teks konfirmasi tidak sesuai</p>
                </div>

                <div class="flex gap-3">
                    <button type="button" onclick="closeDeleteModal()"
                        class="flex-1 px-4 py-2 bg-gray-700 hover:bg-gray-600 text-white rounded-lg transition">
                        Batal
                    </button>
                    <button type="button" onclick="confirmDelete()"
                        class="flex-1 px-4 py-2 bg-red-600 hover:bg-red-700 text-white rounded-lg transition">
                        Hapus Data
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Hidden form for deletion -->
    <form id="deleteForm" action="{{ route('admin.ticket.destroy', $buyer->id) }}" method="POST"
        style="display: none;">
        @csrf
        @method('DELETE')
    </form>

    <script>
        function openDeleteModal() {
            document.getElementById('confirmInput').value = '';
            document.getElementById('errorMsg').classList.add('hidden');
            document.getElementById('deleteModal').classList.remove('hidden');
            document.getElementById('confirmInput').focus();
        }

        function closeDeleteModal() {
            document.getElementById('deleteModal').classList.add('hidden');
        }

        function confirmDelete() {
            const input = document.getElementById('confirmInput').value;
            const errorMsg = document.getElementById('errorMsg');

            if (input === 'KONFIRMASI') {
                document.getElementById('deleteForm').submit();
            } else {
                errorMsg.classList.remove('hidden');
                document.getElementById('confirmInput').classList.add('border-red-500');
            }
        }

        // Allow Enter key to submit
        document.getElementById('confirmInput').addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                confirmDelete();
            }
        });

        // Clear error on input
        document.getElementById('confirmInput').addEventListener('input', function() {
            document.getElementById('errorMsg').classList.add('hidden');
            this.classList.remove('border-red-500');
        });

        // Close modal on Escape key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                closeDeleteModal();
            }
        });
    </script>
@endsection
