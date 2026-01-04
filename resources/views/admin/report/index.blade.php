@extends('admin.layouts.app')

@section('title', 'Sales Report')

@section('content')
    <div class="mb-8">
        <h1 class="text-2xl font-bold text-gray-100">Sales Report</h1>
        <p class="text-gray-400 mt-1">Overview of ticket and merchandise sales</p>
    </div>

    <!-- Total Summary -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
        <div class="bg-gradient-to-br from-green-600 to-green-800 rounded-xl p-6 shadow-lg">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-green-200 text-sm font-medium">Total Revenue</p>
                    <p class="text-3xl font-bold text-white mt-2">Rp {{ number_format($totalRevenue, 0, ',', '.') }}</p>
                </div>
                <div class="w-14 h-14 bg-green-500/30 rounded-lg flex items-center justify-center">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                        </path>
                    </svg>
                </div>
            </div>
        </div>
        <div class="bg-gradient-to-br from-blue-600 to-blue-800 rounded-xl p-6 shadow-lg">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-blue-200 text-sm font-medium">Total Sales</p>
                    <p class="text-3xl font-bold text-white mt-2">{{ $totalSales }} transaksi</p>
                </div>
                <div class="w-14 h-14 bg-blue-500/30 rounded-lg flex items-center justify-center">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z">
                        </path>
                    </svg>
                </div>
            </div>
        </div>
    </div>

    <!-- Breakdown -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
        <!-- Ticket Sales -->
        <div class="bg-gray-800 rounded-xl p-6 border border-gray-700">
            <h2 class="text-lg font-semibold text-gray-100 mb-4 flex items-center gap-2">
                <svg class="w-5 h-5 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z">
                    </path>
                </svg>
                Ticket Sales
            </h2>
            <div class="space-y-4">
                <div class="flex justify-between items-center py-2 border-b border-gray-700">
                    <span class="text-gray-400">Total Penjualan</span>
                    <span class="text-gray-100 font-semibold">{{ $ticketStats['total_sales'] }} tiket</span>
                </div>
                <div class="flex justify-between items-center py-2 border-b border-gray-700">
                    <span class="text-gray-400">Total Pendapatan</span>
                    <span class="text-green-400 font-semibold">Rp
                        {{ number_format($ticketStats['total_revenue'], 0, ',', '.') }}</span>
                </div>
                <div class="flex justify-between items-center py-2 border-b border-gray-700">
                    <span class="text-gray-400">Menunggu Approval</span>
                    <span class="text-yellow-400 font-semibold">{{ $ticketStats['pending_count'] }}</span>
                </div>
                <div class="flex justify-between items-center py-2">
                    <span class="text-gray-400">Sudah Di-scan</span>
                    <span class="text-blue-400 font-semibold">{{ $ticketStats['claimed_count'] }}</span>
                </div>
            </div>
        </div>

        <!-- Merchandise Sales -->
        <div class="bg-gray-800 rounded-xl p-6 border border-gray-700">
            <h2 class="text-lg font-semibold text-gray-100 mb-4 flex items-center gap-2">
                <svg class="w-5 h-5 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                </svg>
                Merchandise Sales
            </h2>
            <div class="space-y-4">
                <div class="flex justify-between items-center py-2 border-b border-gray-700">
                    <span class="text-gray-400">Total Penjualan</span>
                    <span class="text-gray-100 font-semibold">{{ $merchandiseStats['total_sales'] }} item</span>
                </div>
                <div class="flex justify-between items-center py-2 border-b border-gray-700">
                    <span class="text-gray-400">Total Pendapatan</span>
                    <span class="text-green-400 font-semibold">Rp
                        {{ number_format($merchandiseStats['total_revenue'], 0, ',', '.') }}</span>
                </div>
                <div class="flex justify-between items-center py-2 border-b border-gray-700">
                    <span class="text-gray-400">Menunggu Approval</span>
                    <span class="text-yellow-400 font-semibold">{{ $merchandiseStats['pending_count'] }}</span>
                </div>
                <div class="flex justify-between items-center py-2">
                    <span class="text-gray-400">Sudah Diambil</span>
                    <span class="text-blue-400 font-semibold">{{ $merchandiseStats['claimed_count'] }}</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Top Products -->
    <div class="bg-gray-800 rounded-xl p-6 border border-gray-700">
        <h2 class="text-lg font-semibold text-gray-100 mb-4">Top Products</h2>
        <div class="overflow-x-auto">
            <table class="w-full whitespace-nowrap">
                <thead class="bg-gray-700/50">
                    <tr>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-gray-300 uppercase">#</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-gray-300 uppercase">Product</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-gray-300 uppercase">Price</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-gray-300 uppercase">Sold</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-gray-300 uppercase">Revenue</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-700">
                    @foreach ($topProducts as $index => $product)
                        <tr>
                            <td class="px-4 py-3 text-gray-400">{{ $index + 1 }}</td>
                            <td class="px-4 py-3 text-gray-100 font-medium">{{ $product->name_product }}</td>
                            <td class="px-4 py-3 text-gray-400">Rp {{ number_format($product->price, 0, ',', '.') }}</td>
                            <td class="px-4 py-3 text-indigo-400 font-semibold">{{ $product->buyers_count }}</td>
                            <td class="px-4 py-3 text-green-400">Rp
                                {{ number_format($product->price * $product->buyers_count, 0, ',', '.') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
