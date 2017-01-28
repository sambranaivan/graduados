<?php

namespace graduados\Models;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model {
	protected $primaryKey = 'gallery_id';
	protected $fillable = ['name'];

	public $timestamps = true;

	public function videos() {
		return $this->hasMany('App\Models\Video');
	}

	public function photos() {
		return $this->hasMany('App\Models\Photo');
	}
}
