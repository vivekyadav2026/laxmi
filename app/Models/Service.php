<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'service_category_id',
        'name_en',
        'name_hi',
        'price',
        'old_price',
        'time',
        'slug',
        'badge_en',
        'badge_hi',
    ];

    public function category()
    {
        return $this->belongsTo(ServiceCategory::class, 'service_category_id');
    }
}
