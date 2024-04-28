<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RouteController extends Controller
{
    
    public function index() {
        return view("welcome");
    }
    public function login() {
        return view("auths.login.login");
    }
    public function register() {
        return view("auths.register.register");
    }
}
