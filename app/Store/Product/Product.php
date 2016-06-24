<?php

namespace App\Store\Product;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
	protected $fillable = ['name', 'description', 'quantity', 'price', 'active', 'mark', 'classification_id', 'user_id'];

	public function classification()
	{
		 return $this->belongsTo('App\Store\Classification\Classification');
	}
}
