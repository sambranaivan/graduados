<?php

namespace graduados\Models;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model {
	protected $table = 'galleries';
	protected $primaryKey = 'gallery_id';
	protected $fillable = ['nombre'];
	public $timestamps = true;
}
