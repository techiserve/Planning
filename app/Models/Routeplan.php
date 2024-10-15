<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Routeplan extends Model
{
    use HasFactory;

    protected $fillable = [

        'duration',
        'route',
        'capacity',
        'month',
        'week',
        'daily',
        'activity',
        'status',
        'confirmation',
        'createdBy',
        'updatedBy',
       
    ];
}
