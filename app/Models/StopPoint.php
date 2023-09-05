<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

//Model for <StopPoint>
class StopPoint extends Model
{
    use HasFactory;

    protected $table = 'stop_points';

    protected $fillable = [
        'atco_code',
        'common_name',
        'longitude',
        'latitude',
        'stop_type',
        'timing_status',
        'administrative_area_ref',
        'notes',
    ];

    public function nptgLocality()
    {
        return $this->belongsTo(NptgLocality::class, 'NptgLocalityRef');
    }

    public function journeyPatternTimingLinks()
    {
        return $this->hasMany(JourneyPatternTimingLink::class, 'StopPointRef');
    }

    public function layoverPoint()
    {
        return $this->hasOne(VehicleJourney::class, 'LayoverPoint');
    }
}
