<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JourneyPatternSection extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
    ];

    public function route()
    {
        return $this->belongsTo(Route::class, 'RouteSectionRef');
    }

    public function service()
    {
        return $this->belongsTo(Service::class, 'ServiceRef');
    }

    public function journeyPatternTimingLinks()
    {
        return $this->hasMany(JourneyPatternTimingLink::class, 'journey_pattern_section_id');
    }
}
