<?php

namespace graduados\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model {
	protected $table = 'countries';
	protected $primaryKey = 'country_id';
	protected $fillable = ['name'];

	public $timestamps = true;

	public function provinces() {
		return $this->hasMany('App\Models\Province');
	}
}
