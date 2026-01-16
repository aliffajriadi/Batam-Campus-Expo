<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AiChatSetting;
use Illuminate\Http\Request;

class AiChatSettingController extends Controller
{
    public function index()
    {
        $setting = AiChatSetting::firstOrNew();
        return view('admin.ai-settings.index', compact('setting'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'api_key' => 'required|string',
            'system_instruction' => 'nullable|string',
            'is_active' => 'nullable|in:0,1,on', // Switch might send 'on'
        ]);

        $setting = AiChatSetting::firstOrNew();
        $setting->api_key = $request->api_key;
        $setting->system_instruction = $request->system_instruction;
        // Check input for boolean switch / select
        // For select: value is "1" or "0". For checkbox: "1" or null.
        // We cast to boolean.
        $setting->is_active = (bool) $request->input('is_active');
        $setting->save();

        // Clear cache
        \Illuminate\Support\Facades\Cache::forget('ai_chat_settings');

        return redirect()->back()->with('success', 'Settings updated successfully.');
    }
}
