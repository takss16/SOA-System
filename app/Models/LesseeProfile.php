<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LesseeProfile extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'first_name',
        'last_name',
        'middle_name',
        'suffix',
        'spouse',
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

    public function creatorUser(): BelongsTo
    {
        return $this->belongsTo(User::class, 'creator_user_id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
