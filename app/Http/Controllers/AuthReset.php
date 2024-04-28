<?php

namespace App\Http\Controllers;

use App\Http\Requests\Reset;
use App\Http\Requests\Token;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;

class AuthReset extends Controller
{
    public function indexReset()
    {
        return view("reset.reset");
    }
    public function indexUpdate(Request $request)
    {
        $token = $request->query('token');
        $email = $request->query('email');
    
        // Now you have access to $token and $email
        // You can pass them to your view or perform other operations
    
        return view("reset.update", ['token' => $token, 'email' => $email]);
    }
    
    public function forgotPassword(Token $request)
    {

        $request->validated();

        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status === Password::RESET_LINK_SENT
            ? redirect()->to('/login')->with('status', 'We Are Send The Url To Your Email')
            :redirect()->to('/users/reset/password')->with('error', "Don't Foud This Email");

    }

    public function resetPassword(Reset $request)
    {
        $request->validated();
    
        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->save();
            }
        );
    
        return $status === Password::PASSWORD_RESET
            ? redirect()->to('/users/reset/password')->with('status', 'Password has been updated successfully.')
            : redirect()->to('/users/reset/password')->with('error', 'Invalid email or token. Please try again.');
    }
        
}
