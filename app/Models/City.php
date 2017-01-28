<?php

namespace graduados\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model {
	protected $table = 'cities';
	protected $primaryKey = 'city_id';
	protected $fillable = ['name', 'province_id'];

	public $timestamps = true;

	public function province() {
		return $this->belongsTo('App\Models\Province');
	}

	public function faculties() {
		return $this->hasMany('App\Models\Faculty');
	}

	public function graduates() {
		return $this->hasMany('App\Models\Graduate');
	}
}
