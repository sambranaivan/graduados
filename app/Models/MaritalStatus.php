<?php

namespace graduados\Models;

use Illuminate\Database\Eloquent\Model;

class MaritalStatus extends Model {
	protected $table = 'marital_statuses';
	protected $primaryKey = 'maritalstatus_id';
	protected $fillable = ['name'];

	public $timestamps = true;

	public function graduates() {
		return $this->hasMany('App\Models\Graduate');
	}
}
