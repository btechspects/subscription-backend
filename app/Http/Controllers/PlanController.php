<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use Illuminate\Http\Request;

class PlanController extends Controller
{
    public function index()
    {
        $plans = Plan::all()->map(function($plan) {
            if (is_string($plan->features)) {
                $plan->features = json_decode($plan->features, true);
            }
            return $plan;
        });
    
        return response()->json($plans);
    }
}
