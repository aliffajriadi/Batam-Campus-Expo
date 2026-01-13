@extends('admin.layouts.app')

@section('title', 'Add Kegiatan')

@section('content')
    <div class="mb-8">
        <a href="{{ route('admin.kegiatan.index') }}"
            class="text-indigo-400 hover:text-indigo-300 transition flex items-center gap-2 mb-4">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
            </svg>
            Back to Kegiatan
        </a>
        <h1 class="text-2xl font-bold text-gray-100">Add New Kegiatan</h1>
    </div>

    <div class="bg-gray-800 rounded-xl p-6 border border-gray-700 max-w-2xl">
        <form action="{{ route('admin.kegiatan.store') }}" method="POST" class="space-y-6">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="time" class="block text-sm font-medium text-gray-300 mb-2">Time (e.g., 08:00 -
                        09:00)</label>
                    <input type="text" name="time" id="time"
                        class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg text-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                        value="{{ old('time') }}" placeholder="08:00 - 09:00" required>
                </div>

                <div>
                    <label for="order" class="block text-sm font-medium text-gray-300 mb-2">Order</label>
                    <input type="number" name="order" id="order"
                        class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg text-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                        value="{{ old('order', 1) }}" min="1" required>
                </div>
            </div>

            <div>
                <label for="activity" class="block text-sm font-medium text-gray-300 mb-2">Activity Name</label>
                <input type="text" name="activity" id="activity"
                    class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg text-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                    value="{{ old('activity') }}" placeholder="e.g., Opening Ceremony" required>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="icon" class="block text-sm font-medium text-gray-300 mb-2">Icon Class
                        (FontAwesome)</label>
                    <input type="text" name="icon" id="icon"
                        class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg text-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                        value="{{ old('icon') }}" placeholder="e.g., fas fa-music">
                    <p class="mt-1 text-xs text-gray-500">Use FontAwesome 5 classes.</p>
                </div>

                <div>
                    <label for="color" class="block text-sm font-medium text-gray-300 mb-2">Color (Hex)</label>
                    <div class="flex gap-2">
                        <input type="color" name="color_picker" id="color_picker"
                            class="h-12 w-12 bg-gray-700 border border-gray-600 rounded cursor-pointer"
                            value="{{ old('color', '#6366f1') }}"
                            onchange="document.getElementById('color').value = this.value">
                        <input type="text" name="color" id="color"
                            class="flex-1 px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg text-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                            value="{{ old('color', '#6366f1') }}" placeholder="#6366f1">
                    </div>
                </div>
            </div>

            <div class="flex justify-end pt-4">
                <button type="submit"
                    class="px-6 py-3 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold rounded-lg transition">
                    Create Kegiatan
                </button>
            </div>
        </form>
    </div>
@endsection
