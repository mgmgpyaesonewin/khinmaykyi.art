<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    protected $fillable=['id','user_id','gallery_id'];

	public function user(){
        return $this->belongsTo('App\User');
    }

    public function gallery(){
        return $this->belongsTo('App\Gallery');
    }
}
