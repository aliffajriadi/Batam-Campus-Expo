<?php

namespace App\Http\Controllers;

use App\Models\AiChatSetting;
use App\Models\ChatMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class ChatController extends Controller
{
    public function index()
    {
        $messages = ChatMessage::where('user_id', Auth::id())
            ->orderBy('created_at', 'asc')
            ->get();

        return response()->json($messages);
    }

    public function sendMessage(Request $request)
    {
        $request->validate([
            'message' => 'required|string|max:500',
        ]);

        $setting = \Illuminate\Support\Facades\Cache::remember('ai_chat_settings', 3600, function () {
            return AiChatSetting::first();
        });

        if (!$setting || !$setting->is_active) {
            return response()->json(['error' => 'AI Chat is currently disabled.'], 503);
        }

        $user = Auth::user();
        $userMessage = $request->message;

        // Save User Message
        $savedUserMsg = ChatMessage::create([
            'user_id' => $user->id,
            'message' => $userMessage,
            'is_bot' => false,
        ]);

        // Prepare Prompt
        $systemInstruction = $setting->system_instruction ?? "You are a helpful assistant.";
        $systemInstruction .= "\n\nYou are talking to {$user->name}.";

        // Fetch recent history for context (limit to last 10 messages to save tokens/complexity)
        $history = ChatMessage::where('user_id', $user->id)
            ->where('id', '<', $savedUserMsg->id)
            ->orderBy('created_at', 'desc')
            ->take(10)
            ->get()
            ->reverse();

        $contents = [];
        // 1. Add System Instruction as the very first "user" message (simulated system)
        $contents[] = [
            'role' => 'user',
            'parts' => [['text' => $systemInstruction]]
        ];
        $contents[] = [ // Initial Ack from model
            'role' => 'model',
            'parts' => [['text' => "Understood. I will help {$user->name}."]]
        ];

        foreach ($history as $msg) {
            $role = $msg->is_bot ? 'model' : 'user';
            $contents[] = [
                'role' => $role,
                'parts' => [['text' => $msg->message]]
            ];
        }

        // Add current message
        $contents[] = [
            'role' => 'user',
            'parts' => [['text' => $userMessage]]
        ];

        // Call Gemini API
        $apiKey = $setting->api_key;
        $url = "https://generativelanguage.googleapis.com/v1beta/models/gemini-3-flash-preview:generateContent?key={$apiKey}";

        try {
            $response = Http::post($url, [
                'contents' => $contents
                // 'system_instruction' => ... (Available in 1.5, let's stick to 1.0 prompt injection above for now or use 1.5 if key supports it. Prompt injection is safer fallback)
            ]);

            if ($response->successful()) {
                $data = $response->json();
                $aiText = $data['candidates'][0]['content']['parts'][0]['text'] ?? "Sorry, I couldn't generate a response.";
            } else {
                Log::error('Gemini API Error: ' . $response->body());
                $aiText = "Sorry, I'm having trouble connecting to the AI right now.";
            }
        } catch (\Exception $e) {
            Log::error('Gemini Connection Error: ' . $e->getMessage());
            $aiText = "Sorry, an internal error occurred.";
        }

        // Save AI Response
        $savedBotMsg = ChatMessage::create([
            'user_id' => $user->id,
            'message' => $aiText,
            'is_bot' => true,
        ]);

        return response()->json([
            'user_message' => $savedUserMsg,
            'bot_message' => $savedBotMsg,
        ]);
    }
}
