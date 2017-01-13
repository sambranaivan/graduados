<?php

namespace graduados\Models;

use Illuminate\Database\Eloquent\Model;

class Section extends Model {
	protected $table = 'sections';
	protected $primaryKey = 'seccione_id';
	protected $fillable = ['descripcion', 'link'];

	public $timestamps = true;
}
