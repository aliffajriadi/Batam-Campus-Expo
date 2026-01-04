@extends('admin.layouts.app')

@section('title', 'Add Product')

@section('content')
    <div class="mb-8">
        <a href="{{ route('admin.merchandise.index') }}"
            class="text-indigo-400 hover:text-indigo-300 transition flex items-center gap-2 mb-4">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
            </svg>
            Back to Products
        </a>
        <h1 class="text-2xl font-bold text-gray-100">Add New Product</h1>
    </div>

    <div class="bg-gray-800 rounded-xl p-6 border border-gray-700 max-w-2xl">
        <form action="{{ route('admin.merchandise.store') }}" method="POST" enctype="multipart/form-data"
            class="space-y-6">
            @csrf

            <div>
                <label for="name_product" class="block text-sm font-medium text-gray-300 mb-2">Product Name</label>
                <input type="text" name="name_product" id="name_product"
                    class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg text-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                    value="{{ old('name_product') }}" required>
            </div>

            <div>
                <label for="price" class="block text-sm font-medium text-gray-300 mb-2">Price (Rp)</label>
                <input type="number" name="price" id="price"
                    class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg text-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                    value="{{ old('price') }}" min="0" required>
            </div>

            <div>
                <label for="stock" class="block text-sm font-medium text-gray-300 mb-2">Stock</label>
                <input type="number" name="stock" id="stock"
                    class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg text-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                    value="{{ old('stock') }}" min="0" required>
            </div>

            <div>
                <label for="description" class="block text-sm font-medium text-gray-300 mb-2">Description</label>
                <textarea name="description" id="description" rows="4"
                    class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg text-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                    required>{{ old('description') }}</textarea>
            </div>

            <div>
                <label for="photo" class="block text-sm font-medium text-gray-300 mb-2">Product Photo</label>
                <input type="file" name="photo" id="photo" accept="image/*"
                    class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg text-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:bg-indigo-600 file:text-white file:cursor-pointer">
            </div>

            <div class="flex justify-end pt-4">
                <button type="submit"
                    class="px-6 py-3 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold rounded-lg transition">
                    Create Product
                </button>
            </div>
        </form>
    </div>
@endsection
