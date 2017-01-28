<?php

namespace graduados\Models;

use Illuminate\Database\Eloquent\Model;

class GraduateCareer extends Model {
	protected $table = 'graduate_careers';
	protected $primaryKey = 'graduatecareer_id';
	protected $fillable = ['plan_name', 'plan_year', 'resolution', 'graduate_id', 'career_id'];

	public $timestamps = true;

	public function graduate() {
		return $this->belongsTo('App\Models\Graduate');
	}

	public function career() {
		return $this->belongsTo('App\Models\Career');
	}
}
