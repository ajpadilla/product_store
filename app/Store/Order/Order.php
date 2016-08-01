<?php

namespace App\Store\Order;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
	protected $fillable = ['product_id', 'invoice_id', 'quantity', 'price', 'amount'];

	public function invoice()
	{
		return $this->belongsTo('App\Store\Invoice\Invoice');
	}

	public function product()
	{
		return $this->belongsTo('App\Store\Product\Product');
	}

}
