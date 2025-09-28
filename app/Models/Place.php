<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    protected $table = 'MP_PLACES';
    protected $primaryKey = 'PLACE_ID';
    public $timestamps = false;

    protected $fillable = [
        'PLACE_ID',
        'NAME',
        'CREATED_AT',
    ];
}
