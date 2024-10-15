<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Routeratetracker extends Model
{
    use HasFactory;

    protected $fillable = [

        'route',
        'rate',
        'previousRate',  
        'contract',
        'formula',
        'rateMonth',
        'status',
        'activeMonth',
        'createdBy',
        'updatedBy',
       
    ];
}
