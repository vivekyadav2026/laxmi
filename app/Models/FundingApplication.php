<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FundingApplication extends Model
{
    use HasFactory;

    protected $fillable = [
        'application_number',
        'funding_program_id',
        'user_id',
        'founder_name',
        'email',
        'mobile',
        'startup_name',
        'industry',
        'startup_stage',
        'funding_required',
        'startup_description',
        'website',
        'linkedin',
        'pitch_deck_path',
        'business_plan_path',
        'financial_projection_path',
        'additional_notes',
        'package_name',
        'package_price',
        'payment_status',
        'payment_id',
        'razorpay_order_id',
        'assigned_executive',
        'status',
        'admin_notes',
        'internal_comments',
    ];

    public function program()
    {
        return $this->belongsTo(FundingProgram::class, 'funding_program_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function logs()
    {
        return $this->hasMany(FundingApplicationLog::class)->orderBy('created_at', 'desc');
    }

    public static function generateApplicationNumber(): string
    {
        return 'FND-APP-' . strtoupper(substr(uniqid(), -6)) . '-' . date('Ymd');
    }
}
