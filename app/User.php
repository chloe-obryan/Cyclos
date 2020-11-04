<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;


class User extends Model implements AuthenticatableContract, CanResetPasswordContract{

    use Authenticatable, CanResetPassword;

	protected $table = 'users';
	public $timestamps = true;
    protected $guarded = array('id', 'remember_token', 'timestamps');

    
    public function roles(){
        return $this->belongsToMany('App\Role');
    }

    public function isAdmin(){
        return $this->roles()->where('name','admin')->first();
    }

    public function hasAnyRole(array $roles){

        return $this->roles()->whereIn('name',$roles)->first();
    }

    public function topics()
	{
		return $this->hasMany('App\Topic');
	}

	public function diplome()
	{
		return $this->belongsTo('App\Diplome','diplomes_id','id');
	}

    public function annonces()
	{
		return $this->hasMany('App\Annonce');
	}
	public function notifications()
	{
		return $this->hasMany('App\Notification');
	}

	public function commentaires()
	{
		return $this->hasMany('App\Commentaire');
    }
    
    public function ville()
	{
		return $this->belongsTo('App\Ville','villes_id','id');
    }

    public function suivi()
	{
		return $this->hasOne('App\Suivi');
    }



    public function pathPhoto($prefix = '')
    {
        $file = 'photos/' . $this->id . '.jpg';
        if (file_exists($file)) {
            $pathPhoto = 'photos/' . $prefix . $this->id . '.jpg';
        } elseif ($this->genre == 'Homme') {
            $pathPhoto = 'photos/'. $prefix .'Homme.jpg';
        } else {
            $pathPhoto = 'photos/'. $prefix .'Femme.jpg';
        }
        return $pathPhoto;
    }

}