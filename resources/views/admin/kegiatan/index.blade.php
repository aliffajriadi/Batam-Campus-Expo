@extends('admin.layouts.app')

@section('title', 'Manage Kegiatan')

@section('content')
    <div class="flex items-center justify-between mb-8">
        <div>
            <h1 class="text-2xl font-bold text-gray-100">Kegiatan Management</h1>
            <p class="text-gray-400 mt-1">Manage event activities and schedule</p>
        </div>
        <a href="{{ route('admin.kegiatan.create') }}"
            class="px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white font-medium rounded-lg transition flex items-center gap-2">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
            </svg>
            Add Kegiatan
        </a>
    </div>

    <div class="bg-gray-800 rounded-xl border border-gray-700 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left">
                <thead>
                    <tr class="bg-gray-700/50 border-b border-gray-700">
                        <th class="px-6 py-4 text-sm font-semibold text-gray-300">Order</th>
                        <th class="px-6 py-4 text-sm font-semibold text-gray-300">Time</th>
                        <th class="px-6 py-4 text-sm font-semibold text-gray-300">Activity</th>
                        <th class="px-6 py-4 text-sm font-semibold text-gray-300">Icon</th>
                        <th class="px-6 py-4 text-sm font-semibold text-gray-300">Color</th>
                        <th class="px-6 py-4 text-sm font-semibold text-gray-300 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-700">
                    @forelse($kegiatan as $item)
                        <tr class="hover:bg-gray-700/30 transition">
                            <td class="px-6 py-4 text-sm text-gray-300">{{ $item->order }}</td>
                            <td class="px-6 py-4 text-sm text-gray-300">{{ $item->time }}</td>
                            <td class="px-6 py-4">
                                <span class="text-sm font-medium text-gray-100">{{ $item->activity }}</span>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-400">
                                @if ($item->icon)
                                    <div class="flex items-center gap-2">
                                        <i class="{{ $item->icon }}"></i>
                                        <span>{{ $item->icon }}</span>
                                    </div>
                                @else
                                    -
                                @endif
                            </td>
                            <td class="px-6 py-4">
                                @if ($item->color)
                                    <div class="flex items-center gap-2">
                                        <div class="w-4 h-4 rounded" style="background-color: {{ $item->color }}"></div>
                                        <span class="text-sm text-gray-400">{{ $item->color }}</span>
                                    </div>
                                @else
                                    -
                                @endif
                            </td>
                            <td class="px-6 py-4 text-right space-x-3">
                                <a href="{{ route('admin.kegiatan.edit', $item->id) }}"
                                    class="text-indigo-400 hover:text-indigo-300 transition text-sm font-medium">Edit</a>
                                <form action="{{ route('admin.kegiatan.destroy', $item->id) }}" method="POST"
                                    class="inline"
                                    onsubmit="return confirm('Are you sure you want to delete this activity?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="text-red-400 hover:text-red-300 transition text-sm font-medium">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-6 py-12 text-center text-gray-500">
                                No activities found. <a href="{{ route('admin.kegiatan.create') }}"
                                    class="text-indigo-400 hover:underline">Add your first activity</a>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
