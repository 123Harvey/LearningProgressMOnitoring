<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cashier extends Model
{
    //
	protected $table = 'cashiers';
	protected $primaryKey = 'cashier_id';
    public function cost(){
    	return $this->hasMany('App\Cost');
    }

    public function accounting(){
    	return $this->hasMany('App\Accounting');
    }
}
