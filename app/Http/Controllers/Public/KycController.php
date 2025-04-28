<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Kyc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KycController extends Controller
{
    public function index()
    {
        return view('public.kycForm');
    }
    public function submit()
    {
        return view('public.KycSuccess');
    }

    public function store(Request $request)
    {
        $messages = [
            'name.regex' => 'Only alphabets are allowed.',
            'permAddress1.required' => 'Permanent Address line 1 is required',
            'permAddress2.required' => 'Permanent Address line 2 is required',
            'permCity.required' => 'Permanent City field is required',
            'permState.required' => 'Permanent State field is required',
            'permCity.regex' => 'Only alphabets are allowed',
            'permState.regex' => 'Only alphabets are allowed',
            'permPin.required' => 'Pincode field is required',
            'permPin.numeric' => 'Pincode field must be a number',
            'permPin.digits' => 'Pincode field must be 6 digits',
            'currentAddress1.required' => 'Current Address line 1 is required',
            'currentAddress2.required' => 'Current Address line 2 is required',
            'currentCity.required' => 'Current City field is required',
            'currentState.required' => 'Current State field is required',
            'currentCity.regex' => 'Only alphabets are allowed',
            'currentState.regex' => 'Only alphabets are allowed',
        ];

        $validated = $request->validate([
            'name' => 'required|regex:/^[\pL\s]+$/u',
            'email' => 'required|email|unique:kycs,email',
            'mobile' => 'required|numeric|digits:10|unique:kycs,mobile',
            'aadhar' => 'required|numeric|digits:12|unique:kycs,aadhar',
            'pan' => 'required|unique:kycs,pan|size:10',
            'permAddress1' => 'required|string',
            'permAddress2' => 'required|string',
            'permCity' => 'required|regex:/^[\pL\s]+$/u',
            'permState' => 'required|regex:/^[\pL\s]+$/u',
            'permPin' => 'required|numeric|digits:6',
            'currentAddress1' => 'required|string',
            'currentAddress2' => 'required|string',
            'currentState' => 'required|regex:/^[\pL\s]+$/u',
            'currentCity' => 'required|regex:/^[\pL\s]+$/u',
            'currentPin' => 'required|numeric|digits:6',
            'aadharphoto' => 'required|image|max:300',
            // 'aadharphoto*' => ['image', 'mimes:jpeg,jpg,png'],
            'panphoto' => 'required|image|max:300',
            // 'panphoto.*' => ['mimes:jpeg,jpg,png'],
            'userphoto' => 'required|image|max:300',
            // 'userphoto.*' => ['mimes:jpeg,jpg,png'],
        ], $messages);


        if ($request->hasFile('aadharphoto')) {
            $filePath = Storage::disk('public')->put('kyc/aadhar', $request->file('aadharphoto'));
            $validated['aadharphoto'] = $filePath;
        }

        if ($request->hasFile('panphoto')) {
            $filePath = Storage::disk('public')->put('kyc/pan', $request->file('panphoto'));
            $validated['panphoto'] = $filePath;
        }

        if ($request->hasFile('userphoto')) {
            $filePath = Storage::disk('public')->put('kyc/userPhotos', $request->file('userphoto'));
            $validated['userphoto'] = $filePath;
        }

        $create = Kyc::create($validated);

        return response()->json([
            'message' => 'Form Submitted Successfully',
            'status' => 'success',
            // 'data' => $create
        ]);
    }
}
