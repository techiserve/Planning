<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plandetailshistory extends Model
{
    use HasFactory;

    protected $fillable = [
   
        'plan_id',
        'plandetails_id',
        'route',
        'routeId',
        'date',
        'truck',
        'trips',
        'driver_id',
        'shift',
        'time',
        'createdBy',
        'updatedBy',
       
    ];
}
