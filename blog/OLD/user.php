<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class user extends Model
{
    public function passport() 
	{
		return $this->hasOne(Passport::class);
	}
	public function phone() 
   {
	   return $this->hasMany(Phone::class);
   }
}
