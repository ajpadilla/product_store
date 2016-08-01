<?php

namespace App\Store\Order;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
	protected $fillable = ['product_id', 'invoice_id', 'quantity', 'price0', 'amount'];

	public function invoice()
	{
		return $this->belongsTo('App\Store\Invoice\Invoice');
	}
}
