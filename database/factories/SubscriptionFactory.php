<?php

namespace Database\Factories;
use App\Models\User;      
use App\Models\Plan; 
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Subscription>
 */
class SubscriptionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => User::factory(),
            'plan_id' => Plan::factory(),
            'payment_method' => 'visa_1234',
            'status' => 'active',
            'next_billing_date' => now()->addMonth(),
        ];
    }
}
