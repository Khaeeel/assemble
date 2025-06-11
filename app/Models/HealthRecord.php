<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HealthRecord extends Model
{
    use HasFactory;

    public $timestamps = true;

    protected $fillable = [
        'first_name',
        'last_name',
        'age',
        'gender',
        'birth_date',
        'height',
        'weight',
        'contact_number',
        'address',            
        'visit_purpose',
        'other_purpose',
        'medical_diagnosis',
        'other_diagnosis',
        'given_medicine',
    ];
}


