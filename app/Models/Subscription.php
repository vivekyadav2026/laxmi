<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    protected $fillable = [
        'name',
        'phone',
        'email',
        'startup_name',
        'plan',
        'status',
    ];

    public function planDetails()
    {
        return $this->belongsTo(SubscriptionPlan::class, 'plan', 'slug');
    }
}
