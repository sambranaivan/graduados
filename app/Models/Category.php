<?php

namespace graduados\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model {
	protected $table = 'categories';
	protected $primaryKey = 'category_id';
	protected $fillable = ['description'];

	public $timestamps = true;

	public function logs() {
		return $this->hasMany('App\Models\Log');
	}
}
