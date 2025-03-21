<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Transaction;
use App\Models\Subscription;

class ProcessPendingPayments extends Command
{
    protected $signature = 'payments:process';
    protected $description = 'Process pending subscription payments every 5 seconds';

    public function handle()
    {
        $pendingTransactions = Transaction::where('status', 'pending')->get();

        foreach ($pendingTransactions as $transaction) {
            $transaction->update(['status' => 'success']);
            $subscription = Subscription::find($transaction->subscription_id);
            if ($subscription) {
                $subscription->update(['status' => 'active']);
            }

            $this->info("Processed transaction ID: {$transaction->id}, User: {$transaction->user_id}");
        }
    }
}
