<?php

namespace App\Http\Controllers;

use App\Models\OpportunityConnection;

class ConnectionController extends Controller
{
    public function index()
    {
        $user = request()->user();
        $connections = $user->opportunityConnections;

        return view('connections.index', compact('connections'));
    }

    public function show(OpportunityConnection $connection)
    {
        // TODO: prevent access to non invited connections
        return view('connections.show', compact('connection'));
    }

    public function confirm(OpportunityConnection $connection)
    {
        $connection->status = 1;
        $connection->save();
        $connection->respond();

        return redirect()->back()->with('success', '');
    }

    public function decline(OpportunityConnection $connection)
    {
        $connection->status = 0;
        $connection->save();
        $connection->respond();

        return redirect()->back()->with('success', '');
    }
}
