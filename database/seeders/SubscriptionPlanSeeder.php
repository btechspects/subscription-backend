<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Plan;

class SubscriptionPlanSeeder extends Seeder
{
    public function run()
    {
        Plan::create([
            'name' => 'Standard Plan',
            'price' => 29.99,
            'description' => 'For growing businesses',
            'features' => [
                ["text" => "Access to basic features", "icon" => "fas fa-check-circle"],
                ["text" => "Higher API limits", "icon" => "fas fa-check-circle"],
                ["text" => "Email & chat support", "icon" => "fas fa-check-circle"],
                ["text" => "Basic analytics", "icon" => "fas fa-check-circle"]
            ]
        ]);

        Plan::create([
            'name' => 'Pro Plan',
            'price' => 49.99,
            'description' => 'For bigger businesses',
            'features' => [
                ["text" => "Everything in Standard Plan", "icon" => "fas fa-check-circle"],
                ["text" => "Unlimited API access", "icon" => "fas fa-check-circle"],
                ["text" => "Priority customer support", "icon" => "fas fa-check-circle"],
                ["text" => "Custom integrations", "icon" => "fas fa-check-circle"]
            ]
        ]);

        Plan::create([
            'name' => 'Enterprise Plan',
            'price' => null,
            'description' => 'For large teams & businesses',
            'features' => [
                ["text" => "Everything in Pro Plan", "icon" => "fas fa-check-circle"],
                ["text" => "Dedicated account manager", "icon" => "fas fa-check-circle"],
                ["text" => "SLA-backed uptime guarantee", "icon" => "fas fa-check-circle"],
                ["text" => "Custom API limits & integrations", "icon" => "fas fa-check-circle"]
            ]
        ]);
    }
}
