<?php

namespace App\Http\Controllers\AdminAuth;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('admin.login');
    }
    public function login(Request $request)
    {
        // Validate the form data
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        // Attempt to log in the admin using the provided credentials
        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])) {
            // Authentication successful, redirect to the admin dashboard
            return redirect()->route('admin.dashboard');
        } else {
            // Authentication failed, redirect back to the login page with an error message
            return redirect()->back()->with('error', 'Invalid credentials. Please try again.');
        }
    }
}
