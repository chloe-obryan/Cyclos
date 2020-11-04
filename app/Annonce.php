<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Annonce extends Model
{
    
    public $timestamps = true;
    protected $table = 'annonces';
    protected $guarded = array('id', 'timestamps');

    

    public function commentaires()
    {
        return $this->belongsToMany('App\Commentaire');
    }

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

    public function isPast()
    {
        return Carbon::createFromTimestamp(strtotime($this->date_depart))->isPast();
    }
}
