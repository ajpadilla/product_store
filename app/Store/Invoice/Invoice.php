<?php

namespace App\Store\Invoice;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
	protected $fillable = ['date', 'client_id', 'address', 'total'];

	public function orders()
	{
		return $this->hasMany('App\Store\Order\Order');
	}

	public function client()
	{
		return $this->belongsTo('App\Store\User\User', 'client_id');
	}

}
