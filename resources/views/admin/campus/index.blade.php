@extends('admin.layouts.app')

@section('title', 'Campus Management')

@section('content')
    <div class="flex items-center justify-between mb-8">
        <div>
            <h1 class="text-2xl font-bold text-gray-100">Campus Management</h1>
            <p class="text-gray-400 mt-1">Manage participating campuses</p>
        </div>
        <a href="{{ route('admin.campus.create') }}"
            class="px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white font-medium rounded-lg transition flex items-center gap-2">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
            </svg>
            Add Campus
        </a>
    </div>

    <!-- Search -->
    <div class="bg-gray-800 rounded-xl p-4 border border-gray-700 mb-6">
        <form action="{{ route('admin.campus.index') }}" method="GET" class="flex flex-wrap gap-4 items-end">
            <div class="flex-1">
                <label class="block text-sm font-medium text-gray-400 mb-1">Search</label>
                <input type="text" name="search" value="{{ request('search') }}"
                    class="w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-lg text-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                    placeholder="Search by campus name or location...">
            </div>
            <button type="submit" class="px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white rounded-lg transition">
                Search
            </button>
            @if (request('search'))
                <a href="{{ route('admin.campus.index') }}"
                    class="px-4 py-2 bg-gray-600 hover:bg-gray-500 text-white rounded-lg transition">
                    Reset
                </a>
            @endif
        </form>
    </div>

    <div class="bg-gray-800 rounded-xl border border-gray-700 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full whitespace-nowrap">
                <thead class="bg-gray-700/50">
                    <tr>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-300 uppercase tracking-wider">Campus
                        </th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-300 uppercase tracking-wider">
                            Location
                        </th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-300 uppercase tracking-wider">Votes
                        </th>
                        <th class="px-6 py-4 text-right text-xs font-semibold text-gray-300 uppercase tracking-wider">
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-700">
                    @forelse($campuses as $campus)
                        <tr class="hover:bg-gray-700/30 transition">
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    @if ($campus->logo_campus)
                                        <img src="{{ asset('storage/' . $campus->logo_campus) }}"
                                            class="w-12 h-12 rounded-lg object-cover" alt="">
                                    @else
                                        <div class="w-12 h-12 bg-indigo-600 rounded-lg flex items-center justify-center">
                                            <span
                                                class="text-lg font-bold text-white">{{ strtoupper(substr($campus->name_campus, 0, 2)) }}</span>
                                        </div>
                                    @endif
                                    <div>
                                        <p class="text-gray-100 font-medium">{{ $campus->name_campus }}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-gray-400">{{ $campus->location }}</td>
                            <td class="px-6 py-4">
                                <a href="{{ route('admin.campus.votes', $campus->id) }}"
                                    class="inline-flex items-center gap-1 px-3 py-1 bg-indigo-900/50 text-indigo-300 rounded-full text-sm font-medium hover:bg-indigo-900/70 transition">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z">
                                        </path>
                                    </svg>
                                    {{ $campus->votes_count }} votes
                                </a>
                            </td>
                            <td class="px-6 py-4 text-right">
                                <div class="flex items-center justify-end gap-3">
                                    <a href="{{ route('admin.campus.edit', $campus->id) }}"
                                        class="text-indigo-400 hover:text-indigo-300 transition">Edit</a>
                                    <form action="{{ route('admin.campus.destroy', $campus->id) }}" method="POST"
                                        class="inline"
                                        onsubmit="return confirm('Are you sure? All votes for this campus will also be deleted.')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="text-red-400 hover:text-red-300 transition">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-6 py-12 text-center text-gray-400">No campuses found</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="mt-6">
        {{ $campuses->links() }}
    </div>
@endsection
