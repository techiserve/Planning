<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plancontract extends Model
{
    use HasFactory;

       
    protected $fillable = [

        'contractplanId',
        'routeplanId',
        'number',
        'provider',
        'client',
        'clientTwo',
        'activity',
        'duration',
        'forecastMonthlyVolume',
        'forecastWeeklyVolume',
        'forecastDailyVolume',
        'requiredMonthlyDistance',
        'requiredMonthlyVolume',
        'requiredMonthlyQuantity',
        'resourcePoolStatus',
        'commodity',
        'RouteType',
        'RouteId',
        'rate',
        'effectiveDate',
        'formula',
        'contractValue',
        'price',
        'monthly',
        'weekly',
        'daily',
        'confirmation',
        'createdBy',
        'updatedBy',
       
    ];
}
