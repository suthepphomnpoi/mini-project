<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    protected $table = 'MP_PLACES';
    protected $primaryKey = 'PLACE_ID';
    public $timestamps = false;

    public function routePlaces()
    {
        return $this->hasMany(RoutePlace::class, 'PLACE_ID', 'PLACE_ID');
    }
}




