<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    use HasFactory;

    protected $fillable = [
        'property_id',
        'lessee_profile_id',
        'contract_terms',
        'lease_term_start_date',
        'lease_term_end_date',
        'rental_rate',
        'rental_terms',
        'deposit_advance',
        'deposit_security',
        'deposit_damage',
        'default_payment',
        'contract_date',
        'water_terms',
        'electric_terms',
        'internet_terms',
        'internet_rate',
        'water_rate',
        'electric_rate',
        'condition_of_premises',
        'expiration_lease_penalty',
        'judicial_relief_rate',
        'witness_name_1',
        'witness_name_2',
        'lessor_document',
        'lessee_document',
        'lessor_id_photo',
        'lessor_id_type',
        'lessor_id_number',
        'lessor_id_issued_date',
        'lessee_id_photo',
        'lessee_id_type',
        'lessee_id_number',
        'lessee_id_issued_date',
        'tax_terms',
        'tax_rate',
    ];


    public function property()
    {
        return $this->belongsTo(Properties::class);
    }


    public function lesseeProfile()
    {
        return $this->belongsTo(LesseeProfile::class);
    }
}
