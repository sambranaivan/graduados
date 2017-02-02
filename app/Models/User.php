<?php

namespace graduados\Models;

use Illuminate\Database\Eloquent\Model;
use Bican\Roles\Traits\HasRoleAndPermission;
use Bican\Roles\Contracts\HasRoleAndPermission as HasRoleAndPermissionContract;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract, HasRoleAndPermissionContract {
	use Authenticatable, CanResetPassword, HasRoleAndPermission;
	protected $table = 'users';
	protected $primaryKey = 'user_id';
	protected $fillable = ['name', 'password', 'email','phone'];

	public $timestamps = true;

	public function logs() {
		return $this->hasMany('App\Models\Log');
	}
}
}
