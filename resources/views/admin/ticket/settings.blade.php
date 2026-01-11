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
                            <button
                                onclick="document.getElementById('edit-modal-{{ $ticket->id }}').classList.remove('hidden')"
                                class="p-2 text-indigo-400 hover:text-indigo-300 transition">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                    </path>
                                </svg>
                            </button>
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
                    </div>

                    <!-- Edit Modal -->
                    <div id="edit-modal-{{ $ticket->id }}" class="fixed inset-0 z-50 hidden overflow-y-auto"
                        aria-labelledby="modal-title" role="dialog" aria-modal="true">
                        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                            <div class="fixed inset-0 bg-gray-900 bg-opacity-75 transition-opacity" aria-hidden="true">
                            </div>
                            <span class="hidden sm:inline-block sm:align-middle sm:h-screen"
                                aria-hidden="true">&#8203;</span>
                            <div
                                class="inline-block align-bottom bg-gray-800 rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full border border-gray-700">
                                <form action="{{ route('admin.ticket.type.update', $ticket->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                                        <h3 class="text-lg leading-6 font-medium text-white mb-4" id="modal-title">Edit
                                            Ticket: {{ $ticket->name }}</h3>

                                        <!-- Form Fields (Same as Create but Filled) -->
                                        <div class="space-y-4">
                                            <div>
                                                <label class="block text-sm font-medium text-gray-300 mb-1">Name</label>
                                                <input type="text" name="name" value="{{ $ticket->name }}"
                                                    class="w-full px-3 py-2 bg-gray-700 border border-gray-600 rounded-lg text-white"
                                                    required>
                                            </div>
                                            <div>
                                                <label
                                                    class="block text-sm font-medium text-gray-300 mb-1">Description</label>
                                                <textarea name="description" rows="2"
                                                    class="w-full px-3 py-2 bg-gray-700 border border-gray-600 rounded-lg text-white">{{ $ticket->description }}</textarea>
                                            </div>
                                            <div class="grid grid-cols-2 gap-4">
                                                <div>
                                                    <label class="block text-sm font-medium text-gray-300 mb-1">Price
                                                        (Rp)</label>
                                                    <input type="number" name="price" value="{{ $ticket->price }}"
                                                        class="w-full px-3 py-2 bg-gray-700 border border-gray-600 rounded-lg text-white"
                                                        required>
                                                </div>
                                                <div>
                                                    <label
                                                        class="block text-sm font-medium text-gray-300 mb-1">Stock</label>
                                                    <input type="number" name="kuota_ticket"
                                                        value="{{ $ticket->kuota_ticket }}"
                                                        class="w-full px-3 py-2 bg-gray-700 border border-gray-600 rounded-lg text-white"
                                                        required>
                                                </div>
                                            </div>
                                            <div class="grid grid-cols-2 gap-4">
                                                <div>
                                                    <label
                                                        class="block text-sm font-medium text-gray-300 mb-1">Status</label>
                                                    <select name="status"
                                                        class="w-full px-3 py-2 bg-gray-700 border border-gray-600 rounded-lg text-white">
                                                        <option value="open"
                                                            {{ $ticket->status == 'open' ? 'selected' : '' }}>Open</option>
                                                        <option value="pending"
                                                            {{ $ticket->status == 'pending' ? 'selected' : '' }}>Pending
                                                        </option>
                                                        <option value="close"
                                                            {{ $ticket->status == 'close' ? 'selected' : '' }}>Close
                                                        </option>
                                                    </select>
                                                </div>
                                                <div>
                                                    <label class="block text-sm font-medium text-gray-300 mb-1">Discount
                                                        (%)</label>
                                                    <input type="number" name="discount" value="{{ $ticket->discount }}"
                                                        step="0.01"
                                                        class="w-full px-3 py-2 bg-gray-700 border border-gray-600 rounded-lg text-white">
                                                </div>
                                            </div>
                                            <div>
                                                <label class="block text-sm font-medium text-gray-300 mb-1">Auto Close
                                                    At</label>
                                                <input type="datetime-local" name="auto_close_ticket_at"
                                                    value="{{ $ticket->auto_close_ticket_at ? $ticket->auto_close_ticket_at->format('Y-m-d\TH:i') : '' }}"
                                                    class="w-full px-3 py-2 bg-gray-700 border border-gray-600 rounded-lg text-white"
                                                    required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse bg-gray-700/50">
                                        <button type="submit"
                                            class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-indigo-600 text-base font-medium text-white hover:bg-indigo-700 focus:outline-none sm:ml-3 sm:w-auto sm:text-sm">
                                            Update
                                        </button>
                                        <button type="button"
                                            onclick="document.getElementById('edit-modal-{{ $ticket->id }}').classList.add('hidden')"
                                            class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-600 shadow-sm px-4 py-2 bg-gray-700 text-base font-medium text-gray-300 hover:bg-gray-600 focus:outline-none sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                                            Cancel
                                        </button>
                                    </div>
                                </form>
                            </div>
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
            <form action="{{ route('admin.ticket.type.store') }}" method="POST" class="space-y-4">
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

                <button type="submit"
                    class="w-full py-3 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold rounded-lg transition mt-4">
                    Create Ticket Type
                </button>
            </form>
        </div>
    </div>
@endsection
