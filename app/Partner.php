<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Partner extends Model
{
    protected $fillable = [
        'part_CompanyName',
        'part_Description',
        'part_ParentCompany',
        'part_Category'       
    ];
}
