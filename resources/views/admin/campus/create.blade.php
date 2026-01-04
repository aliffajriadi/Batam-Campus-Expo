@extends('admin.layouts.app')

@section('title', 'Add Campus')

@section('content')
    <div class="mb-8">
        <a href="{{ route('admin.campus.index') }}"
            class="text-indigo-400 hover:text-indigo-300 transition flex items-center gap-2 mb-4">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
            </svg>
            Back to Campuses
        </a>
        <h1 class="text-2xl font-bold text-gray-100">Add New Campus</h1>
    </div>

    <div class="bg-gray-800 rounded-xl p-6 border border-gray-700 max-w-2xl">
        <form action="{{ route('admin.campus.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <div>
                <label for="name_campus" class="block text-sm font-medium text-gray-300 mb-2">Campus Name</label>
                <input type="text" name="name_campus" id="name_campus"
                    class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg text-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                    value="{{ old('name_campus') }}" required>
            </div>

            <div>
                <label for="location" class="block text-sm font-medium text-gray-300 mb-2">Location</label>
                <input type="text" name="location" id="location"
                    class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg text-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                    value="{{ old('location') }}" required placeholder="e.g. Batam, Indonesia">
            </div>

            <div>
                <label for="logo_campus" class="block text-sm font-medium text-gray-300 mb-2">Campus Logo</label>
                <input type="file" name="logo_campus" id="logo_campus" accept="image/*"
                    class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg text-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:bg-indigo-600 file:text-white file:cursor-pointer">
            </div>

            <div class="flex justify-end pt-4">
                <button type="submit"
                    class="px-6 py-3 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold rounded-lg transition">
                    Create Campus
                </button>
            </div>
        </form>
    </div>
@endsection
