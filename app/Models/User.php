<?php

namespace graduados\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model {
	protected $table = 'users';
	protected $primaryKey = 'user_id';
	protected $fillable = ['name', 'password', 'email','phone'];

	public $timestamps = true;

	public function logs() {
		return $this->hasMany('App\Models\Log');
	}
}
}
