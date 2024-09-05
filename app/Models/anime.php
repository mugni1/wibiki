<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class anime extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = [
        'name',
        'status',
        'studio',
        'producer',
        'description',
        'image',
        'trailer'
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