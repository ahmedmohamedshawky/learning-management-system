<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\Playlist
 *
 * @property int $id
 * @property string $youtube_playlist_id
 * @property string $Title
 * @property string $description
 * @property string|null $Thumbnail
 * @property string $channel_name
 * @property int $category_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @mixin \Eloquent
 */
class Playlist extends Model
{

    protected $fillable = [
        'youtube_playlist_id',
        'title',
        'description',
        'thumbnail',
        'channel_name',
        'category_id',
    ];

    /**
     * Get the category that owns the playlist.
     * @return BelongsTo
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
