<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plandrivers extends Model
{
    use HasFactory;
    protected $fillable = [

        'contractplanId',
        'routeplanId',
        'assetId',
        'driverId',
        'name',
        'surname',
        'group',  
        'dob',
        'gender',
        'phoneNumber',
        'routeType',
        'licenseNumber',
        'resourcePoolStatus',
        'vehicleType',
        'availability',
        'status',
        'statusReason',
        'monthly',
        'weekly',
        'daily',
        'confirmation',
        'createdBy',
        'updatedBy',
       
    ];
}
