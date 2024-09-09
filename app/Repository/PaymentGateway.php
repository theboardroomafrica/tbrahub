<?php

namespace App\Repository;

use Stripe\StripeClient;

class PaymentGateway
{
    /*
     * simple checkout should only have customerId and transactionId
     * total amount, product name, etc. will be retrieved from db based on transactionId
     */
    public function simpleCheckoutUrl($customerId, $transactionId, $totalAmount, $productName): ?string
    {
        $lineItems = $this->createSimpleLineItem($productName, $totalAmount);
        return $this->getCheckoutUrl($customerId, $transactionId, $totalAmount, $lineItems);
    }

    /*
     * This will be mostly for multiple products and services
     * should only accept customerId and productId[]
     */
    private function getCheckoutUrl($customerId, $transactionId, $totalAmount, $lineItems): ?string
    {
        $stripeClient = new StripeClient(env('STRIPE_SECRET'));

        $checkout = $stripeClient->checkout->sessions->create([
            'line_items' => $lineItems,
            'mode' => 'payment',
            'payment_intent_data' => [
                'metadata' => [
                    'customer_id' => $customerId,
                    'transaction' => $transactionId,
                    'amount' => $totalAmount * 100
                ],
            ],
            'success_url' => route('payment.success'),
            'cancel_url' => route('payment.cancel'),
        ]);

        return $checkout->url;
    }

    private function createSimpleLineItem($productName, $totalAmount): array
    {
        return [
            [
                'price_data' => [
                    'currency' => 'usd',
                    'product_data' => [
                        'name' => $productName,
                    ],
                    'unit_amount' => $totalAmount * 100
                ],
                'quantity' => 1
            ],
        ];
    }
}
