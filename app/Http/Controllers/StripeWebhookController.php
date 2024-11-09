<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class StripeWebhookController extends Controller
{
    public function handleWebhook(Request $request)
    {
        $event = $request->all();

        if ($event['type'] === 'invoice.payment_succeeded') {
            $subscription = $event['data']['object']['subscription'];
            $client = Client::where('stripe_id', $subscription['customer'])->first();

            if ($client) {
                // Refresh credits based on the plan
                $planId = $client->subscription('default')->stripe_plan;
                $client->subscribeToPlan($planId);
            }
        }
    }

}
