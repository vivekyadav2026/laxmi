<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LiveSessionBooking extends Model
{
    protected $fillable = [
        'name',
        'phone',
        'email',
        'preferred_date',
        'preferred_time',
        'status',
        'notes',
    ];
}
