@extends('admin.layouts.app')

@section('title', 'AI Chat Settings')

@section('content')
    <div class="mb-8">
        <h1 class="text-2xl font-bold text-gray-100">AI Chat Settings</h1>
        <p class="text-gray-400 mt-1">Configure Gemini API and Chat Assistant behavior</p>
    </div>

    <div class="max-w-2xl bg-gray-800 rounded-xl p-8 border border-gray-700 shadow-xl">
        <form action="{{ route('admin.ai-settings.update') }}" method="POST" class="space-y-6">
            @csrf

            <div class="flex items-center justify-between p-4 bg-gray-700/50 rounded-lg border border-gray-600">
                <div>
                    <h3 class="text-lg font-medium text-gray-200">Enable AI Chat</h3>
                    <p class="text-sm text-gray-400">Turn the chat widget on or off for users.</p>
                </div>
                <!-- Toggle Switch -->
                <label class="relative inline-flex items-center cursor-pointer">
                    <input type="checkbox" name="is_active" value="1" class="sr-only peer"
                        {{ $setting->is_active ? 'checked' : '' }}>
                    <div
                        class="w-11 h-6 bg-gray-600 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-green-600">
                    </div>
                </label>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-300 mb-2">Gemini API Key</label>
                <input type="text" name="api_key" value="{{ $setting->api_key }}"
                    class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-xl text-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-500 transition"
                    placeholder="Enter your Gemini API Key" required>
                <p class="text-xs text-gray-500 mt-2">Get your key from <a href="https://aistudio.google.com/"
                        target="_blank" class="text-indigo-400 hover:underline">Google AI Studio</a>.</p>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-300 mb-2">System Instruction / Prompt (Kisi-Kisi)</label>
                <textarea name="system_instruction" rows="6"
                    class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-xl text-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-500 transition"
                    placeholder="e.g. You are a helpful assistant for Batam Campus Expo. Answer questions about ticket prices, event schedules, etc.">{{ $setting->system_instruction }}</textarea>
                <p class="text-xs text-gray-500 mt-2">Define how the AI should behave and what knowledge it has.</p>
            </div>

            <div class="pt-4 border-t border-gray-700">
                <button type="submit"
                    class="w-full px-8 py-3 bg-indigo-600 hover:bg-indigo-700 text-white font-bold rounded-xl shadow-lg shadow-indigo-500/20 transition transform active:scale-95">
                    Save Settings
                </button>
            </div>
        </form>
    </div>
@endsection
