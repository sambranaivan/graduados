<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Career extends Model {
	protected $table = 'careers';
	protected $primaryKey = 'career_id';
	protected $fillable = ['name', 'faculty_id'];

	public $timestamps = true;

	public function faculty() {
		return $this->belongsTo('App\Models\Faculty');
	}

	public function graduate_careers() {
		return $this->hasMany('App\Models\GraduateCareer');
	}
}
