<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TypeNew extends Model {
	protected $table = 'type_news';
	protected $primaryKey = 'typenew_id';
	protected $fillable = ['description'];

	public $timestamps = true;

	public function news() {
		return $this->hasMany('App\Models\New');
	}
}
