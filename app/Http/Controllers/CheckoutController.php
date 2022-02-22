<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Alipay\EasySDK\Kernel\Factory;
use Alipay\EasySDK\Kernel\Config;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function index()
    {
        $carts = Cart::where('user_id' , Auth::user() -> id) -> with('game') -> get();
        $result = Factory::payment()->common()->create("iPhone6 16G", "20200326235526001", "88.88", "2088002656718920");
    }
}
