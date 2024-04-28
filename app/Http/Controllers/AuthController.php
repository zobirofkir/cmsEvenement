<?php

namespace App\Http\Controllers;

use App\Http\Requests\Login;
use App\Http\Requests\Register;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Response;

class AuthController extends Controller
{
    public function __construct(){
        $this->middleware("auth:api", ['except'=> ['login', 'register']]);
    }

    public function register(Register $request){
        

        if (User::where("email", $request->email)->first()) {
            return redirect('/register');
        }

        User::create($request->validated());

        // $token = Auth::login($user);
        return redirect('/login')->with("success", "Registration successful. You can now login.");
    }

    public function login(Login $request)
    {
        $request->validated();
    
        $credentials = $request->only('email', 'password');
        $token = Auth::attempt($credentials);
    
        if (!$token) {
            return redirect('/login')->with('error', "Don't found this account");
        } else {
            // Save token in a cookie
            $response = redirect("/users/dashboard")->with("success", "");
            $response->withCookie(cookie('token', $token, 60 * 24)); // Cookie expires in 24 hours
            return $response;
        }
    }

    public function logout(Request $request){
        Auth::logout();
        return redirect('/');
    }
}
