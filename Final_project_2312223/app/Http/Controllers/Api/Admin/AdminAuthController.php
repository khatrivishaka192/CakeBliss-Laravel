<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminAuthController extends Controller
{
    // Show login form
    public function login()
    {

        return view('admin.login');
    }

    // Handle login POST
    public function loginPost(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Hardcoded admin credentials (for simplicity)
        $adminEmail = 'admin@example.com';
        $adminPassword = 'admin123';

        if ($request->email === $adminEmail && $request->password === $adminPassword) {
            // Store admin session
            Session::put('isAdmin', true);
            return redirect('/admin/dashboard');
        } else {
            return back()->withErrors(['Invalid email or password']);
        }
    }

    // Logout
    public function logout()
    {
        Session::forget('isAdmin');
        return redirect('/admin/login');
    }
}
