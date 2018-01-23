<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Session;

class Cart extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User');
    } 
}


