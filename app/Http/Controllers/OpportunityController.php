<?php

namespace App\Http\Controllers;

use App\Models\Opportunity;
use Carbon\Carbon;

class OpportunityController extends Controller
{
    public function index()
    {
        $opportunities = Opportunity::where('isOpen', 1)
            ->orderByRaw("CASE WHEN deadline >= ? THEN 0 ELSE 1 END", [Carbon::now()])
            ->orderBy('deadline', 'asc')
            ->paginate(6);

        $matched = request()->has('matched') ? Opportunity::first() : null;

        return view('opportunities.index', compact(['opportunities', 'matched']));
    }

    public function show(Opportunity $opportunity)
    {
        return view('opportunities.show', compact('opportunity'));
    }
}
