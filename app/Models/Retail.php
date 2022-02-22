<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;

class Retail extends Model
{
    use SoftDeletes;
    use LogsActivity;
    
    protected static $logFillable = true;
    protected static $logName = '临售';
    protected $fillable = ["game_id" , "exchange_id" , "price" , "inventory_id" , "plateform" , "state" , "dealer" , 'comment'];

    public function game()
    {
        return $this->belongsTo(Game::class);
    }

    public function inventory()
    {
        return $this->belongsTo(Inventory::class);
    }

    public function exchange()
    {
        return $this->belongsTo(Exchange::class);
    }
}
