@extends('admin.layouts.app')

@section('title', 'Campus Votes')

@section('content')
    <div class="mb-8">
        <a href="{{ route('admin.campus.index') }}"
            class="text-indigo-400 hover:text-indigo-300 transition flex items-center gap-2 mb-4">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
            </svg>
            Back to Campuses
        </a>
        <div class="flex items-center gap-4">
            @if ($campus->logo_campus)
                <img src="{{ asset('storage/' . $campus->logo_campus) }}" class="w-16 h-16 rounded-xl object-cover"
                    alt="">
            @else
                <div class="w-16 h-16 bg-indigo-600 rounded-xl flex items-center justify-center">
                    <span class="text-xl font-bold text-white">{{ strtoupper(substr($campus->name_campus, 0, 2)) }}</span>
                </div>
            @endif
            <div>
                <h1 class="text-2xl font-bold text-gray-100">{{ $campus->name_campus }}</h1>
                <p class="text-gray-400">{{ $campus->location }} • {{ $campus->votes->count() }} votes</p>
            </div>
        </div>
    </div>

    <div class="bg-gray-800 rounded-xl border border-gray-700 overflow-hidden">
        <table class="w-full">
            <thead class="bg-gray-700/50">
                <tr>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-300 uppercase tracking-wider">#</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-300 uppercase tracking-wider">Voter</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-300 uppercase tracking-wider">Email</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-300 uppercase tracking-wider">Voted At
                    </th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-700">
                @forelse($campus->votes as $index => $vote)
                    <tr class="hover:bg-gray-700/30 transition">
                        <td class="px-6 py-4 text-gray-400">{{ $index + 1 }}</td>
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                @if ($vote->user && $vote->user->photo)
                                    <img src="{{ $vote->user->photo }}" class="w-10 h-10 rounded-full object-cover"
                                        alt="">
                                @else
                                    <div class="w-10 h-10 bg-gray-600 rounded-full flex items-center justify-center">
                                        <span
                                            class="text-sm text-gray-300">{{ strtoupper(substr($vote->user->name ?? 'U', 0, 1)) }}</span>
                                    </div>
                                @endif
                                <p class="text-gray-100 font-medium">{{ $vote->user->name ?? 'Unknown' }}</p>
                            </div>
                        </td>
                        <td class="px-6 py-4 text-gray-400">{{ $vote->user->email ?? '-' }}</td>
                        <td class="px-6 py-4 text-gray-400 text-sm">{{ $vote->created_at }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="px-6 py-12 text-center text-gray-400">No votes yet for this campus</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
