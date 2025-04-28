<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;

class PaymentController extends Controller
{
    public function index()
    {
        return view('public.payment');
    }
}
