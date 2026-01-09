@extends('admin.layouts.app')

@section('title', 'Ticket Buyers')

@section('content')
    <div class="flex items-center justify-between mb-8">
        <div>
            <h1 class="text-2xl font-bold text-gray-100">Ticket Buyers</h1>
            <p class="text-gray-400 mt-1">Manage ticket purchases and approvals</p>
        </div>
    </div>

    <!-- Search & Filter -->
    <div class="bg-gray-800 rounded-xl p-4 border border-gray-700 mb-6">
        <form action="{{ route('admin.ticket.index') }}" method="GET" class="flex flex-wrap gap-4 items-end">
            <div class="flex-1 min-w-[200px]">
                <label class="block text-sm font-medium text-gray-400 mb-1">Search</label>
                <input type="text" name="search" value="{{ request('search') }}"
                    class="w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-lg text-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                    placeholder="Search by name or email...">
            </div>
            <div class="w-40">
                <label class="block text-sm font-medium text-gray-400 mb-1">Status</label>
                <select name="status"
                    class="w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-lg text-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    <option value="">All</option>
                    <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="approved" {{ request('status') == 'approved' ? 'selected' : '' }}>Approved</option>
                    <option value="rejected" {{ request('status') == 'rejected' ? 'selected' : '' }}>Rejected</option>
                </select>
            </div>
            <button type="submit" class="px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white rounded-lg transition">
                Filter
            </button>
            @if (request('search') || request('status'))
                <a href="{{ route('admin.ticket.index') }}"
                    class="px-4 py-2 bg-gray-600 hover:bg-gray-500 text-white rounded-lg transition">
                    Reset
                </a>
            @endif
        </form>
    </div>

    <div class="bg-gray-800 rounded-xl border border-gray-700 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full whitespace-nowrap">
                <thead class="bg-gray-700/50">
                    <tr>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-300 uppercase tracking-wider">Buyer
                        </th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-300 uppercase tracking-wider">Total
                            Price
                        </th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-300 uppercase tracking-wider">Status
                        </th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-300 uppercase tracking-wider">Diambil
                        </th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-300 uppercase tracking-wider">Date
                        </th>
                        <th class="px-6 py-4 text-right text-xs font-semibold text-gray-300 uppercase tracking-wider">
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-700">
                    @forelse($buyers as $buyer)
                        <tr class="hover:bg-gray-700/30 transition">
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    @if ($buyer->user && $buyer->user->photo)
                                        <img src="{{ $buyer->user->photo }}" class="w-10 h-10 rounded-full object-cover"
                                            alt="">
                                    @else
                                        <div class="w-10 h-10 bg-gray-600 rounded-full flex items-center justify-center">
                                            <span
                                                class="text-sm text-gray-300">{{ strtoupper(substr($buyer->user->name ?? 'U', 0, 1)) }}</span>
                                        </div>
                                    @endif
                                    <div>
                                        <p class="text-gray-100 font-medium">{{ $buyer->user->name ?? 'Unknown' }}</p>
                                        <p class="text-gray-400 text-sm">{{ $buyer->user->email ?? '-' }}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-gray-100">Rp {{ number_format($buyer->total_price, 0, ',', '.') }}
                            </td>
                            <td class="px-6 py-4">
                                @if (is_null($buyer->status_acc))
                                    <span
                                        class="px-3 py-1 bg-yellow-900/50 text-yellow-300 rounded-full text-xs font-medium">Pending</span>
                                @elseif($buyer->status_acc)
                                    <span
                                        class="px-3 py-1 bg-green-900/50 text-green-300 rounded-full text-xs font-medium">Approved</span>
                                @else
                                    <span
                                        class="px-3 py-1 bg-red-900/50 text-red-300 rounded-full text-xs font-medium">Rejected</span>
                                @endif
                            </td>
                            <td class="px-6 py-4">
                                @if ($buyer->status_acc && $buyer->done_check)
                                    <span
                                        class="px-3 py-1 bg-blue-900/50 text-blue-300 rounded-full text-xs font-medium flex items-center gap-1 w-fit">
                                        <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                        Sudah
                                    </span>
                                @elseif($buyer->status_acc)
                                    <span
                                        class="px-3 py-1 bg-gray-700 text-gray-400 rounded-full text-xs font-medium">Belum</span>
                                @else
                                    <span class="text-gray-500">-</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 text-gray-400 text-sm">{{ $buyer->created_at }}</td>
                            <td class="px-6 py-4 text-right flex items-center justify-end gap-3">
                                <a href="{{ route('admin.ticket.show', $buyer->id) }}"
                                    class="text-indigo-400 hover:text-indigo-300 transition text-sm font-medium">
                                    View Details
                                </a>
                                <form action="{{ route('admin.ticket.destroy', $buyer->id) }}" method="POST"
                                    onsubmit="return confirm('Hapus data pembeli ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-gray-500 hover:text-red-500 transition"
                                        title="Delete Buyer">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                            </path>
                                        </svg>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-6 py-12 text-center text-gray-400">No ticket purchases found</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="mt-6">
        {{ $buyers->links() }}
    </div>
@endsection
