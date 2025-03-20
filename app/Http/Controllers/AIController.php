<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AIController extends Controller
{
    public function generateContent(Request $request)
    {
        $apiKey = env('GEMINI_API_KEY');
        $prompt = $request->input('prompt');

        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
        ])->post("https://generativelanguage.googleapis.com/v1beta/models/gemini-2.0-flash:generateContent?key=$apiKey", [
            "contents" => [
                [
                    "parts" => [
                        ["text" => $prompt]
                    ]
                ]
            ]
        ]);

        // Extract AI-generated content
        $data = $response->json();
        $aiText = $data['candidates'][0]['content']['parts'][0]['text'] ?? 'No AI response';

        return response()->json(['content' => $aiText]);
    }
}
