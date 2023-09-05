<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Route extends Model
{
    use HasFactory;

    protected $table = 'routes';

    protected $fillable = [
        'id',
        'route_id',
        'private_code',
        'description',
        'route_section_ref',
    ];

    public function journeyPatternSections()
    {
        return $this->hasMany(JourneyPatternSection::class, 'RouteSectionRef');
    }
}
