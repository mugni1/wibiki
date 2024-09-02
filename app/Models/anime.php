<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class anime extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'status',
        'studio',
        'producer',
        'description',
        'image',
    ];

    /**
     * Get all of the comments for the anime
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */


    public function videos()
    {
        return $this->hasMany(video::class, 'anime_id', 'id');
    }
}