<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\TestMail;
use App\Jobs\MailSent;

class ContactController extends Controller
{
    public function index()
    {
        return view('index.email.email');
    }

    public function post(Request $request)
    {
        $this -> dispatch( new MailSent($request -> all()) );
        return redirect() -> route('home');
    }
}
