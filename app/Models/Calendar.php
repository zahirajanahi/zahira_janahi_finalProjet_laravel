<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Calendar extends Model
{
    //
    protected $fillable = [
        "start",
        "end",
        "user_id",
    
    ];
}
