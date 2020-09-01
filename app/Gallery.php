<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $fillable = ['id','title','image','detail','price','sold_out'];
    

	public function orderdetail(){
        return $this->belongsTo('App\Order_detail');
    }

    public function cartitems(){
        return $this->hasMany('App\Cart_item');
    }

    public function order(){
        return $this->belongsToMany('App\Order');
    }
  
}
