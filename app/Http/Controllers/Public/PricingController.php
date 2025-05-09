<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Pricing;

class PricingController extends Controller
{
    public function index()
    {
        // $pricings = Pricing::where('status', 'active')->get();

        $pricings = Pricing::join('services', 'services.id', 'pricings.service_id')->select('pricings.*', 'name')->where('status', 'active')->get();

        return view('public.pricing')->with('pricings', $pricings);
    }
}
