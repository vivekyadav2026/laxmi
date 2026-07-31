<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceCategory extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug', 'count', 'page_content'];

    protected $casts = [
        'page_content' => 'array',
    ];

    public function services()
    {
        return $this->hasMany(Service::class);
    }
}
