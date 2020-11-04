<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pays extends Model
{
    
    public function entreprise()
	{
		return $this->belongsTo('App\Entreprise');
	}
}
