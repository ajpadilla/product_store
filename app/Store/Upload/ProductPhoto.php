<?php

namespace App\Store\Upload;

use Illuminate\Database\Eloquent\Model;

class ProductPhoto extends Model
{

	protected $fillable = ['filename','path','complete_path', 'complete_thumbnail_path', 'size', 'extension', 'mimetype', 'product_id', 'user_id'];

}
