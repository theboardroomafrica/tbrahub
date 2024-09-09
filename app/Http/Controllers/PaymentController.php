<?php

namespace App\Http\Controllers;

use App\Repository\PaymentGateway;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index(Request $request, PaymentGateway $paymentGateway)
    {
        $client = $request->user('client');
        $url = $paymentGateway->simpleCheckoutUrl($client->id, uuid_create(UUID_TYPE_DEFAULT), $request->amount, "Client self service subscription");

        return redirect()->away($url);
    }

    public function success(Request $request)
    {
        $request->user('client')->update(["hasActiveSubscription" => 1]);
        return redirect('clients');
    }

    public function cancel()
    {
        return redirect('clients');
    }
}
