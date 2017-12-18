<?php

namespace App\Http\Controllers;

use App\Cost;
use App\Accounting;
use App\Cashier;
use App\Delivery;
use App\Particulars;
use App\Remarks;
use App\Supplier;
use App\User;
use Carbon\Carbon;
use App\Http\Controllers\RemarksController;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class EditController extends Controller
{
   
		public function edit(Request $request, $id)
		{ 
   	 	$accounting = Accounting::find($id);
   	 	$accounting->accounting_date=$request['accounting_date'];
   	 	$accounting->save();

   	 	
   	 	$supplier = Supplier::find($id);
   	 	$supplier->supplier_name=$request['supplier_name'];
   	 	$supplier->save();
		    
   	 	$costs = Cost::find($id);
         $costs->po_no=$request['po_no'];
         $costs->total_actual_cost=$request['total_actual_cost'];
         $costs->total_approved_budget_cost=$request['total_approved_budget_cost'];
         $costs->accounting_id = $accounting->accounting_id;
         $costs->save();

         $particulars = Particulars::find($id);
         $particulars->pr_no = $request['pr_no'];
         $particulars->date_required = $request['date_required'];
         $particulars->requesting_division = $request['requesting_division'];
         $particulars->particulars_details = $request['particulars_details'];
         $particulars->po_id=$costs->po_id;
         $request->user()->particulars()->save($particulars);
         
         $cashier = Cashier::find($id);
         $cashier->cashier_date= $request['cashier_date'];
         $cashier->po_id=$costs->po_id;
         $cashier->save();
         
         $delivery = Delivery::find($id);
         $delivery->notice_to_proceed= $request['notice_to_proceed'];
         $delivery->delivery_completion= $request['delivery_completion'];
         $delivery->acceptance_turnover= $request['acceptance_turnover'];
         $delivery->ci_no= $request['ci_no'];
         if(is_null($delivery->delivery_completion)){
                $delivery->number_of_days_po_to_delivery = 0;
         }else{
         $delivery->number_of_days_po_to_delivery= Carbon::parse($delivery->delivery_completion)->diffInDays(Carbon::parse($costs->created_at));
            }
         if(is_null($cashier->cashier_date)){
            $delivery->number_of_days_delivery_to_cashier = 0;
         }else{
            $delivery->number_of_days_delivery_to_cashier= Carbon::parse($cashier->cashier_date)->diffInDays(Carbon::parse($delivery->delivery_completion));
         }
         $delivery->pr_id=$particulars->pr_id;
         $delivery->supplier_id=$supplier->supplier_id;
         $delivery->save();

         $remarks = Remarks::find($id);
         if($costs->total_approved_budget_cost <=999 && 
                  is_null($delivery->ci_no))
         {
               $remarks->remarks_details ='Petty Cash';
               $remarks->pr_id = $particulars->pr_id;
               $remarks->save();
         }elseif (!empty($delivery->ci_no) && 
                  !empty($accounting->accounting_date)  &&
                  !empty($supplier->supplier_name) && 
                  !empty($costs->po_no) &&
                  !empty($costs->total_actual_cost) && 
                  !empty( $costs->total_approved_budget_cost) && 
                  !empty($particulars->pr_no) &&
                  !empty($particulars->date_required) &&
                  !empty($particulars->requesting_division) && 
                  !empty($particulars->particulars_details) &&
                  !empty($cashier->cashier_date) &&
                  !empty($delivery->notice_to_proceed) && 
                  !empty($delivery->delivery_completion) && 
                  !empty($delivery->acceptance_turnover)) 
         {
               $remarks->remarks_details ='Payable';
               $remarks->pr_id = $particulars->pr_id;
               $remarks->save();
         }elseif (is_null($delivery->delivery_completion)) 
         {
               $remarks->remarks_details ='Undelivered';
               $remarks->pr_id = $particulars->pr_id;
               $remarks->save();
         }else{
               $remarks->remarks_details ='ambot';
               $remarks->pr_id = $particulars->pr_id;
               $remarks->save();
         }
         return redirect()->route('home');
   		}

}