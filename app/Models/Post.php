<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'slug',
        'title_hi',
        'title_en',
        'category',
        'category_label',
        'color',
        'badge_class',
        'excerpt',
        'author',
        'author_initial',
        'author_role',
        'author_bio',
        'date',
        'read_time',
        'takeaways',
        'sections',
        'tags',
        'conclusion',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'takeaways' => 'array',
        'sections' => 'array',
        'tags' => 'array',
    ];
}
