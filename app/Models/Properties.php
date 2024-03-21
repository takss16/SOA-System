<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Properties extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'building_unit',
        'lot',
        'block',
        'subdivision',
        'barangay',
        'city_town',
        'province',
        'region',
        'country',
        'property_description',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function contracts()
    {
        return $this->hasMany(Contract::class);
    }



}
