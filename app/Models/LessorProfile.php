<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LessorProfile extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'first_name',
        'last_name',
        'middle_name',
        'suffix',
        'contact_email',
        'contact_phone',
        'contact_tel',
        'tin_number',
        'bir_name',
        'bir_registration_date',
        'tax_type',
        'trade_name',
        'line_of_business',
        'building_number',
        'street',
        'barangay',
        'city',
        'province',
        'country',
        'id_photo',
        'attached_documents',
    ];

    protected $casts = [
        'bir_registration_date' => 'date',
        'attached_documents' => 'json',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

