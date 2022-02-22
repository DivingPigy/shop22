<?php

namespace App\Http\Controllers\Auth\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        return $this -> loginSystem($credentials) ?
        redirect()-> route('admin.index') : redirect()-> route('admin.login');
    }

    protected function loginSystem(array $credentials)
    {
        return Auth::guard('manager') -> attempt($credentials);
    }

    public function logout()
    {
        Auth::logout();
        return redirect() -> route('admin.login');
    }
}
