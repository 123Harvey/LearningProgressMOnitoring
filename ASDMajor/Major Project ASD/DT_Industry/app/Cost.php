<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cost extends Model
{
    //
  protected $table = 'costs';
  protected $primaryKey = 'po_id';

    public static function accountings(){
		  return $this->belongsTo('App\Accounting');
	  }

    public static function cashier(){
    	return $this->belongsTo('App\Cahier');
   	}

   	public static function particulars(){
    	return $this->hasOne('App\Particulars');
   	}

    public function saveCost($request,$acc_id){
      $this->po_no=$request['po_no'];
      $this->total_actual_cost=$request['total_actual_cost'];
      $this->total_approved_budget_cost=$request['total_approved_budget_cost'];
      $this->accounting_id=$acc_id;

      if ($this->save()) {
        return 'success';
      }else{
        return 'fail';
      }
    }
}
