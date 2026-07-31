<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SavedFundingOpportunity extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'funding_program_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function program()
    {
        return $this->belongsTo(FundingProgram::class, 'funding_program_id');
    }
}
