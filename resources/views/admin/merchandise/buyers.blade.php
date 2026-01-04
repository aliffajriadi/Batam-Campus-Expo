@extends('admin.layouts.app')

@section('title', 'Merchandise Buyers')

@section('content')
    <div class="flex items-center justify-between mb-8">
        <div>
            <h1 class="text-2xl font-bold text-gray-100">Merchandise Buyers</h1>
            <p class="text-gray-400 mt-1">Manage merchandise purchase approvals</p>
        </div>
    </div>

    <div class="bg-gray-800 rounded-xl border border-gray-700 overflow-hidden">
        <table class="w-full">
            <thead class="bg-gray-700/50">
                <tr>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-300 uppercase tracking-wider">Buyer</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-300 uppercase tracking-wider">Product</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-300 uppercase tracking-wider">Status</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-300 uppercase tracking-wider">Date</th>
                    <th class="px-6 py-4 text-right text-xs font-semibold text-gray-300 uppercase tracking-wider">Actions
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
                        <td class="px-6 py-4">
                            <p class="text-gray-100">{{ $buyer->product->name_product ?? 'Unknown' }}</p>
                            <p class="text-indigo-400 text-sm">Rp
                                {{ number_format($buyer->product->price ?? 0, 0, ',', '.') }}</p>
                        </td>
                        <td class="px-6 py-4">
                            @if ($buyer->status_acc)
                                <span
                                    class="px-3 py-1 bg-green-900/50 text-green-300 rounded-full text-xs font-medium">Approved</span>
                            @else
                                <span
                                    class="px-3 py-1 bg-yellow-900/50 text-yellow-300 rounded-full text-xs font-medium">Pending</span>
                            @endif
                        </td>
                        <td class="px-6 py-4 text-gray-400 text-sm">{{ $buyer->created_at }}</td>
                        <td class="px-6 py-4 text-right">
                            <a href="{{ route('admin.merchandise.show-buyer', $buyer->id) }}"
                                class="text-indigo-400 hover:text-indigo-300 transition">
                                View Details
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-6 py-12 text-center text-gray-400">No merchandise purchases yet</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-6">
        {{ $buyers->links() }}
    </div>
@endsection
