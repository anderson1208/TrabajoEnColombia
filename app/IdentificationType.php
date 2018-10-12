<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IdentificationType extends Model
{
    protected $fillable = [
    	'name', 'abbreviation'
    ];
}
