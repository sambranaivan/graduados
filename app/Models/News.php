<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
	protected $table='news';
	protected $primaryKey = 'new_id';
	protected $fillable=['title','pompadour','body','photo','typenew_id','great'];
    
    public $timestamps = true;

    public function type_new() {
		return $this->belongsTo('App\Models\TypeNew');
	}
}
