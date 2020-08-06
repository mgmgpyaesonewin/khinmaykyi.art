<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable=['id','user_id','payment_method'];

    public function user(){
        return $this->belongsTo('App\User');
    }
	public function orderdetail(){
        return $this->hasMany('App\Order_detail');
    }
}
