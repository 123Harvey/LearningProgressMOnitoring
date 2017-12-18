<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
use App\Http\Controllers\RemarksContoller;

class PostController extends Controller
{

		public function post(Request $request)
		{ 
         
   	 	$accounting = new Accounting();
   	 	$accounting->accounting_date=$request['accounting_date'];
   	 	$accounting->save(); 
        
   	 	$supplier = new Supplier();
   	 	$supplier->supplier_name=$request['supplier_name'];
   	   $supplier->save();
        
   	 	$costs = new Cost();
         $costs->po_no=$request['po_no'];
         $costs->total_actual_cost=$request['total_actual_cost'];
         $costs->total_approved_budget_cost=$request['total_approved_budget_cost'];
         $costs->accounting_id = $accounting->accounting_id;
         $costs->save();
        
         $particulars = new Particulars();
         $particulars->pr_no = $request['pr_no'];
         $particulars->date_required = $request['date_required'];
         $particulars->requesting_division = $request['requesting_division'];
         $particulars->particulars_details = $request['particulars_details'];
         $particulars->po_id=$costs->po_id;
         $particulars->status=0;
         $request->user()->particulars()->save($particulars);

         $cashier = new Cashier();
         $cashier->cashier_date = $request['cashier_date'];
         $cashier->po_id=$costs->po_id;
         $cashier->save();
         
         $delivery = new Delivery();
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

         $remarks = new Remarks();
         if($costs->total_approved_budget_cost <=999 && 
                  is_null($delivery->ci_no) &&
                  !empty($delivery->delivery_completion))
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
         }if($costs->total_approved_budget_cost <=999 && 
                  is_null($delivery->ci_no) &&
                  !empty($delivery->delivery_completion))
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