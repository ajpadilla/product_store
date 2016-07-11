<?php

namespace App\Store\Cart;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
   
	protected $fillable = ['user_id', 'active'];

	public function user()
	{
		return $this->belongsTo('App\Store\User\User');
	}

	public function products()
	{
		return $this->belongsToMany('App\Store\Product\Product','cart_product','cart_id','product_id')
			->withPivot('quantity')->withTimestamps();
	}

	public function hasProducts()
	{
		return $this->products->count();
	}

	public function getTotalAttribute()
	{
		$total = 0;
		foreach ($this->products as $product) {
			$total += $product->price * $product->pivot->quantity;
		}
		return $total;
	}

}
