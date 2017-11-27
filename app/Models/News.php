<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class News extends Model
{
	protected $table='news';
	protected $primaryKey = 'new_id';
	protected $fillable=['title','pompadour','body','photo','typenew_id','career_id','great', 'publication_date', 'end_publication','destacado'];

    public $timestamps = true;

    public function type() {
		return $this->belongsTo(TypeNew::class,'typenew_id');
	}

    public function career() {
		return $this->belongsTo(Career::class,'career_id');
	}

}
