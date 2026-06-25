<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    protected $fillable = [
        'name_hi',
        'name_en',
        'slug',
        'type',
        'price',
        'old_price',
        'description_hi',
        'description_en',
        'badge_hi',
        'badge_en',
        'features',
        'comparison_features',
        'is_popular',
        'is_active',
        'sort_order',
    ];

    protected $casts = [
        'features' => 'array',
        'comparison_features' => 'array',
        'is_popular' => 'boolean',
        'is_active' => 'boolean',
        'sort_order' => 'integer',
        'price' => 'integer',
        'old_price' => 'integer',
    ];
}
