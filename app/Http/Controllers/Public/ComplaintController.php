<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Complaint;

class ComplaintController extends Controller
{
    public function index()
    {
        $complaints = Complaint::all();
        $totalMonthPending = Complaint::sum('monthpending');
        $totalReceived = Complaint::sum('received');
        $totalResolved = Complaint::sum('resolved');
        $totalPending = Complaint::sum('pending');
        $totalPending3 = Complaint::sum('pending3');
        $totalAvg = Complaint::sum('avg');

        return view('public.complaint', compact("complaints", "totalMonthPending", "totalReceived", "totalResolved", "totalPending", "totalPending3", "totalAvg"));
    }
}
