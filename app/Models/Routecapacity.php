<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Routecapacity extends Model
{
    use HasFactory;

    protected $fillable = [

        'route',
        'contractVolume',
        'totalforecast',
        'monthlyforecast',
        'capacity',
        'additionalcapacityrequired',
        'status',
        'createdBy',
        'updatedBy',
       
    ];
}
