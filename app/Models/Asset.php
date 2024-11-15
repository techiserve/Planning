<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    use HasFactory;


    protected $fillable = [

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
        'isAssigned',

        'assetnumber1',
        'regNumber1',
        'regexpdate1',

        'assetnumber2',
        'regNumber2',
        'regexpdate2',

        'resourcePoolStatus',
        'routeresourcePoolStatus',
        'registrationExpireDate',
        'createdBy',
        'updatedBy',

       
    ];

    public function drivers()
    {
        return $this->hasMany(Assetdriver::class);
    }
}
