<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $data = ['imagePath','title','price','productType'];
}
