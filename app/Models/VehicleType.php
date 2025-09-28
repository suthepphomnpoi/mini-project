<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VehicleType extends Model
{
    protected $table = 'MP_VEHICLE_TYPES';
    protected $primaryKey = 'id';

    public function vehicles()
    {
        return $this->hasMany(Vehicle::class, 'vehicle_type_id');
    }
}

