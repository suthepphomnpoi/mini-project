<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    protected $table = 'MP_VEHICLES';
    protected $primaryKey = 'id';

    public function type()
    {
        return $this->belongsTo(VehicleType::class, 'vehicle_type_id');
    }
}

