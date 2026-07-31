<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class FundingProgram extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'organization_name',
        'organization_logo',
        'funding_amount',
        'funding_amount_numeric',
        'country',
        'industry',
        'funding_type',
        'startup_stage',
        'short_description',
        'description',
        'eligibility',
        'required_documents',
        'application_deadline',
        'official_apply_url',
        'is_featured',
        'priority',
        'status',
        'seo_title',
        'seo_description',
        'meta_keywords',
        'og_image',
    ];

    protected $casts = [
        'is_featured' => 'boolean',
        'application_deadline' => 'date',
        'funding_amount_numeric' => 'decimal:2',
    ];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->slug)) {
                $model->slug = Str::slug($model->name . '-' . rand(100, 999));
            }
        });
    }

    public function applications()
    {
        return $this->hasMany(FundingApplication::class);
    }

    public function savedByUsers()
    {
        return $this->belongsToMany(User::class, 'saved_funding_opportunities');
    }
}
