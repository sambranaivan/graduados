<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;
class TypeNew extends Model {
	protected $table = 'type_news';
	protected $primaryKey = 'typenew_id';
	protected $fillable = ['description'];

	public $timestamps = true;

	public function news() {
		return $this->hasMany('App\Models\News');
	}

	public static function tip_zon(){
		return DB::table('type_news')->select('typenew_id', 'description')->get();
	}	
}
