<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VisitLog extends Model
{
    protected $fillable = [
        'ip',
        'url',
        'referer',
        'user_agent',
        'page_title',
        'stay_time',
    ];
}