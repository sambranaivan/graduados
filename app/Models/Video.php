<?php

namespace graduados\Models;

use Illuminate\Database\Eloquent\Model;

class Video extends Model {
	protected $table = 'videos';
	protected $primaryKey = 'video_id';
	protected $fillable = ['titulo', 'descripcion', 'link', 'gallery_id'];

	public $timestamps = true;
}
