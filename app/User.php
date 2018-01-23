<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{

    use \Illuminate\Auth\Authenticatable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function carts() {
        return $this->hasMany('App\Cart');
    }

    public function cart_products() {
        return $this->hasMany('App\Cart_Product');
    }

    public function orders() {
        return $this->hasMany('App\Order');
    }
}
