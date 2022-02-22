<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Plateform;
// use Spatie\Activitylog\Traits\LogsActivity;

class Game extends Model
{
    use SoftDeletes;
    // use LogsActivity;

    // protected static $logFillable = true;
    // protected static $logName = '游戏';
    protected $fillable = ["name" , "plateform_id" , 'creater' , 'exchange_id' , 'price' , 'cover' , 'image' , 'description'];

    public function plateform()
    {
        return $this->belongsTo(Plateform::class);
    }

    public function inventory(){
        return $this->hasMany(Inventory::class) -> where('state' , 0);
    }

    public function sold(){
        return $this->hasMany(Inventory::class) -> where('state' , config('const.GAME_CODE_DEALT'));
    }

    public function dealing(){
        return $this->hasMany(Inventory::class) -> where('state' , config('const.GAME_CODE_DEALING'));
    }
    
}
