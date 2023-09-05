<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VehicleJourney extends Model
{
    use HasFactory;

    protected $fillable = [
        'private_code',
        'block_description',
        'block_number',
        'ticket_machine_service_code',
        'journey_code',
        'bank_holiday_operation',
        'layover_point_name',
        'layover_point_longitude',
        'layover_point_latitude',
        'garage_code',
        'service_code',
        'line_code',
        'journey_pattern_ref',
        'departure_time',
    ];

    public function service()
    {
        return $this->belongsTo(Service::class, 'ServiceRef');
    }

    public function garage()
    {
        return $this->belongsTo(Garage::class, 'GarageRef');
    }

    public function stopPoint()
    {
        return $this->belongsTo(StopPoint::class, 'LayoverPoint');
    }

    public function journeyPatternTimingLinks()
    {
        return $this->hasMany(JourneyPatternTimingLink::class, 'VehicleJourneyId');
    }
}
