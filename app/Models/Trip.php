<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    protected $fillable = [
        'user_id',
        'start_date',
        'end_date',
        'title',
        'destination',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function itineraries()
    {
        return $this->hasMany(Itinerary::class);
    }

    public function memos()
    {
        return $this->hasMany(Memo::class);
    }
}
