<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'subscription_id',
        'plan_name',
        'amount',
        'currency',
        'payment_method',
        'status',
        'timestamp',
    ];

    public function subscription()
    {
        return $this->belongsTo(Subscription::class);
    }
}
