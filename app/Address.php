<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $fillable = [
    	'address', 'phone', 'mobil', 'city_id'
    ];

    public function user()
    {
    	return $this->hasOne(User::class, 'address_id');
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
        
        return [
            'totalField'    => $totalField,
            'fieldDirty'    =>  $fieldDirty,
            'fieldEmpty'    =>  $fieldEmpty
        ];
    }
}
