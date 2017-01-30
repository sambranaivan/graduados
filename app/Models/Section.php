<?php

namespace graduados\Models;

use Illuminate\Database\Eloquent\Model;

class Section extends Model {
	protected $table = 'sections';
	protected $primaryKey = 'section_id';
	protected $fillable = ['description', 'link'];

	public $timestamps = true;
}
