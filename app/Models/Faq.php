<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FAQ extends Model {
	protected $table = 'faqs';
	protected $primaryKey = 'id';
	protected $fillable = ['title','description', 'url_file'];

	public $timestamps = true;
}
