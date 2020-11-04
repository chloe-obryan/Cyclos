<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Secteur extends Model
{
    public function annonce()
	{
		return $this->belongsTo('App\Annonce');
    }
    
    public function entreprise()
	{
		return $this->belongsTo('App\Entreprise');
	}
}
