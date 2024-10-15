<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Routeasset extends Model
{
    use HasFactory;

    protected $fillable = [

        'route',
        'asset',
        'contract',  
        'status',
        'createdBy',
        'updatedBy',
       
    ];
}
