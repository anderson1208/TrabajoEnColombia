<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'last_name', 'identification_type_id', 'identification_number', 'address_id', 'gender_id', 'civil_status_id', 'email', 'email_verified_at', 'password', 'avatar',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getFullNameAttribute()
    {
        return "{$this->name} {$this->last_name}";
    }

    public function identificationType()
    {
        return $this->belongsTo(IdentificationType::class, 'identification_type_id');
    }

    public function address()
    {
        return $this->belongsTo(Address::class, 'address_id');
    }
    public function gender()
    {
        return $this->belongsTo(Gender::class, 'gender_id');
    }

    public function civilStatus()
    {
        return $this->belongsTo(CivilStatus::class, 'civil_status_id');
    }

    public function cv()
    {
        return $this->hasOne(CurriculumVitae::class, 'user_id');
    }

    public function employmentPreference()
    {
        return $this->hasOne(EmploymentPreference::class, 'user_id');
    }
}
