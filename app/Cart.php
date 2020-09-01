<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
	protected $fillable=['id','user_id'];

	public function user(){
        return $this->belongsTo('App\User');
    }

    public function cart_items(){
    	return $this->hasMany('App\Cart_item');
    }
   
}


