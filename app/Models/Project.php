<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'title',
        'description',
        'content',
        'image',
        'status',
        'challenges',
        'solutions',
        'technologies',
    ];

    protected $casts = [
        'technologies' => 'array',
    ];
}
