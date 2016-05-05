<?php

namespace App\Store\Upload;

use Illuminate\Database\Eloquent\Model;

class UserPhoto extends Model
{
    protected $fillable = ['filename','path','complete_path', 'complete_thumbnail_path', 'size', 'extension', 'mimetype', 'user_id'];

    public function user()
    {
   		$this->belongsTo('App\Store\User\User');
    }
}
