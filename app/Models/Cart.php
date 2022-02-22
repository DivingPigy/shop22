<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = ["user_id" , "game_id" , "quantity"];

    public function game()
    {
        return $this -> belongsTo(Game::class);
    }
}
