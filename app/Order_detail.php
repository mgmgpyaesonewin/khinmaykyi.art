<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order_detail extends Model
{
    protected $fillable=['id','order_id','gallery_id'];

    public function order(){
        return $this->belongsTo('App\order','order_id');
    }
    
    public function gallery(){
        return $this->belongsTo('App\Gallery','gallery_id');
    }
}
