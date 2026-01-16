@extends('admin.layouts.app')

@section('title', 'Edit Ticket Type')

@section('content')
    <div class="mb-8">
        <div class="flex items-center gap-4 mb-2">
            <a href="{{ route('admin.ticket.settings') }}"
                class="p-2 bg-gray-800 hover:bg-gray-700 rounded-lg transition text-gray-400 hover:text-white">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18">
                    </path>
                </svg>
            </a>
            <h1 class="text-2xl font-bold text-gray-100">Edit Ticket Type</h1>
        </div>
        <p class="text-gray-400 ml-12">Modify pricing, stock, and availability for: {{ $ticket->name }}</p>
    </div>

    <div class="max-w-2xl">
        <div class="bg-gray-800 rounded-xl p-8 border border-gray-700 shadow-xl">
            <form action="{{ route('admin.ticket.type.update', $ticket->id) }}" method="POST" class="space-y-6"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-300 mb-2">Ticket Name</label>
                        <input type="text" name="name" value="{{ $ticket->name }}"
                            class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-xl text-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-500 transition"
                            placeholder="e.g. Early Bird" required>
                    </div>

                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-300 mb-2">Description</label>
                        <textarea name="description" rows="3"
                            class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-xl text-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-500 transition"
                            placeholder="Explain what's included in this ticket type">{{ $ticket->description }}</textarea>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-300 mb-2">Price (Rp)</label>
                        <input type="number" name="price" value="{{ $ticket->price }}"
                            class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-xl text-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-500 transition"
                            min="0" required>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-300 mb-2">Stock / Quota</label>
                        <input type="number" name="kuota_ticket" value="{{ $ticket->kuota_ticket }}"
                            class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-xl text-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-500 transition"
                            min="0" required>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-300 mb-2">Status</label>
                        <select name="status"
                            class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-xl text-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-500 transition">
                            <option value="open" {{ $ticket->status == 'open' ? 'selected' : '' }}>Open</option>
                            <option value="pending" {{ $ticket->status == 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="close" {{ $ticket->status == 'close' ? 'selected' : '' }}>Close</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-300 mb-2">Discount (%)</label>
                        <input type="number" name="discount" value="{{ $ticket->discount }}"
                            class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-xl text-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-500 transition"
                            step="0.01" min="0" max="100">
                    </div>

                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-300 mb-2">Auto Close At</label>
                        <input type="datetime-local" name="auto_close_ticket_at"
                            value="{{ $ticket->auto_close_ticket_at ? $ticket->auto_close_ticket_at->format('Y-m-d\TH:i') : '' }}"
                            class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-xl text-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-500 transition"
                            required>
                    </div>

                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-300 mb-2">Join Link (Optional)</label>
                        <input type="text" name="link" value="{{ $ticket->link }}"
                            class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-xl text-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-500 transition"
                            placeholder="https://chat.whatsapp.com/...">
                        <p class="text-xs text-gray-500 mt-2 italic">* This link will only be visible to buyers after their
                            payment is approved.</p>
                    </div>

                    <div class="md:col-span-2 grid grid-cols-1 md:grid-cols-3 gap-6 pt-4 border-t border-gray-700">
                        <div>
                            <label class="block text-sm font-medium text-gray-300 mb-2">Bank Name</label>
                            <input type="text" name="bank_name" value="{{ $ticket->bank_name }}"
                                class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-xl text-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-500 transition"
                                placeholder="e.g. BCA">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-300 mb-2">Account Number</label>
                            <input type="text" name="account_number" value="{{ $ticket->account_number }}"
                                class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-xl text-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-500 transition"
                                placeholder="e.g. 12345678">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-300 mb-2">Account Name</label>
                            <input type="text" name="account_name" value="{{ $ticket->account_name }}"
                                class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-xl text-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-500 transition"
                                placeholder="e.g. Batam Campus Expo">
                        </div>
                    </div>

                    <div class="md:col-span-2 pt-4 border-t border-gray-700">
                        <label class="block text-sm font-medium text-gray-300 mb-2">QRIS / Payment Image</label>

                        @if ($ticket->qr_image)
                            <div class="mb-4">
                                <p class="text-xs text-gray-400 mb-2">Current Image:</p>
                                <img src="{{ asset('storage/' . $ticket->qr_image) }}" alt="QRIS"
                                    class="w-32 h-auto rounded-lg border border-gray-600">
                            </div>
                        @endif

                        <input type="file" name="qr_image" accept="image/*"
                            class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-xl text-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-500 transition">
                        <p class="text-xs text-gray-500 mt-2">Upload a new image to replace the current one.</p>
                    </div>
                </div>

                <div class="flex items-center justify-end gap-4 pt-6 border-t border-gray-700">
                    <a href="{{ route('admin.ticket.settings') }}"
                        class="px-6 py-3 bg-transparent border border-gray-600 hover:bg-gray-700 text-gray-300 font-semibold rounded-xl transition">
                        Cancel
                    </a>
                    <button type="submit"
                        class="px-8 py-3 bg-indigo-600 hover:bg-indigo-700 text-white font-bold rounded-xl shadow-lg shadow-indigo-500/20 transition transform active:scale-95">
                        Save Changes
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
