<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $fillable = ['id','title','image','detail','price','sold_out'];
    
    public function order()
    {
        return $this->belongsToMany('App\Order');
    }
    public function cart()
    {
        return $this->belongsToMany('App\Cart');
    }
    /*public function cartitem()
    {
        return $this->belongsToMany('App\Cart_item');
    }*/
	public function orderdetail()
    {
        return $this->belongsToMany('App\Order_detail');
    }
}
