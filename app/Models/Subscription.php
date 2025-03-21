<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'plan_id',
        'payment_method',
        'status',
        'next_billing_date',
    ];

    public function plan()
    {
        return $this->belongsTo(Plan::class);
    }
}
