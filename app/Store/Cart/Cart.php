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

}
