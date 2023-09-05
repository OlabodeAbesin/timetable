<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $table = 'services';

    protected $fillable = [
        'service_code',
        'private_code',
        'start_date',
        'end_date',
        'operating_profile',
        'registered_operator_ref',
        'regular_day_type',
        'stop_requirements',
    ];

    public function operator()
    {
        return $this->belongsTo(Operator::class, 'RegisteredOperatorRef');
    }

    public function vehicleJourneys()
    {
        return $this->hasMany(VehicleJourney::class, 'ServiceRef');
    }

    public function route()
    {
        return $this->hasOne(Route::class, 'RouteSectionRef');
    }
}
