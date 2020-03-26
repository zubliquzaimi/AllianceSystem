<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Progress extends Model
{
    protected $fillable = [
        'act_ActivityName',
        'prog_Details',
        'prog_Status',
        'prog_Date'     
    ];
}
