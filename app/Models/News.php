<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class News extends Model
{
	protected $table='news';
	protected $primaryKey = 'new_id';
	protected $fillable=['title','pompadour','body','photo','typenew_id','great'];
    
    public $timestamps = true;

    public function type() {
		return $this->belongsTo(TypeNew::class,'new_id','typenew_id');
	}

	
}
