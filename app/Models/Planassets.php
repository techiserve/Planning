<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Planassets extends Model
{
    use HasFactory;

    protected $fillable = [

        'contractplanId',
        'routeplanId',
        'assetId',
        'make',
        'registration',
        'assetDescription',
        'vinNumber',
        'assetType',
        'weight',
        'tonnage',
        'driverId',
        'statusReason',
        'routeId',
        'licenseNumber',
        'payloadCapacity',
        'status',
        'mileage',
        'fueltype',
        'model',
        'gearType',
        'registrationYear',
        'engineCapacity',
        'expectedFuelConsumption',
        'truckType',
        'trailerType',
        'resourcePoolStatus',
        'registrationExpireDate',
        'monthly',
        'weekly',
        'daily',
        'confirmation',
        'createdBy',
        'updatedBy',
  
    ];
}
