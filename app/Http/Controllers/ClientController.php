<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{
    public function pricing(Request $request)
    {
        if ($request->user('client')->hasActiveSubscription) return redirect('clients');
        return view('clients.pricing');
    }

    public function status(Request $request)
    {
        if ($request->user('client')->isApproved) return redirect('clients');
        return view('clients.status');
    }

    public function pay(Request $request)
    {
        $request->user('client')->update(["hasActiveSubscription" => 1]);
        return redirect('clients');
    }

    public function logout(Request $request)
    {
        Auth::guard('client')->logout();
        return redirect('/clients/login');
    }
}
