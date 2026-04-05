<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Playlist;
use Illuminate\Http\Request;

class PlaylistController extends Controller
{

    public function index(Request $request)
    {
        $playlists = Playlist::when($request->input('filter') && $request->input('filter') !== 'all', function ($query) use ($request) {
            $query->whereHas('category', function ($q) use ($request) {
                $q->where('name', $request->input('filter'));
            });
        })->latest()->get();
        $categories = Category::withCount('playlists')->get();
        return view('playlists.index', compact('playlists', 'categories'));
    }

    public function generateCourses(Request $request)
    {
        $categoryName = $request->input('category_name');

        $gemini = app(\App\Services\GeminiService::class);
        $youtube = app(\App\Services\YouTubeService::class);

        $titles = $gemini->generateCourseTitles($categoryName);
        foreach ($titles as $title) {

            $playlists = $youtube->searchPlaylists($title);
            foreach ($playlists as $playlist) {
                $category = Category::firstOrCreate(['name' => $categoryName]);
                if (Playlist::where('youtube_playlist_id', $playlist['playlist_id'])->exists()) {
                    continue; // Skip if playlist already exists
                }
                Playlist::create([
                    'youtube_playlist_id' => $playlist['playlist_id'],
                    'title' => $playlist['title'],
                    'description' => $playlist['description'],
                    'thumbnail' => $playlist['thumbnail'],
                    'channel_name' => $playlist['channelTitle'],
                    'category_id' => $category->id,
                ]);
            }
        }
        return redirect()->route('playlists.index')->with('success', 'Playlists generated successfully!');
    }
}
