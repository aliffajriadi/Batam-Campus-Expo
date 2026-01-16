@extends('admin.layouts.app')

@section('title', 'Ticket Settings')

@section('content')
    <div class="mb-8">
        <h1 class="text-2xl font-bold text-gray-100">Ticket Settings</h1>
        <p class="text-gray-400 mt-1">Manage ticket types, pricing, and stock</p>
    </div>

    <!-- Ticket List -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
        <!-- List Existing Tickets -->
        <div class="space-y-6">
            <h2 class="text-xl font-semibold text-gray-200">Existing Tickets</h2>

            @forelse($tickets as $ticket)
                <div class="bg-gray-800 rounded-xl p-6 border border-gray-700 relative group">
                    <div class="flex justify-between items-start mb-4">
                        <div>
                            <h3 class="text-lg font-bold text-white">{{ $ticket->name }}</h3>
                            <p class="text-sm text-gray-400">{{ $ticket->description ?? 'No description' }}</p>
                        </div>
                        <div class="flex gap-2">
                            <!-- Edit Button (Trigger Modal) -->
                            <a href="{{ route('admin.ticket.type.edit', $ticket->id) }}"
                                class="p-2 text-indigo-400 hover:text-indigo-300 transition" title="Edit Ticket Type">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                    </path>
                            </a>
                            <!-- Delete Button -->
                            <form action="{{ route('admin.ticket.type.destroy', $ticket->id) }}" method="POST"
                                onsubmit="return confirm('Delete this ticket type?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="p-2 text-red-500 hover:text-red-400 transition"
                                    {{ $ticket->buyers->count() > 0 ? 'disabled title="Cannot delete, has buyers"' : '' }}>
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                        </path>
                                    </svg>
                                </button>
                            </form>
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-4 text-sm mb-4">
                        <div>
                            <span class="text-gray-500 block">Price</span>
                            <span class="text-gray-200 font-medium">Rp
                                {{ number_format($ticket->price, 0, ',', '.') }}</span>
                        </div>
                        <div>
                            <span class="text-gray-500 block">Status</span>
                            <span
                                class="inline-block px-2 py-1 rounded text-xs font-semibold
                                {{ $ticket->status === 'open'
                                    ? 'bg-green-900 text-green-300'
                                    : ($ticket->status === 'pending'
                                        ? 'bg-yellow-900 text-yellow-300'
                                        : 'bg-red-900 text-red-300') }}">
                                {{ strtoupper($ticket->status) }}
                            </span>
                        </div>
                        <div>
                            <span class="text-gray-500 block">Quota</span>
                            <span class="text-gray-200 font-medium">{{ $ticket->sold_ticket }} /
                                {{ $ticket->kuota_ticket }}</span>
                        </div>
                        <div>
                            <span class="text-gray-500 block">Closes At</span>
                            <span
                                class="text-gray-200 font-medium">{{ $ticket->auto_close_ticket_at ? $ticket->auto_close_ticket_at->format('d M Y H:i') : '-' }}</span>
                        </div>
                        <div class="col-span-2">
                            <span class="text-gray-500 block">Join Link</span>
                            @if ($ticket->link)
                                <a href="{{ $ticket->link }}" target="_blank"
                                    class="text-indigo-400 hover:underline break-all">{{ $ticket->link }}</a>
                            @else
                                <span class="text-gray-500 italic">No link provided</span>
                            @endif
                        </div>
                    </div>
                </div>


            @empty
                <div class="text-gray-400 italic">No tickets created yet.</div>
            @endforelse
        </div>

        <!-- Create New Ticket -->
        <div class="bg-gray-800 rounded-xl p-6 border border-gray-700 h-fit sticky top-6">
            <h2 class="text-xl font-semibold text-gray-200 mb-6">Add New Ticket Type</h2>
            <form action="{{ route('admin.ticket.type.store') }}" method="POST" class="space-y-4"
                enctype="multipart/form-data">
                @csrf

                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-1">Ticket Name</label>
                    <input type="text" name="name"
                        class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg text-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                        placeholder="e.g. Early Bird" required>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-1">Description</label>
                    <textarea name="description" rows="2"
                        class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg text-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                        placeholder="Optional description"></textarea>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-300 mb-1">Price (Rp)</label>
                        <input type="number" name="price"
                            class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg text-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                            value="0" min="0" required>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-300 mb-1">Stock</label>
                        <input type="number" name="kuota_ticket"
                            class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg text-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                            value="100" min="0" required>
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-300 mb-1">Status</label>
                        <select name="status"
                            class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg text-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                            <option value="open">Open</option>
                            <option value="pending">Pending</option>
                            <option value="close">Close</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-300 mb-1">Discount (%)</label>
                        <input type="number" name="discount"
                            class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg text-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                            value="0" step="0.01" min="0" max="100">
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-1">Auto Close At</label>
                    <input type="datetime-local" name="auto_close_ticket_at"
                        class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg text-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                        required>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-1">Join Link (Optional)</label>
                    <input type="text" name="link"
                        class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg text-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                        placeholder="https://chat.whatsapp.com/...">
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-300 mb-1">Bank Name</label>
                        <input type="text" name="bank_name"
                            class="w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-lg text-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                            placeholder="e.g. BCA">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-300 mb-1">Account Number</label>
                        <input type="text" name="account_number"
                            class="w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-lg text-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                            placeholder="e.g. 12345678">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-300 mb-1">Account Name</label>
                        <input type="text" name="account_name"
                            class="w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-lg text-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                            placeholder="e.g. Batam Campus Expo">
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-1">QRIS / Payment Image</label>
                    <input type="file" name="qr_image" accept="image/*"
                        class="w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-lg text-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                </div>

                <button type="submit"
                    class="w-full py-3 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold rounded-lg transition mt-4">
                    Create Ticket Type
                </button>
            </form>
        </div>
    </div>

@endsection
