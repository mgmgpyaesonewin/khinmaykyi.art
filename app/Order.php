<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable=['id','user_id','payment_method','status','total'];

    public function user(){
        return $this->belongsTo('App\User');
    }

	public function order_details(){
        return $this->hasMany('App\Order_detail');
    }
    
    public function gallery(){
    	 return $this->belongsToMany('App\Gallery');
    }
}
