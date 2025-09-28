<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Route extends Model
{
    protected $table = 'MP_ROUTES';
    protected $primaryKey = 'ROUTE_ID';
    public $timestamps = false;

    public function routePlaces()
    {
        return $this->hasMany(RoutePlace::class, 'ROUTE_ID', 'ROUTE_ID')
                    ->orderBy('SEQUENCE_NO');
    }
}



