<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{

    protected static $logFillable = true;
    protected $fillable = [ "game_id" , "state" , "extracter" , "extract_time" , "content" ];

    public function game()
    {
        return $this->belongsTo(Game::class);
    }
}
