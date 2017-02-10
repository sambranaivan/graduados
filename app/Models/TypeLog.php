<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TypeLog extends Model {
	protected $table = 'type_logs';
	protected $primaryKey = 'typelog_id';
	protected $fillable = ['description'];

	public $timestamps = true;

	public function logs() {
		return $this->hasMany('App\Models\Log');
	}
}
}
