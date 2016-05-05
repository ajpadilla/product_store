<?php

namespace App\Store\Upload;

use Illuminate\Database\Eloquent\Model;

class UserPhoto extends Model
{
    protected $fillable = ['first_name','last_name','username', 'email', 'password'];

    public function user()
    {
   		$this->belongsTo('App\Store\User\User');
    }
}
