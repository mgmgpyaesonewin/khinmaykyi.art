<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $fillable = ['id','title','image','detail','price','sold_out'];
    

	public function orderdetails(){
        return $this->belongsToMany('App\Order_detail');
    }

    public function cartitems(){
        return $this->hasMany('App\Cart_item');
    }

    public function wishlists(){
        return $this->hasMany('App\Wishlist');
    }
}
