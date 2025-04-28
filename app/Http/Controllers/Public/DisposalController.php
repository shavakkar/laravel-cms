<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Disposal;
use App\Models\YearlyDisposal;

class DisposalController extends Controller
{
    public function index()
    {
        $disposals = Disposal::all();
        $totalcomplaints = Disposal::sum('complaints');
        $totalreceived = Disposal::sum('received');
        $totalresolved = Disposal::sum('resolved');
        $totalpending = Disposal::sum('pending');

        $yearlyDisposals = YearlyDisposal::all();
        $totalYearlyForward = YearlyDisposal::sum('forward');
        $totalYearlyReceived = YearlyDisposal::sum('received');
        $totalYearlyResolved = YearlyDisposal::sum('resolved');
        $totalYearlyPending = YearlyDisposal::sum('pending');

        return view('public.disposal', compact('disposals', 'totalreceived', 'totalresolved', 'totalpending', 'yearlyDisposals', 'totalYearlyForward', 'totalYearlyReceived', 'totalYearlyResolved', 'totalYearlyPending'));
    }
}
