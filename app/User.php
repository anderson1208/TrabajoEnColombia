<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

use App\Vacant;

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

    public function vacants()
    {
        return $this->belongsToMany(Vacant::class, 'user_vacants')
        ->withPivot('vacant_state_id')
        ->using(UserVacant::class);
    }

    public function iAmApplying(Vacant $vacant)
    {
        $has = $this->vacants()->get()->pluck('pivot')->whereIn('vacant_id', $vacant->id);

        return count($has) > 0;
    }

    public function getPercentageCompleteProfile()
    {
        $totalField = 0;
        $fieldEmpty = 0;
        $fieldDirty = 0;
        // Get points from personal information
        foreach($this->fillable as $field)
        {
            if($this->$field)
                $fieldDirty++;
            else
                $fieldEmpty++;

            $totalField++;
        }

        $cv = $this->cv->getPercentageCompleteProfile();
        $ep = $this->employmentPreference->getPercentageCompleteProfile();
        $address = $this->address->getPercentageCompleteProfile();

        $totalField = ($cv['totalField'] + $ep['totalField'] + $address['totalField'] + $totalField);
        $fieldEmpty = ($cv['fieldEmpty'] + $ep['fieldEmpty'] + $address['fieldEmpty'] + $fieldEmpty);
        $fieldDirty = ($cv['fieldDirty'] + $ep['fieldDirty'] + $address['fieldDirty'] + $fieldDirty);
        
        return [
            'totalField' => $totalField,
            'fieldEmpty' => $fieldEmpty,
            'fieldDirty' => $fieldDirty,
            'percentage' => round( ($fieldDirty / $totalField) * 100)
        ];
    }
}
