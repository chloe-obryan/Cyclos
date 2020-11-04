<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model {

	protected $table = 'notifications';
	public $timestamps = true;
	protected $guarded = array('id','timestamps');

	public function user()
	{
		return $this->belongsTo('App\User');
	}

}