<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Package;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class StripeWebhookController extends Controller
{
    public function handleWebhook(Request $request)
    {
        $event = $request->all();

        switch ($event['type']) {
            case 'checkout.session.completed':
                $this->handleCheckoutSessionCompleted($event['data']['object']);
                break;

            case 'invoice.payment_succeeded':
                $this->handleInvoicePaymentSucceeded($event['data']['object']);
                break;

            default:
                // Log unhandled events for further review
                Log::info("Unhandled event type: " . $event['type']);
                break;
        }

        return response()->json(['status' => 'success'], 200);
    }

    /**
     * Handle the checkout.session.completed event from Stripe.
     *
     * @param object $session
     */
    protected function handleCheckoutSessionCompleted($session)
    {
        // Retrieve client_id from metadata
        $clientId = $session['metadata']['client_id'] ?? null;

        if ($clientId) {
            $client = Client::find($clientId);

            if ($client && $session['subscription']) {
                // Retrieve the subscription instance
                $subscription = $client->subscription('default');

                // Find the corresponding package based on the Stripe plan ID
                $package = Package::where('stripe_plan_id', $subscription->stripe_plan)->first();

                if ($package) {
                    // Log the subscription in ClientSubscription after payment confirmation
                    $client->logSubscription($package);
                }
            }
        } else {
            Log::warning("Client ID missing in checkout session metadata.");
        }
    }

    /**
     * Handle the invoice.payment_succeeded event for subscription renewals.
     *
     * @param object $invoice
     */
    protected function handleInvoicePaymentSucceeded($invoice)
    {
        $client = Client::where('stripe_id', $invoice['customer'])->first();

        if ($client) {
            // Refresh credits by re-logging the subscription upon successful renewal
            $subscription = $client->subscription('default');
            $package = Package::where('stripe_plan_id', $subscription->stripe_plan)->first();

            if ($package) {
                $client->logSubscription($package);
            }
        }
    }
}
