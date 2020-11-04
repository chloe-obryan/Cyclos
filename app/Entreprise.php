<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Entreprise extends Model
{
    protected $fillable = [
        'villes_id','secteurs_id','users_id','pays_id',
     ];

    public function ville()
    {
        return $this->belongsTo('App\Ville');
    }

    public function secteurs()
    {
        return $this->hasMany('App\Secteur');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function pays()
    {
        return $this->belongsTo('App\Pays');
    }


}
