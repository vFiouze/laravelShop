<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Adresse extends Model
{
	protected $guarded = [];
    public function customer(){
    	return $this->belongsTo('App\Customer');
    }

    public function addressFull(){
    	return $this->address.' '.$this->zip.' '.$this->town.' '.$this->country.', '.$this->geodiv;
    }
}
