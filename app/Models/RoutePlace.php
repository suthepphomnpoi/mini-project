<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RoutePlace extends Model
{
    protected $table = 'MP_ROUTE_PLACES';
    protected $primaryKey = 'ROUTE_PLACE_ID';
    public $timestamps = false;

    public function place()
    {
        return $this->belongsTo(Place::class, 'PLACE_ID', 'PLACE_ID');
    }
}


