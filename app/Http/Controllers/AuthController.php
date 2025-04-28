<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function loginPage(Request $request)
    {
        // $user = User::first();

        // if (!$user) return view('console.auth.admin');

        return view('console.auth.login');
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|exists:users,email',
            'password' => 'required',
        ], [
            'email.required' => 'Email is required',
            'email.email' => 'Email is Not Valid!',
            'email.exists' => "Email doesn't exists",
            'password.required' => 'Password is required'
        ]);
        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        } else {

            if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
                return redirect()->route('console.home');
            } else {
                return redirect()
                    ->back()
                    ->withInput()
                    ->withErrors([
                        'password' => 'Wrong Password!'
                    ]);
            }
        }
    }

    public function logout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
