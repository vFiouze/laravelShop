<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    public function user(){
    	return $this->belongsTo('App\User','id');
    }

    public function address(){
    	return $this->hasMany('App\Adresse');
    }
}
