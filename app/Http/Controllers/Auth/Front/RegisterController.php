<?php

namespace App\Http\Controllers\Auth\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class RegisterController extends Controller
{
    public function index()
    {
        return view('authcate.front.register');
    }


    public function register(Request $request)
    {
        return $this -> create($request -> all()) ?
        redirect()->route('home') : redirect()->route('register');
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]) ? 
        true : false;
    }    
}
