@extends('admin.layouts.app')

@section('title', 'Ticket Settings')

@section('content')
    <div class="mb-8">
        <h1 class="text-2xl font-bold text-gray-100">Ticket Settings</h1>
        <p class="text-gray-400 mt-1">Configure ticket pricing, stock, and status</p>
    </div>

    <div class="bg-gray-800 rounded-xl p-6 border border-gray-700 max-w-2xl">
        <form action="{{ route('admin.ticket.settings.update') }}" method="POST" class="space-y-6">
            @csrf

            <!-- Price -->
            <div>
                <label for="price" class="block text-sm font-medium text-gray-300 mb-2">Ticket Price (Rp)</label>
                <input type="number" name="price" id="price"
                    class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg text-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                    value="{{ old('price', $ticketStatus->price ?? 0) }}" min="0" required>
            </div>

            <!-- Status -->
            <div>
                <label for="status" class="block text-sm font-medium text-gray-300 mb-2">Ticket Status</label>
                <select name="status" id="status"
                    class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg text-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    <option value="open" {{ old('status', $ticketStatus->status ?? '') == 'open' ? 'selected' : '' }}>Open
                        (Dijual)</option>
                    <option value="pending" {{ old('status', $ticketStatus->status ?? '') == 'pending' ? 'selected' : '' }}>
                        Pending</option>
                    <option value="close" {{ old('status', $ticketStatus->status ?? '') == 'close' ? 'selected' : '' }}>
                        Close (Tutup)</option>
                </select>
            </div>

            <!-- Quota -->
            <div>
                <label for="kuota_ticket" class="block text-sm font-medium text-gray-300 mb-2">Ticket Quota (Stock)</label>
                <input type="number" name="kuota_ticket" id="kuota_ticket"
                    class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg text-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                    value="{{ old('kuota_ticket', $ticketStatus->kuota_ticket ?? 0) }}" min="0" required>
                <p class="text-gray-500 text-sm mt-1">Total available tickets</p>
            </div>

            <!-- Discount -->
            <div>
                <label for="discount" class="block text-sm font-medium text-gray-300 mb-2">Discount (%)</label>
                <input type="number" name="discount" id="discount" step="0.01"
                    class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg text-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                    value="{{ old('discount', $ticketStatus->discount ?? 0) }}" min="0" max="100" required>
                <p class="text-gray-500 text-sm mt-1">Discount percentage (0-100)</p>
            </div>

            <!-- Auto Close At -->
            <div>
                <label for="auto_close_ticket_at" class="block text-sm font-medium text-gray-300 mb-2">Auto Close Ticket
                    At</label>
                <input type="datetime-local" name="auto_close_ticket_at" id="auto_close_ticket_at"
                    class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg text-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                    value="{{ old('auto_close_ticket_at', optional($ticketStatus->auto_close_ticket_at ?? null)->format('Y-m-d\TH:i')) }}"
                    required>
                <p class="text-gray-500 text-sm mt-1">Ticket sales will automatically close at this time</p>
            </div>

            <!-- Summary -->
            @if ($ticketStatus)
                <div class="bg-gray-700/50 rounded-lg p-4 border border-gray-600">
                    <h3 class="text-sm font-medium text-gray-300 mb-3">Current Summary</h3>
                    <div class="grid grid-cols-2 gap-4 text-sm">
                        <div>
                            <span class="text-gray-400">Final Price:</span>
                            <span class="text-indigo-400 font-semibold ml-2">
                                Rp
                                {{ number_format($ticketStatus->price * (1 - $ticketStatus->discount / 100), 0, ',', '.') }}
                            </span>
                        </div>
                        <div>
                            <span class="text-gray-400">Sold:</span>
                            <span class="text-gray-100 font-semibold ml-2">{{ $ticketStatus->buyers()->count() ?? 0 }}
                                tickets</span>
                        </div>
                    </div>
                </div>
            @endif

            <!-- Submit -->
            <div class="flex justify-end pt-4">
                <button type="submit"
                    class="px-6 py-3 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold rounded-lg transition">
                    Save Settings
                </button>
            </div>
        </form>
    </div>
@endsection
