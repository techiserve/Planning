<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assetdriver extends Model
{
    use HasFactory;

    protected $fillable = [

        'asset_id',
        'driver_id',  
        'status',
        'createdBy',
        'updatedBy',
       
    ];

    public function Asset()
    {
        return $this->belongsTo(Asset::class);
    }

}
