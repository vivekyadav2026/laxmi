<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FundingApplicationLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'funding_application_id',
        'type',
        'sender',
        'message',
        'attachment_path',
    ];

    public function application()
    {
        return $this->belongsTo(FundingApplication::class, 'funding_application_id');
    }
}
