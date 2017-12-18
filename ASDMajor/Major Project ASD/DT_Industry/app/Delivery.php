<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Delivery extends Model
{
    //
    protected $table = 'deliveries';
	protected $primaryKey = 'delivery_id';
    public function particulars(){
    	return $this->belongsTo('App\Particulars');
    }

    public function supplier(){
    	return $this->hasOne('App\Supplier');
    }
}
