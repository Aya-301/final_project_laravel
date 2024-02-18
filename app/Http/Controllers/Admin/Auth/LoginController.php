<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserModel;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Show the login form.
     *
     * @return \Illuminate\View\View
     */
    public function showLoginForm()
    {
        return view('admin.auth.login');
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        // Validate login data
        $request->validate([
            'userName' => 'required|string',
            'password' => 'required',
        ]);

         // Attempt to authenticate user
        if (Auth::guard('admin')->attempt(['userName' => $request->userName, 'password' => $request->password ])) {
            // Redirect authenticated user to admin dashboard
            return redirect('admin/users');
        }else {
        // Redirect back to login page with error message
            return redirect('admin/login')->with('error', 'Invalid credentials');
        }
        
    }
    

}