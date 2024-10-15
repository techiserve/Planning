<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Route extends Model
{
    use HasFactory;


    protected $fillable = [

        'name',
        'contractId',
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
        'routeresourcePoolStatus',
        'routeCategory',
        'createdBy',
        'updatedBy',
       
    ];
}
