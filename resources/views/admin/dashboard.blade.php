@extends('admin.layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div class="mb-8">
        <h1 class="text-2xl font-bold text-gray-100">Dashboard</h1>
        <p class="text-gray-400 mt-1">Welcome back, {{ session('admin_username', 'Admin') }}</p>
    </div>

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <!-- Total Users -->
        <div class="bg-gradient-to-br from-blue-600 to-blue-800 rounded-xl p-6 shadow-lg">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-blue-200 text-sm font-medium">Total Users</p>
                    <p class="text-3xl font-bold text-white mt-2">{{ $stats['total_users'] }}</p>
                </div>
                <div class="w-12 h-12 bg-blue-500/30 rounded-lg flex items-center justify-center">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z">
                        </path>
                    </svg>
                </div>
            </div>
        </div>

        <!-- Ticket Buyers -->
        <div class="bg-gradient-to-br from-emerald-600 to-emerald-800 rounded-xl p-6 shadow-lg">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-emerald-200 text-sm font-medium">Ticket Buyers</p>
                    <p class="text-3xl font-bold text-white mt-2">{{ $stats['total_ticket_buyers'] }}</p>
                </div>
                <div class="w-12 h-12 bg-emerald-500/30 rounded-lg flex items-center justify-center">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z">
                        </path>
                    </svg>
                </div>
            </div>
        </div>

        <!-- Merchandise Buyers -->
        <div class="bg-gradient-to-br from-purple-600 to-purple-800 rounded-xl p-6 shadow-lg">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-purple-200 text-sm font-medium">Merchandise Buyers</p>
                    <p class="text-3xl font-bold text-white mt-2">{{ $stats['total_merchandise_buyers'] }}</p>
                </div>
                <div class="w-12 h-12 bg-purple-500/30 rounded-lg flex items-center justify-center">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                    </svg>
                </div>
            </div>
        </div>

        <!-- Total Revenue -->
        <div class="bg-gradient-to-br from-amber-600 to-amber-800 rounded-xl p-6 shadow-lg">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-amber-200 text-sm font-medium">Total Revenue</p>
                    <p class="text-3xl font-bold text-white mt-2">Rp
                        {{ number_format($stats['total_revenue'], 0, ',', '.') }}</p>
                </div>
                <div class="w-12 h-12 bg-amber-500/30 rounded-lg flex items-center justify-center">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                        </path>
                    </svg>
                </div>
            </div>
        </div>
    </div>

    <!-- Charts Section -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
        <!-- Sales & Revenue Chart -->
        <div class="bg-gray-800 rounded-xl p-6 border border-gray-700">
            <h2 class="text-lg font-semibold text-gray-100 mb-4">Sales & Revenue (Last 7 Days)</h2>
            <canvas id="salesChart"></canvas>
        </div>

        <!-- Ticket Type Distribution -->
        <div class="bg-gray-800 rounded-xl p-6 border border-gray-700">
            <h2 class="text-lg font-semibold text-gray-100 mb-4">Ticket Type Distribution</h2>
            <div class="h-64 flex justify-center">
                <canvas id="ticketTypeChart"></canvas>
            </div>
        </div>
    </div>

    <!-- Pending Items -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
        <!-- Pending Tickets -->
        <div class="bg-gray-800 rounded-xl p-6 border border-gray-700">
            <div class="flex items-center justify-between mb-4">
                <h2 class="text-lg font-semibold text-gray-100">Pending Tickets</h2>
                <span class="px-3 py-1 bg-yellow-900/50 text-yellow-300 rounded-full text-sm font-medium">
                    {{ $stats['pending_tickets'] }} pending
                </span>
            </div>
            <p class="text-gray-400 text-sm mb-4">Ticket purchases waiting for approval</p>
            <a href="{{ route('admin.ticket.index') }}"
                class="inline-flex items-center gap-2 text-indigo-400 hover:text-indigo-300 transition">
                View all tickets
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
            </a>
        </div>

        <!-- Pending Merchandise -->
        <div class="bg-gray-800 rounded-xl p-6 border border-gray-700">
            <div class="flex items-center justify-between mb-4">
                <h2 class="text-lg font-semibold text-gray-100">Pending Merchandise</h2>
                <span class="px-3 py-1 bg-yellow-900/50 text-yellow-300 rounded-full text-sm font-medium">
                    {{ $stats['pending_merchandise'] }} pending
                </span>
            </div>
            <p class="text-gray-400 text-sm mb-4">Merchandise purchases waiting for approval</p>
            <a href="{{ route('admin.merchandise.buyers') }}"
                class="inline-flex items-center gap-2 text-indigo-400 hover:text-indigo-300 transition">
                View all purchases
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
            </a>
        </div>
    </div>

    <!-- School Statistics -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <!-- Top Schools (Registration) -->
        <div class="bg-gray-800 rounded-xl p-6 border border-gray-700">
            <h2 class="text-lg font-semibold text-gray-100 mb-4">Top 5 Schools (Registrations)</h2>
            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left text-gray-400">
                    <thead class="text-xs text-gray-400 uppercase bg-gray-700/50">
                        <tr>
                            <th scope="col" class="px-4 py-3 rounded-l-lg">School Name</th>
                            <th scope="col" class="px-4 py-3 rounded-r-lg text-right">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($stats['top_schools_register'] as $school)
                            <tr class="border-b border-gray-700 last:border-0 hover:bg-gray-700/30 transition">
                                <td class="px-4 py-3 font-medium text-white">{{ $school->asal_sekolah }}</td>
                                <td class="px-4 py-3 text-right">{{ $school->total }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="2" class="px-4 py-3 text-center">No data available</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Top Schools (Ticket Sales) -->
        <div class="bg-gray-800 rounded-xl p-6 border border-gray-700">
            <h2 class="text-lg font-semibold text-gray-100 mb-4">Top 5 Schools (Ticket Sales)</h2>
            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left text-gray-400">
                    <thead class="text-xs text-gray-400 uppercase bg-gray-700/50">
                        <tr>
                            <th scope="col" class="px-4 py-3 rounded-l-lg">School Name</th>
                            <th scope="col" class="px-4 py-3 rounded-r-lg text-right">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($stats['top_schools_buy'] as $school)
                            <tr class="border-b border-gray-700 last:border-0 hover:bg-gray-700/30 transition">
                                <td class="px-4 py-3 font-medium text-white">{{ $school->asal_sekolah }}</td>
                                <td class="px-4 py-3 text-right">{{ $school->total }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="2" class="px-4 py-3 text-center">No data available</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Sales & Revenue Chart
        const ctxSales = document.getElementById('salesChart').getContext('2d');
        new Chart(ctxSales, {
            type: 'line',
            data: {
                labels: {!! json_encode($stats['chart_labels']) !!},
                datasets: [{
                    label: 'Tickets Sold',
                    data: {!! json_encode($stats['chart_ticket_data']) !!},
                    borderColor: '#10B981', // Emerald 500
                    backgroundColor: 'rgba(16, 185, 129, 0.1)',
                    yAxisID: 'y',
                    tension: 0.4
                }, {
                    label: 'Revenue',
                    data: {!! json_encode($stats['chart_revenue_data']) !!},
                    borderColor: '#F59E0B', // Amber 500
                    backgroundColor: 'rgba(245, 158, 11, 0.1)',
                    yAxisID: 'y1',
                    tension: 0.4
                }]
            },
            options: {
                responsive: true,
                interaction: {
                    mode: 'index',
                    intersect: false,
                },
                scales: {
                    y: {
                        type: 'linear',
                        display: true,
                        position: 'left',
                        grid: {
                            color: '#374151' // Gray 700
                        },
                        ticks: {
                            color: '#9CA3AF' // Gray 400
                        }
                    },
                    y1: {
                        type: 'linear',
                        display: true,
                        position: 'right',
                        grid: {
                            drawOnChartArea: false,
                        },
                        ticks: {
                            color: '#9CA3AF',
                            callback: function(value) {
                                return 'Rp ' + new Intl.NumberFormat('id-ID').format(value);
                            }
                        }
                    },
                    x: {
                        grid: {
                            color: '#374151'
                        },
                        ticks: {
                            color: '#9CA3AF'
                        }
                    }
                },
                plugins: {
                    legend: {
                        labels: {
                            color: '#D1D5DB' // Gray 300
                        }
                    }
                }
            }
        });

        // Ticket Type Distribution Chart
        const ctxPie = document.getElementById('ticketTypeChart').getContext('2d');
        new Chart(ctxPie, {
            type: 'doughnut',
            data: {
                labels: {!! json_encode($stats['pie_labels']) !!},
                datasets: [{
                    data: {!! json_encode($stats['pie_data']) !!},
                    backgroundColor: [
                        '#3B82F6', // Blue 500
                        '#8B5CF6', // Violet 500
                        '#EC4899', // Pink 500
                        '#10B981', // Emerald 500
                        '#F59E0B', // Amber 500
                    ],
                    borderWidth: 0
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'right',
                        labels: {
                            color: '#D1D5DB'
                        }
                    }
                }
            }
        });
    </script>
@endpush
