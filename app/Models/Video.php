<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Video extends Model {
	protected $table = 'videos';
	protected $primaryKey = 'video_id';
	protected $fillable = ['title', 'description', 'link', 'gallery_id'];

	public $timestamps = true;

	public function gallery() {
		return $this->belongsTo('App\Models\Gallery');
	}
}
