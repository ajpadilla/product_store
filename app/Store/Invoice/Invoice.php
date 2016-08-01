<?php

namespace App\Store\Invoice;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
	protected $fillable = [];

	public function orders()
	{
		return $this->hasMany('App\Store\Order\Order');
	}

}
