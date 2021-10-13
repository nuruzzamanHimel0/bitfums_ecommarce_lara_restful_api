<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
		'name','details','stock','price','discount','user_id'
	];
    public function reviews()
    {
    	return $this->hasMany(Review::class);
    }
}
