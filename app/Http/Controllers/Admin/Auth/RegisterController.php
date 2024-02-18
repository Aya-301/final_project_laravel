<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\VerifyEmail;
use Illuminate\Support\Str;



class RegisterController extends Controller
{
    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        // Validate registration data
        $request->validate([
            'fullName' => 'required|string|max:50',
            'userName' => 'required|string|max:15|unique:_users',
            'email' => 'required|string|email|max:50|unique:_users',
            'password' => 'required|string|min:8',
        ]);

        // Generate a verification token
        $verification_token = Str::random(60);

        // Create user
        $user = new UserModel();
        $user->fullName = $request->fullName;
        $user->userName = $request->userName;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->active = true; // Automatically activate user
        $user->verification_token = $verification_token;
        $user->save();

        // Generate verification URL
        $verification_url = route('verification.verify', ['verification_token' => $verification_token]);
        $user->verification_url=$verification_url;
        // Send verification email
        Mail::to($user->email)->send(new VerifyEmail($user));
        // Redirect user after registration
        return redirect('admin/verify')->with(['success' => 'User registered successfully', 'verification_url' => $verification_url]);


    }

        /**
     * Show the registration form.
     *
     * @return \Illuminate\View\View
     */
    public function showRegistrationForm()
    {
        return view('admin.auth.register');
    }
}
