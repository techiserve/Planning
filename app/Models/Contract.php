<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    use HasFactory;

    
    protected $fillable = [

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
        'routeresourcePoolStatus',
        'commodity',
        'RouteType',
        'RouteId',
        'rate',
        'effectiveDate',
        'formula',
        'contractValue',
        'price',
        'createdBy',
        'updatedBy',
       
    ];
}
