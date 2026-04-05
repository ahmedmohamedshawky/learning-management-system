<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Models\Category
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @mixin \Eloquent
 */
class Category extends Model
{
    protected $fillable = ['name'];

    /**
     * Get the playlists for the category.
     * @return HasMany
     */
    public function playlists(): HasMany
    {
        return $this->hasMany(Playlist::class);
    }
}
