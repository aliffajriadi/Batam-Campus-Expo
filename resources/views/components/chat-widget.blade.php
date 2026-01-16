@php
    // Use Cache manually here if view composer isn't set up yet, or rely on Controller caching later.
// For now, let's keep it simple but safe.
    $chatSetting = \Illuminate\Support\Facades\Cache::remember('ai_chat_settings', 3600, function () {
        return \App\Models\AiChatSetting::first();
    });
@endphp

@if ($chatSetting && $chatSetting->is_active)
    <div x-data="chatWidget()" x-init="init()"
        class="fixed bottom-6 right-6 z-[9999] flex flex-col items-end gap-2 font-sans" style="display: none;"
        x-show="true">
        <!-- Chat Window -->
        <div x-show="isOpen" x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 translate-y-4 scale-95"
            x-transition:enter-end="opacity-100 translate-y-0 scale-100"
            x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100 translate-y-0 scale-100"
            x-transition:leave-end="opacity-0 translate-y-4 scale-95"
            class="w-[90vw] md:w-[350px] h-[500px] bg-white rounded-2xl shadow-2xl border border-gray-200 flex flex-col overflow-hidden mb-2 relative">

            <!-- Header -->
            <div class="bg-gradient-to-r from-[#D32F2F] to-[#B71C1C] p-4 flex justify-between items-center text-white">
                <div class="flex items-center gap-2">
                    <div
                        class="w-8 h-8 bg-white/20 rounded-full flex items-center justify-center backdrop-blur-sm shrink-0 overflow-hidden">
                        <img src="{{ asset('images/logo.png') }}" alt="AI Chat"
                            class="w-full h-full object-cover object-center rounded-full">
                    </div>
                    <div>
                        <h3 class="font-bold text-sm text-[#fbbf24]">BCE AI Assistant</h3>
                        <p class="text-[10px] opacity-80 flex items-center gap-1">
                            <span class="w-1.5 h-1.5 bg-green-400 rounded-full animate-pulse"></span> Online
                        </p>
                    </div>
                </div>
                <button @click="toggle()" class="hover:bg-white/20 p-1 rounded-lg transition text-white">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <!-- Messages -->
            <div class="flex-1 overflow-y-auto p-4 space-y-4 bg-gray-50 scroll-smooth relative"
                x-ref="messagesContainer">

                @guest
                    <!-- Guest Overlay -->
                    <div
                        class="absolute inset-0 z-10 bg-white/60 backdrop-blur-[2px] flex flex-col items-center justify-center p-6 text-center">
                        <div class="bg-white p-6 rounded-2xl shadow-xl border border-gray-100 max-w-xs">
                            <div
                                class="w-12 h-12 bg-[#D32F2F]/10 rounded-full flex items-center justify-center mx-auto mb-3">
                                <svg class="w-6 h-6 text-[#D32F2F]" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z">
                                    </path>
                                </svg>
                            </div>
                            <h3 class="font-bold text-gray-800 mb-2">login dulu yaahh 😋</h3>
                            <p class="text-xs text-gray-500 mb-4">Silahkan login dulu biar ngobrol sama ai asisten BCE.</p>

                            <div class="flex flex-col gap-2">
                                <a href="{{ route('google.login') }}"
                                    class="flex items-center justify-center gap-2 w-full bg-[#D32F2F] hover:bg-[#B71C1C] text-white py-2 rounded-lg text-xs font-bold transition shadow-lg shadow-red-200">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                        <path
                                            d="M12.545,10.239v3.821h5.445c-0.712,2.315-2.647,3.972-5.445,3.972c-3.332,0-6.033-2.701-6.033-6.032s2.701-6.032,6.033-6.032c1.498,0,2.866,0.549,3.921,1.453l2.814-2.814C17.503,2.988,15.139,2,12.545,2C7.021,2,2.543,6.477,2.543,12s4.478,10,10.002,10c8.396,0,10.249-7.85,9.426-11.748L12.545,10.239z" />
                                    </svg>
                                    Login Google
                                </a>
                                {{-- <a href="{{ route('admin.login') }}" class="text-[10px] text-gray-400 hover:text-gray-600 underline">Admin Login</a> --}}
                            </div>
                        </div>
                    </div>
                @endguest

                <template x-for="msg in messages" :key="msg.id">
                    <div class="flex" :class="msg.is_bot ? 'justify-start' : 'justify-end'">
                        <div class="max-w-[85%] rounded-2xl p-3 text-sm shadow-sm"
                            :class="msg.is_bot ? 'bg-white text-gray-800 rounded-tl-none border border-gray-100' :
                                'bg-[#D32F2F] text-white rounded-tr-none'">
                            <!-- Use x-html for markdown rendering -->
                            <p x-html="parseMarkdown(msg.message)" class="leading-relaxed"></p>
                            <span class="text-[10px] mt-1 block opacity-60" x-text="formatTime(msg.created_at)"
                                :class="msg.is_bot ? 'text-gray-400' : 'text-red-100 text-right'"></span>
                        </div>
                    </div>
                </template>

                <!-- Loading Indicator -->
                <div x-show="isLoading" class="flex justify-start">
                    <div
                        class="bg-white rounded-2xl rounded-tl-none p-3 border border-gray-100 shadow-sm flex items-center gap-2">
                        <div class="w-2 h-2 bg-[#D32F2F] rounded-full animate-bounce"></div>
                        <div class="w-2 h-2 bg-[#D32F2F] rounded-full animate-bounce [animation-delay:-0.15s]"></div>
                        <div class="w-2 h-2 bg-[#D32F2F] rounded-full animate-bounce [animation-delay:-0.3s]"></div>
                    </div>
                </div>
            </div>

            <!-- Input -->
            <div class="p-3 bg-white border-t border-gray-100 relative z-20">
                <form @submit.prevent="sendMessage" class="flex items-center gap-2">
                    <div class="flex-1 relative">
                        <input type="text" x-model="newMessage" placeholder="Tanya sesuatu..." maxlength="500"
                            class="w-full bg-gray-100 text-gray-800 text-sm rounded-full pl-4 pr-12 py-2.5 focus:outline-none focus:ring-2 focus:ring-[#D32F2F] transition border-none placeholder-gray-400 disabled:opacity-50"
                            :disabled="isLoading @guest || true @endguest">
                        <!-- Character Counter -->
                        <span class="absolute right-3 top-1/2 -translate-y-1/2 text-[10px] text-gray-400 font-medium"
                            x-show="newMessage.length > 0" x-text="newMessage.length + '/500'"></span>
                    </div>

                    <button type="submit"
                        class="bg-[#D32F2F] hover:bg-[#B71C1C] text-white p-2.5 rounded-full shadow-lg shadow-red-500/30 transition transform active:scale-95 disabled:opacity-50 disabled:cursor-not-allowed"
                        :disabled="!newMessage.trim() || isLoading @guest || true @endguest">
                        <svg class="w-5 h-5 transform rotate-90" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8" />
                        </svg>
                    </button>
                </form>
                <div class="text-center mt-2 flex justify-center items-center gap-1">
                    <svg class="w-3 h-3 text-gray-400" fill="currentColor" viewBox="0 0 24 24">
                        <path
                            d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-1 17.93c-3.95-.49-7-3.85-7-7.93 0-.62.08-1.21.21-1.79L9 15v1c0 1.1.9 2 2 2v1.93zm6.9-2.54c-.26-.81-1-1.39-1.9-1.39h-1v-3c0-.55-.45-1-1-1H8v-2h2c.55 0 1-.45 1-1V7h2c1.1 0 2-.9 2-2v-.41c2.93 1.19 5 4.06 5 7.41 0 2.08-.8 3.97-2.1 5.39z" />
                    </svg>
                    <p class="text-[10px] text-gray-400">AI Bisa saja salah, jikalau pertanyaan kamu tidak pas, silahkan
                        hubungi nomor tertera.</p>
                </div>
            </div>
        </div>

        <!-- Toggle Button -->
        <button @click="toggle()"
            class="group relative flex items-center justify-center w-14 h-14 bg-gradient-to-br from-[#D32F2F] to-[#B71C1C] text-white rounded-full shadow-lg hover:shadow-red-500/40 transition-all duration-300 transform hover:scale-110 z-50 border-2 border-white/20">
            <span
                class="absolute -top-1 -right-1 w-4 h-4 bg-[#fbbf24] rounded-full border-2 border-white animate-bounce"
                x-show="!isOpen && hasNewMessages"></span>
            <svg x-show="!isOpen" class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" />
            </svg>
            <svg x-show="isOpen" class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                style="display: none;">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
            </svg>
        </button>
    </div>

    <script>
        function chatWidget() {
            return {
                isOpen: false,
                messages: [],
                newMessage: '',
                isLoading: false,
                hasNewMessages: false,

                init() {
                    @auth
                    this.fetchHistory();
                @endauth
            },

            toggle() {
                    this.isOpen = !this.isOpen;
                    if (this.isOpen) {
                        this.scrollToBottom();
                        // Reset notification indicator
                        this.hasNewMessages = false;
                    }
                },

                // Markdown Parser Function
                parseMarkdown(text) {
                    if (!text) return '';

                    // 1. Escape HTML (Sanitize)
                    let safeText = text
                        .replace(/&/g, "&amp;")
                        .replace(/</g, "&lt;")
                        .replace(/>/g, "&gt;")
                        .replace(/"/g, "&quot;")
                        .replace(/'/g, "&#039;");

                    // 2. Parse Bold (**text**)
                    safeText = safeText.replace(/\*\*(.*?)\*\*/g, '<strong class="font-bold">$1</strong>');

                    // 3. Parse Italic (*text*)
                    safeText = safeText.replace(/\*(.*?)\*/g, '<em class="italic">$1</em>');

                    // 4. Parse Newlines and Lists
                    safeText = safeText.replace(/\n/g, '<br>');

                    return safeText;
                },

                async fetchHistory() {
                        try {
                            const response = await fetch("{{ route('chat.history') }}");
                            if (response.ok) {
                                this.messages = await response.json();
                                this.scrollToBottom();
                            }
                        } catch (error) {
                            console.error('Failed to fetch chat history', error);
                        }
                    },

                    async sendMessage() {
                            if (!this.newMessage.trim()) return;
                            if (this.newMessage.length > 500) {
                                alert('Pesan terlalu panjang (Maks 500 karakter).');
                                return;
                            }

                            const userMsg = this.newMessage;
                            this.newMessage = '';
                            this.isLoading = true;

                            // Optimistic UI update
                            this.messages.push({
                                id: Date.now(),
                                message: userMsg,
                                is_bot: false,
                                created_at: new Date().toISOString()
                            });
                            this.scrollToBottom();

                            try {
                                const response = await fetch("{{ route('chat.send') }}", {
                                    method: 'POST',
                                    headers: {
                                        'Content-Type': 'application/json',
                                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                                    },
                                    body: JSON.stringify({
                                        message: userMsg
                                    })
                                });

                                if (response.ok) {
                                    const data = await response.json();
                                    this.messages.push(data.bot_message);
                                } else {
                                    // Handle throttle error explicitly
                                    if (response.status === 429) {
                                        this.messages.push({
                                            id: Date.now() + 1,
                                            message: "Anda mengirim pesan terlalu cepat. Mohon tunggu sebentar.",
                                            is_bot: true,
                                            created_at: new Date().toISOString()
                                        });
                                    } else {
                                        this.messages.push({
                                            id: Date.now() + 1,
                                            message: "Gagal mengirim pesan. Silakan coba lagi.",
                                            is_bot: true,
                                            created_at: new Date().toISOString()
                                        });
                                    }
                                }
                            } catch (error) {
                                console.error('Error sending message', error);
                                this.messages.push({
                                    id: Date.now() + 1,
                                    message: "Gagal terhubung ke server.",
                                    is_bot: true,
                                    created_at: new Date().toISOString()
                                });
                            } finally {
                                this.isLoading = false;
                                this.scrollToBottom();
                            }
                        },

                        scrollToBottom() {
                            this.$nextTick(() => {
                                const container = this.$refs.messagesContainer;
                                if (container) {
                                    container.scrollTop = container.scrollHeight;
                                }
                            });
                        },

                        formatTime(isoString) {
                            const date = new Date(isoString);
                            return date.toLocaleTimeString([], {
                                hour: '2-digit',
                                minute: '2-digit'
                            });
                        }
        }
        }
    </script>
@endif
