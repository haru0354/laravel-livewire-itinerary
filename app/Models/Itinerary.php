<?php

namespace App\Models;

use App\Models\Trip\Trip;
use Illuminate\Database\Eloquent\Model;

class Itinerary extends Model
{
    protected $fillable = [
        'user_id',
        'trip_id',
        'date_and_time',
        'title',
        'content',
        'hide_content',
        'image_url',
        'image_alt',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function trip()
    {
        return $this->belongsTo(Trip::class);
    }
}
