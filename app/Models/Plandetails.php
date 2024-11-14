<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plandetails extends Model
{
    use HasFactory;
   
    protected $fillable = [
   
        'plan_id',
        'route',
        'routeId',
        'date',
        'truck',
        'trips',
        'shift',
        'driver_id',
        'time',
        'createdBy',
        'updatedBy',
       
    ];

}
