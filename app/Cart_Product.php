<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\MyCart;

class Cart_Product extends Model
{
    public function carts()
    {
        return $this->hasMany('App\Cart');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
