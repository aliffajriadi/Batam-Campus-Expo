@extends('admin.layouts.app')

@section('title', 'Scan Merchandise')

@section('content')
    <div class="mb-8">
        <h1 class="text-2xl font-bold text-gray-100">Scan Merchandise</h1>
        <p class="text-gray-400 mt-1">Verifikasi pengambilan merchandise dengan ID pembelian</p>
    </div>

    <div class="max-w-xl mx-auto">
        <div class="bg-gray-800 rounded-xl p-8 border border-gray-700">
            <div class="text-center mb-6">
                <div class="w-20 h-20 bg-purple-600 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                    </svg>
                </div>
                <h2 class="text-xl font-semibold text-gray-100">Masukkan ID Merchandise</h2>
                <p class="text-gray-400 text-sm mt-1">Input ID pembelian merchandise untuk verifikasi pengambilan</p>
            </div>

            <form action="{{ route('admin.report.verify-merchandise') }}" method="POST" class="space-y-6">
                @csrf

                <div>
                    <label for="purchase_id" class="block text-sm font-medium text-gray-300 mb-2">ID Pembelian
                        Merchandise</label>
                    <input type="number" name="purchase_id" id="purchase_id"
                        class="w-full px-4 py-4 bg-gray-700 border border-gray-600 rounded-lg text-gray-100 text-2xl text-center focus:outline-none focus:ring-2 focus:ring-purple-500"
                        placeholder="Contoh: 456" required autofocus>
                </div>

                <button type="submit"
                    class="w-full py-4 bg-purple-600 hover:bg-purple-700 text-white font-semibold rounded-lg transition text-lg">
                    Verifikasi Pengambilan
                </button>
            </form>
        </div>

        <div class="mt-6 text-center">
            <a href="{{ route('admin.merchandise.buyers') }}" class="text-purple-400 hover:text-purple-300 transition">
                Lihat Daftar Semua Pembelian →
            </a>
        </div>
    </div>
@endsection
