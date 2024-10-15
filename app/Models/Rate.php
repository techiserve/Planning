<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rate extends Model
{
    use HasFactory;

        
    protected $fillable = [

        'make',
        'registration',
        'assetDescription',
        'vinNumber',
        'createdBy',
        'updatedBy',

       
    ];
}
