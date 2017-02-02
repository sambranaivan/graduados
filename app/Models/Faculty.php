<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Faculty extends Model {
	protected $table = 'faculties';
	protected $primaryKey = 'faculty_id';
	protected $fillable = ['name', 'address', 'phone', 'email', 'city_id'];

	public $timestamps = true;

	public function city() {
		return $this->belongsTo('App\Models\City');
	}

	public function careers() {
		return $this->hasMany('App\Models\Career');
	}
}
