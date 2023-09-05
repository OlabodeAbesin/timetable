<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RouteSection extends Model
{
    use HasFactory;

    protected $table = 'route_sections';

    protected $fillable = [
        'id', // Note: You might want to use 'id' as primary key
        'section_id',
        'route_link_id',
        'from_stop_point_ref',
        'to_stop_point_ref',
        'distance',
        'direction',
        'track',
    ];

    public function fromStopPoint()
    {
        return $this->belongsTo(StopPoint::class, 'from_stop_point_ref', 'atco_code');
    }

    public function toStopPoint()
    {
        return $this->belongsTo(StopPoint::class, 'to_stop_point_ref', 'atco_code');
    }

    public function route()
    {
        return $this->belongsTo(Route::class, 'RouteSectionRef');
    }

    public function routeLinks()
    {
        return $this->hasMany(RouteLink::class, 'RouteSectionId');
    }
}
