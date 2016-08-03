<?php

namespace App\Store\User;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['first_name','last_name','username', 'email', 'password','address','post_code','country_id', 'phone', 'active', 'role'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    public function setPasswordAttribute($password){
        $this->attributes['password'] = bcrypt($password);
    }

    public function country()
    {
        return $this->belongsTo('App\Store\Country\Country');
    }

    public function isAdmin()
    {
        return $this->role == "admin";
    }

    public function carts()
    {
        return $this->hasMany('App\Store\Cart\Cart');
    }

    public function wishlist()
    {
        return $this->belongsToMany('App\Store\Product\Product','wishlists','user_id','product_id')
        ->withTimestamps();
    }

    public function hasProductToWishlist()
    {
        return $this->wishlist->count();
    }

    public function getFullNameAttribute()
    {
        return $this->first_name ." ". $this->last_name;
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

}
