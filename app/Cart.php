<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable=['id','user_id','gallery_id'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function galleries()
    {
        return $this->hasMany('App\Gallery');
    }
    public function cartitem(){
        return $this->hasMany('App\Cart_item');
    }
}

