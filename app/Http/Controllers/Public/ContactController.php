<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        return view('public.contact');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'mobile' => 'required|numeric|digits:10',
            'message' => 'required|sometimes',
        ]);

        Contact::create($data);

        return response()->json([
            'message' => 'Message Sent Successfully',
            'status' => 'success',
        ]);
    }
}
