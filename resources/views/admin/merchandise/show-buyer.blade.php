@extends('admin.layouts.app')

@section('title', 'Buyer Details')

@section('content')
    <div class="mb-8">
        <a href="{{ route('admin.merchandise.buyers') }}"
            class="text-indigo-400 hover:text-indigo-300 transition flex items-center gap-2 mb-4">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
            </svg>
            Back to Buyers
        </a>
        <h1 class="text-2xl font-bold text-gray-100">Merchandise Purchase Details</h1>
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
                        <span class="text-gray-400">Product</span>
                        <span class="text-gray-100 font-medium">{{ $buyer->product->name_product ?? 'Unknown' }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-400">Price</span>
                        <span class="text-indigo-400 font-medium">Rp
                            {{ number_format($buyer->product->price ?? 0, 0, ',', '.') }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-400">Purchase Date</span>
                        <span class="text-gray-100">{{ $buyer->created_at }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-400">Status</span>
                        @if ($buyer->status_acc)
                            <span
                                class="px-3 py-1 bg-green-900/50 text-green-300 rounded-full text-xs font-medium">Approved</span>
                        @else
                            <span
                                class="px-3 py-1 bg-yellow-900/50 text-yellow-300 rounded-full text-xs font-medium">Pending</span>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <!-- Transfer Proof -->
        <div class="bg-gray-800 rounded-xl p-6 border border-gray-700">
            <h2 class="text-lg font-semibold text-gray-100 mb-4">Transfer Proof</h2>
            @if ($buyer->photo_transfer)
                <img src="{{ asset('storage/' . $buyer->photo_transfer) }}"
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
            <form action="{{ route('admin.merchandise.approve-buyer', $buyer->id) }}" method="POST">
                @csrf
                <button type="submit"
                    class="px-6 py-3 {{ $buyer->status_acc ? 'bg-green-800' : 'bg-green-600 hover:bg-green-700' }} text-white font-semibold rounded-lg transition flex items-center gap-2">
                    @if ($buyer->status_acc)
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                clip-rule="evenodd"></path>
                        </svg>
                    @endif
                    Approve
                </button>
            </form>
            <form action="{{ route('admin.merchandise.reject-buyer', $buyer->id) }}" method="POST">
                @csrf
                <button type="submit"
                    class="px-6 py-3 {{ !$buyer->status_acc ? 'bg-red-800' : 'bg-red-600 hover:bg-red-700' }} text-white font-semibold rounded-lg transition flex items-center gap-2">
                    @if (!$buyer->status_acc)
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                clip-rule="evenodd"></path>
                        </svg>
                    @endif
                    Reject
                </button>
            </form>
        </div>
        @if ($buyer->claimed)
            <p class="text-blue-400 text-sm mt-2">✓ Sudah diambil pada: {{ $buyer->claimed_at }}</p>
        @endif
    </div>
@endsection
