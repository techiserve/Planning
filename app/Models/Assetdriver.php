<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assetdriver extends Model
{
    use HasFactory;

    protected $fillable = [

        'asset',
        'driver',  
        'status',
        'createdBy',
        'updatedBy',
       
    ];
}
