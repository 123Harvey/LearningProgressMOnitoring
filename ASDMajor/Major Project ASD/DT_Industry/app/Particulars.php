<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Particulars extends Model
{
    //
    protected $table = 'particulars';
    protected $primaryKey = 'pr_id';

    public function user(){
    	return $this->belongsTo('App\User');
    }

     public function costs(){
     	return $this->hasMany('App\Cost');
     }

     public function delivery(){
     	return $this->hasMany('App\Delivery');
     }

     public function remarks(){
     	return $this->hasOne('App\Remarks');
     }

}
