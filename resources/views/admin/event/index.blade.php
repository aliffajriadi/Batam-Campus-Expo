@extends('admin.layouts.app')

@section('title', 'Event Settings')

@section('content')
    <div class="mb-8">
        <h1 class="text-2xl font-bold text-gray-100">Event Settings</h1>
        <p class="text-gray-400 mt-1">Configure the main event details</p>
    </div>

    <div class="bg-gray-800 rounded-xl p-6 border border-gray-700">
        <form action="{{ route('admin.event.update') }}" method="POST" class="space-y-6">
            @csrf

            <!-- Event Name -->
            <div>
                <label for="name_event" class="block text-sm font-medium text-gray-300 mb-2">Event Name</label>
                <input type="text" name="name_event" id="name_event"
                    class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg text-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent"
                    value="{{ old('name_event', $eventSetting->name_event ?? '') }}" required>
            </div>

            <!-- Start & End Date -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="start_event" class="block text-sm font-medium text-gray-300 mb-2">Start Event</label>
                    <input type="datetime-local" name="start_event" id="start_event"
                        class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg text-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                        value="{{ old('start_event', optional($eventSetting->start_event ?? null)->format('Y-m-d\TH:i')) }}"
                        required>
                </div>
                <div>
                    <label for="end_event" class="block text-sm font-medium text-gray-300 mb-2">End Event</label>
                    <input type="datetime-local" name="end_event" id="end_event"
                        class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg text-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                        value="{{ old('end_event', optional($eventSetting->end_event ?? null)->format('Y-m-d\TH:i')) }}"
                        required>
                </div>
            </div>

            <!-- Location & Contact -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="location_event" class="block text-sm font-medium text-gray-300 mb-2">Location</label>
                    <input type="text" name="location_event" id="location_event"
                        class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg text-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                        value="{{ old('location_event', $eventSetting->location_event ?? '') }}" required>
                </div>
                <div>
                    <label for="no_contact" class="block text-sm font-medium text-gray-300 mb-2">Contact Number</label>
                    <input type="text" name="no_contact" id="no_contact"
                        class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg text-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                        value="{{ old('no_contact', $eventSetting->no_contact ?? '') }}" required>
                </div>
            </div>

            <!-- Google Maps -->
            <div>
                <label for="google_maps" class="block text-sm font-medium text-gray-300 mb-2">Google Maps Embed</label>
                <textarea name="google_maps" id="google_maps" rows="3"
                    class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg text-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-500">{{ old('google_maps', $eventSetting->google_maps ?? '') }}</textarea>
            </div>

            <!-- Description -->
            <div>
                <label for="desc_event" class="block text-sm font-medium text-gray-300 mb-2">Description</label>
                <textarea name="desc_event" id="desc_event" rows="5"
                    class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg text-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                    required>{{ old('desc_event', $eventSetting->desc_event ?? '') }}</textarea>
            </div>

            <!-- Open Voting -->
            <div class="flex items-center gap-3">
                <input type="checkbox" name="open_voting" id="open_voting" value="1"
                    class="w-5 h-5 rounded bg-gray-700 border-gray-600 text-indigo-600 focus:ring-indigo-500"
                    {{ old('open_voting', $eventSetting->open_voting ?? false) ? 'checked' : '' }}>
                <label for="open_voting" class="text-gray-300">Open Voting</label>
            </div>

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
