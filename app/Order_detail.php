<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order_detail extends Model
{
    protected $fillable=['id','order_id','gallery_id'];

    public function orders(){
        return $this->belongsTo('App\order','order_id');
    }
    public function user(){
        return $this->belongsTo('App\User');
    }
    public function gallery(){
        return $this->hasMany('App\Gallery','gallery_id');
    }
}
