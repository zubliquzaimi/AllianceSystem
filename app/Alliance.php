<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alliance extends Model
{
    protected $fillable = [
        'part_CompanyName',
        'all_PartnershipName',
        'all_Collaboration',
        'all_PetEquity',
        'all_PartnerEquity',
        'all_Phases',
        'all_Attachment'       
    ];
}
