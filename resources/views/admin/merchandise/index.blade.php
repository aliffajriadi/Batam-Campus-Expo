@extends('admin.layouts.app')

@section('title', 'Products')

@section('content')
    <div class="flex items-center justify-between mb-8">
        <div>
            <h1 class="text-2xl font-bold text-gray-100">Products</h1>
            <p class="text-gray-400 mt-1">Manage merchandise products</p>
        </div>
        <a href="{{ route('admin.merchandise.create') }}"
            class="px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white font-medium rounded-lg transition flex items-center gap-2">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
            </svg>
            Add Product
        </a>
    </div>

    <!-- Search -->
    <div class="bg-gray-800 rounded-xl p-4 border border-gray-700 mb-6">
        <form action="{{ route('admin.merchandise.index') }}" method="GET" class="flex flex-wrap gap-4 items-end">
            <div class="flex-1">
                <label class="block text-sm font-medium text-gray-400 mb-1">Search Product</label>
                <input type="text" name="search" value="{{ request('search') }}"
                    class="w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-lg text-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                    placeholder="Search by product name...">
            </div>
            <button type="submit" class="px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white rounded-lg transition">
                Search
            </button>
            @if (request('search'))
                <a href="{{ route('admin.merchandise.index') }}"
                    class="px-4 py-2 bg-gray-600 hover:bg-gray-500 text-white rounded-lg transition">
                    Reset
                </a>
            @endif
        </form>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse($products as $product)
            <div class="bg-gray-800 rounded-xl border border-gray-700 overflow-hidden">
                @if ($product->photo)
                    <img src="{{ asset('storage/' . $product->photo) }}" class="w-full h-48 object-cover"
                        alt="{{ $product->name_product }}">
                @else
                    <div class="w-full h-48 bg-gray-700 flex items-center justify-center">
                        <svg class="w-16 h-16 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                            </path>
                        </svg>
                    </div>
                @endif
                <div class="p-4">
                    <h3 class="text-lg font-semibold text-gray-100">{{ $product->name_product }}</h3>
                    <p class="text-indigo-400 font-bold mt-1">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                    <p class="text-gray-400 text-sm mt-2 line-clamp-2">{{ $product->description }}</p>
                    <div class="flex items-center justify-between mt-4">
                        <span class="text-sm text-gray-400">Stock: {{ $product->stock }}</span>
                        <div class="flex gap-2">
                            <a href="{{ route('admin.merchandise.edit', $product->id) }}"
                                class="text-indigo-400 hover:text-indigo-300 transition text-sm">Edit</a>
                            <form action="{{ route('admin.merchandise.destroy', $product->id) }}" method="POST"
                                class="inline" onsubmit="return confirm('Are you sure you want to delete this product?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="text-red-400 hover:text-red-300 transition text-sm">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-span-full bg-gray-800 rounded-xl p-12 text-center border border-gray-700">
                <svg class="w-16 h-16 text-gray-600 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                </svg>
                <p class="text-gray-400">No products found</p>
                <a href="{{ route('admin.merchandise.create') }}"
                    class="text-indigo-400 hover:text-indigo-300 transition mt-2 inline-block">Add your first product</a>
            </div>
        @endforelse
    </div>

    <div class="mt-6">
        {{ $products->links() }}
    </div>
@endsection
