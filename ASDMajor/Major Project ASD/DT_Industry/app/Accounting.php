<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Accounting extends Model
{
	protected $table = 'accountings';
	protected $primaryKey = 'accounting_id';

    public static function costs(){
    	return $this->hasMany('App\Cost');
    	}
}