<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        return view('console.contact');
    }

    public function getContact()
    {
        return Contact::latest()->get();
    }
}
