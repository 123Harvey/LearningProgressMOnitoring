<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Remarks extends Model
{
    //
    protected $table = 'remarks';
	protected $primaryKey = 'remarks_id';
	
    public function particulars(){
 		return $this->hasOne('App\Particulars');
 	}
}
