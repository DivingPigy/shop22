<?php

namespace App\Http\Controllers\Auth\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        return $this -> loginSystem($credentials) ?
        redirect()-> route('home') : redirect()-> route('login');
    }

    protected function loginSystem(array $credentials)
    {
        return Auth::attempt($credentials);
    }

    public function logout()
    {
        Auth::logout();
        return redirect() -> route('home');
    }
}
