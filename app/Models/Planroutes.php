<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Planroutes extends Model
{
    use HasFactory;

    protected $fillable = [

        'name',   
        'contractplanId',
        'routeplanId',
        'routeId',
        'from',
        'to',
        'activity',
        'distance',
        'totalQuantity',
        'estimatedmonthQuantity',
        'unit',
        'rate',
        'formulaId',
        'type',
        'status',
        'resourcePoolStatus',
        'routeCategory',
        'monthly',
        'weekly',
        'daily',
        'confirmation',
        'createdBy',
        'updatedBy',
       
    ];
}
