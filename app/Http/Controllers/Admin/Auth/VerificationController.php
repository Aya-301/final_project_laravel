<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\UserModel;

class VerificationController extends Controller
{
    public function verify($verification_token)
    
    {
        $user = UserModel::where('verification_token', $verification_token)->first();

        if (!$user) {
            return redirect('admin/login')->with('error', 'Invalid verification token.');
        }

        // Update email_verified_at column and clear verification_token
        $user->email_verified_at = now();
        $user->verification_token = null;
        $user->save();

       // Automatically login the user after verification
       Auth::login($user);
       return redirect('admin/users')->with('success', 'Email verified successfully');
    }
    public function verifyform()
    {
        return view('admin.auth.verify');
    }

}