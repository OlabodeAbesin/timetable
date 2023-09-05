<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JourneyPatternTimingLink extends Model
{
    use HasFactory;

    protected $fillable = [
        'from_sequence_number',
        'from_activity',
        'from_dynamic_destination_display',
        'from_stop_point_ref',
        'from_timing_status',
        'to_sequence_number',
        'to_activity',
        'to_dynamic_destination_display',
        'to_dynamic_destination_display',
        'to_stop_point_ref',
        'to_timing_status',
        'route_link_ref',
        'run_time',
        'journey_pattern_section_id',
    ];

    public function journeyPatternSection()
    {
        return $this->belongsTo(JourneyPatternSection::class);
    }
}
