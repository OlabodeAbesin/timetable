<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

//Model for <AnnotatedNptgLocalityRef>
class NptgLocality extends Model
{
    use HasFactory;
    protected $table = 'nptg_localities';

    protected $fillable = ['nptg_locality_ref', 'locality_name'];

    public function stopPoints()
    {
        return $this->hasMany(StopPoint::class, 'NptgLocalityRef');
    }
}
