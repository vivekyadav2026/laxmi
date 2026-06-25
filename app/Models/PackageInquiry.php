<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PackageInquiry extends Model
{
    protected $fillable = [
        'name',
        'phone',
        'email',
        'package_slug',
        'status',
        'notes',
    ];

    /**
     * Get the package details associated with this inquiry.
     */
    public function packageDetails()
    {
        return $this->belongsTo(Package::class, 'package_slug', 'slug');
    }
}
