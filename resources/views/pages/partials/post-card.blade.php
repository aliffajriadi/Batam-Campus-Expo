@forelse($posts as $post)
    <div
        class="bg-white/95 backdrop-blur-xl rounded-3xl overflow-hidden shadow-[0_15px_40px_rgba(0,0,0,0.3)] border border-white/20 hover:shadow-[0_20px_50px_rgba(0,0,0,0.4)] transition-all duration-300 group animate-fade-in-up">
        <!-- Post Header -->
        <div class="p-6 md:p-8">
            <div class="flex items-start gap-4 mb-6">
                @if ($post->user->photo)
                    <img src="{{ $post->user->photo }}"
                        class="w-14 h-14 rounded-full border-3 border-[#A61E22]/20 object-cover shadow-lg shrink-0"
                        alt="User Photo">
                @else
                    <div
                        class="w-14 h-14 bg-linear-to-br from-[#A61E22] to-[#8a1a1e] rounded-full flex items-center justify-center shadow-lg shrink-0">
                        <span
                            class="text-white font-bold text-2xl">{{ strtoupper(substr($post->user->name, 0, 1)) }}</span>
                    </div>
                @endif
                <div class="flex-1 min-w-0">
                    <h3 class="text-gray-900 font-bold text-lg truncate">{{ $post->user->name }}</h3>
                    <p class="text-[#A61E22] text-sm font-semibold">{{ $post->user->asal_sekolah ?? 'Alumni BCE' }}</p>
                    <div class="flex items-center gap-2 mt-1">
                        <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <p class="text-gray-500 text-xs">{{ $post->created_at->diffForHumans() }}</p>
                    </div>
                </div>

                @if ((Auth::check() && Auth::id() === $post->user_id) || session()->has('admin_id'))
                    <form action="{{ route('komunitas.post.destroy', $post->id) }}" method="POST"
                        onsubmit="return confirm('Apakah Anda yakin ingin menghapus postingan ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="text-gray-400 hover:text-red-500 transition-colors p-2 hover:bg-red-50 rounded-full"
                            title="Hapus Postingan">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                            </svg>
                        </button>
                    </form>
                @endif
            </div>

            <!-- Post Content -->
            <div class="text-gray-800 text-base md:text-lg mb-6 leading-relaxed bg-gray-50 rounded-2xl p-4 md:p-6">
                {{ $post->content }}
            </div>

            <!-- Post Actions -->
            <div class="flex items-center gap-8 border-t-2 border-gray-100 pt-5">
                <!-- Like Button -->
                <button onclick="toggleLike({{ $post->id }})" id="like-btn-{{ $post->id }}"
                    class="flex items-center gap-2 group/like transition-all {{ Auth::check() && $post->isLikedBy(Auth::user()) ? 'text-[#A61E22]' : 'text-gray-500 hover:text-[#A61E22]' }}">
                    <div
                        class="p-2 rounded-full {{ Auth::check() && $post->isLikedBy(Auth::user()) ? 'bg-[#A61E22]/10' : 'hover:bg-gray-100' }} transition-all">
                        <svg class="w-6 h-6 transition-transform group-hover/like:scale-125 {{ Auth::check() && $post->isLikedBy(Auth::user()) ? 'fill-current' : 'fill-none' }}"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                        </svg>
                    </div>
                    <span id="like-count-{{ $post->id }}"
                        class="font-bold text-sm">{{ $post->likes_count }}</span>
                </button>

                <!-- Comment Count -->
                <div class="flex items-center gap-2 text-gray-500">
                    <div class="p-2 rounded-full hover:bg-gray-100 transition-all">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                        </svg>
                    </div>
                    <span class="font-bold text-sm">{{ $post->comments_count }}</span>
                </div>
            </div>
        </div>

        <!-- Comments Section -->
        <div class="bg-linear-to-br from-gray-50 to-gray-100/50 p-6 md:p-8 border-t-2 border-gray-100">
            @auth
                <form action="{{ route('komunitas.comment.store', $post->id) }}" method="POST"
                    class="mb-6 interaction-form">
                    @csrf
                    <div class="flex gap-3">
                        @if (Auth::user()->photo)
                            <img src="{{ Auth::user()->photo }}"
                                class="w-10 h-10 rounded-full border-2 border-[#A61E22]/20 object-cover shrink-0"
                                alt="Profile">
                        @else
                            <div
                                class="w-10 h-10 bg-linear-to-br from-[#A61E22] to-[#8a1a1e] rounded-full flex items-center justify-center shrink-0">
                                <span
                                    class="text-white font-bold text-sm">{{ strtoupper(substr(Auth::user()->name, 0, 1)) }}</span>
                            </div>
                        @endif
                        <div class="flex-1 flex gap-2">
                            <input type="text" name="content"
                                class="flex-1 bg-white border-2 border-gray-200 rounded-full px-5 py-3 text-gray-800 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-[#A61E22]/30 focus:border-[#A61E22] transition-all"
                                placeholder="Tulis komentar..." required>
                            <button type="submit"
                                class="px-6 py-3 bg-linear-to-br from-[#A61E22] to-[#8a1a1e] text-white rounded-full hover:scale-105 active:scale-95 transition-all shadow-lg shrink-0">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </form>
            @endauth

            <div class="space-y-4">
                @foreach ($post->comments->take(5) as $comment)
                    <div class="flex gap-3 animate-fade-in">
                        @if ($comment->user->photo)
                            <img src="{{ $comment->user->photo }}"
                                class="w-10 h-10 rounded-full border-2 border-gray-200 object-cover shrink-0"
                                alt="User Photo">
                        @else
                            <div class="w-10 h-10 bg-gray-300 rounded-full flex items-center justify-center shrink-0">
                                <span
                                    class="text-gray-600 text-sm font-bold">{{ strtoupper(substr($comment->user->name, 0, 1)) }}</span>
                            </div>
                        @endif
                        <div class="flex-1 bg-white rounded-2xl px-5 py-3 shadow-sm border border-gray-100">
                            <div class="flex items-start justify-between mb-1">
                                <div class="flex-1 min-w-0">
                                    <p class="text-gray-900 font-bold text-sm truncate">{{ $comment->user->name }}</p>
                                    <p class="text-gray-500 text-xs">{{ $comment->user->asal_sekolah ?? 'Alumni' }}</p>
                                </div>
                                <span
                                    class="text-gray-400 text-[10px] shrink-0 ml-2">{{ $comment->created_at->diffForHumans() }}</span>
                            </div>
                            <p class="text-gray-700 text-sm leading-relaxed">{{ $comment->content }}</p>
                        </div>
                    </div>
                @endforeach

                @if ($post->comments_count > 5)
                    <button class="text-[#A61E22] font-semibold text-sm hover:underline ml-14">
                        Lihat {{ $post->comments_count - 5 }} komentar lainnya
                    </button>
                @endif
            </div>
        </div>
    </div>
@empty
    @if (!isset($isAjax))
        <div
            class="text-center py-20 bg-white/80 backdrop-blur-xl rounded-3xl border-2 border-dashed border-white/40 shadow-[0_15px_40px_rgba(0,0,0,0.2)]">
            <div
                class="w-20 h-20 bg-linear-to-br from-[#A61E22]/20 to-[#8a1a1e]/20 rounded-full flex items-center justify-center mx-auto mb-4">
                <svg class="w-10 h-10 text-[#A61E22]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                </svg>
            </div>
            <h3 class="text-xl font-bold text-gray-800 mb-2">Belum ada postingan</h3>
            <p class="text-gray-600">Jadilah yang pertama membagikan cerita Anda!</p>
        </div>
    @endif
@endforelse
