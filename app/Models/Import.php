<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;

class Import extends Model
{
    use SoftDeletes;
    use LogsActivity;

    protected static $logFillable = true;
    protected static $logName = '采购';
    protected $fillable = ["total" , "imported" , "exchange_id" , "price" , "game_id" , "provider_id" , "creater" , "status"];

    public function game(){
        return $this->belongsTo(Game::class);
    }

    public function provider(){
        return $this->belongsTo(Provider::class);
    }

    public function exchange(){
        return $this->belongsTo(Exchange::class);
    }

    public function importInc(){
        $this -> imported = $this -> imported + 1;

        if($this -> imported < $this -> total) {
            $this -> status = config('const.IMPORT_ON');
            $this -> save();
            return;
        } elseif($this -> imported == $this -> total) {
            $this -> status = config('const.IMPORT_FINISH');
            $this -> save();
            return;
        }
    }
}
