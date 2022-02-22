<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Game;

class Plateform extends Model
{
    use SoftDeletes;
    
    protected $fillable = ['name'];

    public function games(){
        return $this->hasMany(Game::class);
    }
}
