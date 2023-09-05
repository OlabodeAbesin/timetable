<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Operator extends Model
{
    use HasFactory;

    protected $table = 'operators';

    protected $fillable = [
        'id', // Note: You might want to use 'id' as primary key
        'operator_id',
        'national_operator_code',
        'operator_code',
        'operator_short_name',
        'operator_name_on_licence',
        'trading_name',
        'licence_number',
        'licence_classification',
        // Add other columns here
    ];

    public function services()
    {
        return $this->hasMany(Service::class, 'RegisteredOperatorRef');
    }

    public function garages()
    {
        return $this->hasMany(Garage::class, 'OperatorId');
    }
}
