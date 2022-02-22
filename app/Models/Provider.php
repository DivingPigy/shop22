<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;

class Provider extends Model
{
    use SoftDeletes;
    use LogsActivity;
    
    protected static $logFillable = true;
    protected static $logName = '供货商';
    protected $fillable = ['name'];
}
