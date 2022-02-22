<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    public function getCartCount()
    {
        $count = 0;
        $carts = $this -> cart;
        foreach($carts as $cart)
        {
            $count += $cart -> quantity;
        }
        return $count;
    }

    public function cart(){
        return $this->hasMany(Cart::class) -> where('user_id' , $this -> id);
    }
}
