<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{


    public function wishlist(){
        return $this->hasMany('App\Wishlist');
    }

    public function categories(){
       return $this->belongsToMany('App\Category');
    }

    public function presentPrice(){

        return "Rp".number_format($this->price, 2);

    }
}
