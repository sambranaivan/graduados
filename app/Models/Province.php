<?php

namespace graduados\Models;

use Illuminate\Database\Eloquent\Model;

class Province extends Model {
	protected $table = 'provinces';
	protected $primaryKey = 'province_id';
	protected $fillable = ['name', 'country_id'];

	public $timestamps = true;

	public function country() {
		return $this->belongsTo('App\Models\Country');
	}

	public function cities() {
		return $this->hasMany('App\Models\City');
	}
}
