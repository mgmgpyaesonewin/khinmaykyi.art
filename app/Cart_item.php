<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart_item extends Model
{
    protected $fillable=['id','gallery_id','cart_id'];

    public function cart(){
        return $this->belongsTo('App\Cart');
    }

    public function gallery(){
        return $this->belongsTo('App\Gallery');
    }
  
}
