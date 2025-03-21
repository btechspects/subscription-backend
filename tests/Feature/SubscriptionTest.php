<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Plan;
use App\Models\Subscription;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SubscriptionTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_subscribe_to_a_plan()
    {
        $user = User::factory()->create();
        $plan = Plan::factory()->create([
            'name' => 'Basic Plan',
            'price' => 29.99,
            'description' => 'Basic monthly plan',
            'features' => [],
        ]);

        $this->actingAs($user, 'sanctum')
            ->postJson('/api/subscribe', [
                'plan_id' => $plan->id,
                'payment_method' => 'visa_1234',
            ])
            ->assertStatus(200)
            ->assertJson([
                'message' => 'Subscribed successfully',
            ]);

        $this->assertDatabaseHas('subscriptions', [
            'user_id' => $user->id,
            'plan_id' => $plan->id,
            'status' => 'pending',
        ]);
    }

    public function test_fetch_user_subscriptions()
    {
        $user = User::factory()->create();
        $plan = Plan::factory()->create();
        Subscription::factory()->create([
            'user_id' => $user->id,
            'plan_id' => $plan->id,
            'status' => 'active',
        ]);

        $this->actingAs($user, 'sanctum')
            ->getJson('/api/subscriptions')
            ->assertStatus(200)
            ->assertJsonStructure([
                '*' => ['id', 'user_id', 'plan_id', 'status', 'next_billing_date', 'plan']
            ]);
    }
}
