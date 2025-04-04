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
}
