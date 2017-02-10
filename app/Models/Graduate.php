<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Graduate extends Model {
	protected $table = 'graduates';
	protected $primaryKey = 'graduate_id';
	protected $fillable = ['name', 'birth_date', 'document_type', 'document', 'cuil', 'city_id', 'sex', 'maritalstatus_id', 'main_email', 'alternate_email', 'mobile_phone', 'phone', 'twiter', 'facebook', 'linkedin', 'place_of_residence', 'city_of_residence', 'year_of_income', 'senior_year', 'title'];

	public $timestamps = true;

	public function city() {
		return $this->belongsTo('App\Models\City');
	}

	public function graduate_careers() {
		return $this->hasMany('App\Models\GraduateCareer');
	}

	public function marital_status() {
		return $this->belongsTo('App\Models\MaritalStatus');
	}
}
