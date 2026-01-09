@extends('admin.layouts.app')

@section('title', 'User Management')

@section('content')
    <div class="flex items-center justify-between mb-8">
        <div>
            <h1 class="text-2xl font-bold text-gray-100">User Management</h1>
            <p class="text-gray-400 mt-1">Manage platform users and their access status</p>
        </div>
    </div>

    <!-- Search & Filter -->
    <div class="bg-gray-800 rounded-xl p-4 border border-gray-700 mb-6">
        <form action="{{ route('admin.users.index') }}" method="GET" class="flex flex-wrap gap-4 items-end">
            <div class="flex-1 min-w-[200px]">
                <label class="block text-sm font-medium text-gray-400 mb-1">Search User</label>
                <input type="text" name="search" value="{{ request('search') }}"
                    class="w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-lg text-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                    placeholder="Search by name or email...">
            </div>
            <div class="w-40">
                <label class="block text-sm font-medium text-gray-400 mb-1">Status</label>
                <select name="status"
                    class="w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-lg text-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    <option value="">All Status</option>
                    <option value="active" {{ request('status') == 'active' ? 'selected' : '' }}>Active</option>
                    <option value="suspended" {{ request('status') == 'suspended' ? 'selected' : '' }}>Suspended</option>
                </select>
            </div>
            <button type="submit" class="px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white rounded-lg transition">
                Filter
            </button>
            @if (request('search') || request('status'))
                <a href="{{ route('admin.users.index') }}"
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
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-300 uppercase tracking-wider">User
                        </th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-300 uppercase tracking-wider">Contact
                        </th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-300 uppercase tracking-wider">School
                        </th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-300 uppercase tracking-wider">Status
                        </th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-300 uppercase tracking-wider">Joined
                        </th>
                        <th class="px-6 py-4 text-right text-xs font-semibold text-gray-300 uppercase tracking-wider">
                            Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-700">
                    @forelse($users as $user)
                        <tr class="hover:bg-gray-700/30 transition">
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    @if ($user->photo)
                                        <img src="{{ $user->photo }}" class="w-10 h-10 rounded-full object-cover"
                                            alt="">
                                    @else
                                        <div class="w-10 h-10 bg-gray-600 rounded-full flex items-center justify-center">
                                            <span
                                                class="text-sm text-gray-300">{{ strtoupper(substr($user->name, 0, 1)) }}</span>
                                        </div>
                                    @endif
                                    <div>
                                        <p class="text-gray-100 font-medium">{{ $user->name }}</p>
                                        <p class="text-gray-400 text-sm">ID: {{ $user->id }}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <p class="text-gray-100 text-sm">{{ $user->email }}</p>
                                <p class="text-gray-400 text-xs">{{ $user->nohp ?? '-' }}</p>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-100">
                                {{ $user->asal_sekolah ?? '-' }}
                            </td>
                            <td class="px-6 py-4">
                                @if ($user->is_suspended)
                                    <span
                                        class="px-3 py-1 bg-red-900/50 text-red-300 rounded-full text-xs font-medium">Suspended</span>
                                @else
                                    <span
                                        class="px-3 py-1 bg-green-900/50 text-green-300 rounded-full text-xs font-medium">Active</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 text-gray-400 text-sm">{{ $user->created_at->format('d M Y') }}</td>
                            <td class="px-6 py-4 text-right flex items-center justify-end gap-3">
                                <form action="{{ route('admin.users.toggle-suspend', $user->id) }}" method="POST">
                                    @csrf
                                    <button type="submit"
                                        class="px-3 py-1 text-sm rounded-lg transition {{ $user->is_suspended ? 'bg-green-600/20 text-green-400 hover:bg-green-600/30' : 'bg-yellow-600/20 text-yellow-400 hover:bg-yellow-600/30' }}">
                                        {{ $user->is_suspended ? 'Unsuspend' : 'Suspend' }}
                                    </button>
                                </form>
                                <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST"
                                    onsubmit="return confirm('Hapus user ini permanent? Data tiket dan transaksi terkait mungkin akan bermasalah.')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-gray-500 hover:text-red-500 transition"
                                        title="Delete User">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                            </path>
                                        </svg>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-6 py-12 text-center text-gray-400">No users found</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="mt-6">
        {{ $users->links() }}
    </div>
@endsection
