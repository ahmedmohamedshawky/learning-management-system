<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class GeminiService
{
    protected $apiKey;
    protected $baseUrl;

    public function __construct()
    {
        $this->apiKey = config('services.youtube.key');
        $this->baseUrl = config('services.gemini.base_url', 'https://gemini.googleapis.com/v1/models/gemini-1.5-pro/generateContent');
    }

    public function generateCourseTitles($category)
    {
        $prompt = "Generate 15 YouTube course titles about {$category}. Return as a clean numbered list.";
        try {
            $response = Http::post($this->baseUrl . '?key=' . $this->apiKey, [
                "contents" => [
                    [
                        "parts" => [
                            ["text" => $prompt]
                        ]
                    ]
                ]
            ]);

            $text = $response['candidates'][0]['content']['parts'][0]['text'] ?? '';
        } catch (\Exception $e) {
            Log::error('Gemini API Error: ' . $e->getMessage());
            return $text = [
                "Laravel Full Course for Beginners",
                "Advanced PHP Backend Development",
                "Build REST API with Laravel",
                "Laravel Authentication System",
                "Clean Architecture in PHP",
            ];
        }
             return $text = [
                "ai",
                "Laravel Full Course for Beginners",
                "Advanced PHP Backend Development",
                "Build REST API with Laravel",
                "Laravel Authentication System",
                "Clean Architecture in PHP",
            ];
        return $this->extractTitles($text);
    }

    private function extractTitles($text)
    {
        $lines = explode("\n", $text);

        return collect($lines)
            ->map(fn($line) => trim(preg_replace('/^\d+[\).\-\s]*/', '', $line)))
            ->filter()
            ->values()
            ->toArray();
    }
}
