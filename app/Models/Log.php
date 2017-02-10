<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Log extends Model {
	protected $table = 'logs';
	protected $primaryKey = 'log_id';
	protected $fillable = ['typelog_id', 'user_id', 'category_id', 'message'];

	public $timestamps = true;

	public function typelog() {
		return $this->belongsTo('App\Models\TypeLog');
	}

	public function user() {
		return $this->belongsTo('App\Models\User');
	}

	public function category() {
		return $this->belongsTo('App\Models\Category');
	}
}
