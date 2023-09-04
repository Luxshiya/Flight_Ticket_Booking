<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use App\Models\Flight;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function showLoginForm()
    {
    return view('admin.login');
    }

    public function login(Request $request)
    {
    $credentials = $request->only('email', 'password');

    if (Auth::guard('admin')->attempt($credentials)) {
        // Admin login successful, redirect to admin dashboard
        return redirect()->route('admin.dashboard');
    }

    // Admin login failed, redirect back to the login form with an error message
    return redirect()->route('admin.login')->with('error', 'Invalid credentials.');
    }
}
