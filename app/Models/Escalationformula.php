<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Escalationformula extends Model
{
    use HasFactory;
     
    protected $fillable = [

        'costComponent',
        'weightage',
        'indexSourceTable',
        'baseIndices',
        'baseDate',
        'endIndices',
        'endDate',
        'frequency',
        'route',
        'status',
        'contract',
        'createdBy',
        'updatedBy',
       
    ];
}
