<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Capability extends Model
{
    use HasFactory;
   
    protected $fillable = [

        'contract',
        'asset',
        'route',
        'capability',
        'status',  
        'createdBy',
        'updatedBy',
       
    ];
}
