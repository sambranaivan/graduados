<?php

namespace graduados\Models;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model {
	protected $primaryKey = 'photo_id';
	protected $fillable = ['title', 'description', 'link', 'gallery_id'];

	public $timestamps = true;

	public function gallery() {
		return $this->belongsTo('App\Models\Gallery');
	}
}
