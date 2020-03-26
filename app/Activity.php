<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected $fillable = [
        'all_PartnershipName',
        'act_Business',
        'act_ActivityName', 
    ];
}
