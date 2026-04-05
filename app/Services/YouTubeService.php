<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class YouTubeService
{
    protected $apiKey;

    protected $baseUrl;

    public function __construct()
    {
        $this->apiKey = config('services.youtube.key');
        $this->baseUrl = config('services.youtube.base_url', 'https://www.googleapis.com/youtube/v3/search');

    }

    public function searchPlaylists($query)
    {
        $response = Http::get($this->baseUrl, [
            'key' => $this->apiKey,
            'q' => $query,
            'type' => 'playlist',
            'part' => 'snippet',
            'maxResults' => 2
        ]);

        return collect($response['items'] ?? [])->map(function ($item) {
            return [
                'playlist_id' => $item['id']['playlistId'],
                'title' => $item['snippet']['title'],
                'description' => $item['snippet']['description'],
                'channelId' => $item['snippet']['channelId'],
                'publishedAt' => $item['snippet']['publishedAt'],
                'channelTitle' => $item['snippet']['channelTitle'],
                'thumbnail' => $item['snippet']['thumbnails']['medium']['url'] ?? $item['snippet']['thumbnails']['medium']['url'],
            ];
        })->toArray();
    }
}
