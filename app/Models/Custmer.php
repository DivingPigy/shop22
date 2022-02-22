<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;

class Custmer extends Model
{
    use SoftDeletes;
    use LogsActivity;

    protected static $logFillable = true;
    protected static $logName = '客户';
    protected $fillable = ["name"];
}
