<?php

namespace App\Http\Controllers;

use App\Models\Subscription;
use App\Models\Plan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Transaction;

class SubscriptionController extends Controller
{
    public function subscribe(Request $request)
    {
        $request->validate([
            'plan_id' => 'required|exists:plans,id',
            'payment_method' => 'required|string',
        ]);

        $plan = Plan::find($request->plan_id);

        $subscription = Subscription::create([
            'user_id' => Auth::id(),
            'plan_id' => $plan->id,
            'payment_method' => $request->payment_method,
            'status' => 'pending',
            'next_billing_date' => now()->addMonth(),
        ]);

        Transaction::create([
            'user_id' => Auth::id(),
            'subscription_id' => $subscription->id,
            'plan_name' => $plan->name,
            'amount' => $plan->price,
            'currency' => 'USD',
            'payment_method' => $request->payment_method,
            'status' => 'pending',
            'timestamp' => now(),
        ]);

        return response()->json([
            'message' => 'Subscribed successfully',
            'subscription' => $subscription,
        ]);
    }

    public function index()
    {
        $subscriptions = Subscription::with('plan')->where('user_id', Auth::id())->get();

        return response()->json($subscriptions);
    }

}
