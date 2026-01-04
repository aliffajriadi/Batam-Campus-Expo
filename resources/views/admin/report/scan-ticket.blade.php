@extends('admin.layouts.app')

@section('title', 'Scan Ticket')

@section('content')
    <div class="mb-8">
        <h1 class="text-2xl font-bold text-gray-100">Scan Ticket</h1>
        <p class="text-gray-400 mt-1">Verifikasi tiket dengan ID pembelian</p>
    </div>

    <div class="max-w-xl mx-auto">
        <div class="bg-gray-800 rounded-xl p-8 border border-gray-700">
            <div class="text-center mb-6">
                <div class="w-20 h-20 bg-indigo-600 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 4v1m6 11h2m-6 0h-2v4m0-11v3m0 0h.01M12 12h4.01M16 20h4M4 12h4m12 0h.01M5 8h2a1 1 0 001-1V5a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1zm12 0h2a1 1 0 001-1V5a1 1 0 00-1-1h-2a1 1 0 00-1 1v2a1 1 0 001 1zM5 20h2a1 1 0 001-1v-2a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1z">
                        </path>
                    </svg>
                </div>
                <h2 class="text-xl font-semibold text-gray-100">Masukkan ID Tiket</h2>
                <p class="text-gray-400 text-sm mt-1">Input ID pembelian tiket untuk verifikasi</p>
            </div>

            <form action="{{ route('admin.report.verify-ticket') }}" method="POST" class="space-y-6">
                @csrf

                <div>
                    <label for="purchase_id" class="block text-sm font-medium text-gray-300 mb-2">ID Pembelian Tiket</label>
                    <input type="number" name="purchase_id" id="purchase_id"
                        class="w-full px-4 py-4 bg-gray-700 border border-gray-600 rounded-lg text-gray-100 text-2xl text-center focus:outline-none focus:ring-2 focus:ring-indigo-500"
                        placeholder="Contoh: 123" required autofocus>
                </div>

                <button type="submit"
                    class="w-full py-4 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold rounded-lg transition text-lg">
                    Verifikasi Tiket
                </button>
            </form>
        </div>

        <!-- Recent Scans could go here -->
        <div class="mt-6 text-center">
            <a href="{{ route('admin.ticket.index') }}" class="text-indigo-400 hover:text-indigo-300 transition">
                Lihat Daftar Semua Tiket →
            </a>
        </div>
    </div>
@endsection
