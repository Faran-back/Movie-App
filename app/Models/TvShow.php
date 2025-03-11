<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TvShow extends Model
{
    protected $fillable = [
        'title',
        'description',
        'rating',
        'genre',
        'cover_photo'
    ];
}
