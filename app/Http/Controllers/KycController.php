<?php

namespace App\Http\Controllers;

use App\Models\Kyc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KycController extends Controller
{
    public function index()
    {
        return view('console.kyc');
    }

    public function kycPrint($id)
    {
        return view('console.kycPrint')->with('id', $id);
    }

    public function getKyc()
    {
        return Kyc::latest()->get();
    }

    public function getKycById($id)
    {
        $kyc = Kyc::findOrFail($id);
        return $kyc;
    }
}
