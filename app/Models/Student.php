<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'student_id',
        'first_name',
        'middle_name',
        'last_name',
        'email',
        'mobile_number',
        'gender',
        'date_of_birth',
        'program',
        'year_level',
        'address',
        'profile_picture',
    ];

    protected $casts = [
        'date_of_birth' => 'date',
    ];

    public function getFullNameAttribute(): string
    {
        if ($this->middle_name) {
            return $this->first_name . ' ' . $this->middle_name . ' ' . $this->last_name;
        }

        return $this->first_name . ' ' . $this->last_name;
    }
}
