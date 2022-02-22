<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;

class Order extends Model
{
    use SoftDeletes;
    use LogsActivity;

    protected static $logFillable = true;
    protected static $logName = '订单';
    protected $fillable = ['game_id' , 'exchange_id' , 'price' , 'total' , 'custmer_id' , 'state' , 'dealer'];

    public function exchange(){
        return $this->belongsTo(Exchange::class);
    }

    public function game(){
        return $this->belongsTo(Game::class);
    }

    public function custmer(){
        return $this->belongsTo(Custmer::class);
    }
}
