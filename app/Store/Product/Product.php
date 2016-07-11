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

	public function photos()
	{
		return $this->hasMany('App\Store\Upload\ProductPhoto');
	}

	public function hasPhotos()
	{
		return $this->photos->count();
	}

	public function getFirstPhotoAttribute()
	{
		if ($this->hasPhotos()) {
			foreach ($this->photos as $photo) {
				return $photo;
			}
		}
		return false;
	}

	public function getActiveAttribute($value)
	{
		return ($value ? 'Yes' : 'No');
	}

	public function carts()
	{
		return $this->belongsToMany('App\Store\Cart\Cart','cart_product', 'product_id' ,'cart_id')
			->withPivot('quantity')->withTimestamps();
	}

	public function getTotalAttribute()
	{
		$total = 0;
		$product = $this->carts()->where('product_id', '=', $this->id)->first();
		$total = $this->price * $product->pivot->quantity;
		return $total;
	}

}
