<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Monthlyforecast extends Model
{
    use HasFactory;

    protected $fillable = [

        'horizon',   
        'contract',
        'route',
        'forecastValue',
        'month',
        'description',
        'status',
        'createdBy',
        'updatedBy',
       
    ];
}
