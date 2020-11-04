<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ville extends Model
{
    public function annonce()
	{
		return $this->hasMany('App\Annonce');
	}
	
	public function users()
	{
		return $this->hasMany('App\User');
    }
    
    public function entreprise()
	{
		return $this->belongsTo('App\Entreprise');
	}
}
