<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_number',
        'user_id',
        'customer_name',
        'customer_email',
        'customer_phone',
        'amount',
        'currency',
        'item_type',
        'item_title',
        'razorpay_order_id',
        'razorpay_payment_id',
        'razorpay_signature',
        'status',
        'payment_response',
    ];

    protected $casts = [
        'payment_response' => 'array',
        'amount' => 'decimal:2',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function generateOrderNumber(): string
    {
        return 'FND-' . strtoupper(substr(uniqid(), -8)) . '-' . now()->format('ymd');
    }
}
