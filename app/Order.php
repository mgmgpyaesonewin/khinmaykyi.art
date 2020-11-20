<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Order extends Model
{
    protected $fillable=['id','user_id','payment_method','status','total'];

    public function user(){
        return $this->belongsTo('App\User');
    }

	public function order_details(){
        return $this->hasMany('App\Order_detail');
    }
    
    public function getOrderDateAttribute($value){
    	 return  Carbon::parse($this->attributes['created_at'])->format('jS, M, Y');
  
	}
}

