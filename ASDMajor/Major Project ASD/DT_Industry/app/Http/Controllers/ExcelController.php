<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controller\Controllers;
use App\Http\Controller\Object;
use App\Cost;
use App\Accounting;
use App\Cashier;
use App\Delivery;
use App\Particulars;
use App\Remarks;
use App\Supplier;
use App\User;
use App\ViewData;
use Carbon\Carbon;
use Auth;
use DB;
use Excel;
use Illuminate\Support\Facades\Input;
class ExcelController extends Controller
{

    public function getImport(){
    	return view('excel.importProcurement'); 
    }

    function arrayToObject($array)
		{
 		$object= new stdClass();
 		return array_to_obj($array,$object);
		}

    public function postImport(){
    	Excel::load(Input::file('procurement'), function($reader){
    		$reader->each(function($sheet){
        $accounting = new Accounting();
        $accounting->accounting_date=$sheet->accounting_date;
        $accounting->save(); 
        
        $supplier = new Supplier();
        $supplier->supplier_name=$sheet->supplier_name;
        $supplier->save();
        
          
        $costs = new Cost();
         $costs->po_no=$sheet->po_no;
         $costs->total_actual_cost=$sheet->total_actual_cost;
         $costs->total_approved_budget_cost=$sheet->total_approved_budget_cost;
         $costs->accounting_id = $accounting->accounting_id;
         $costs->save();
         
         
         $particulars = new Particulars();
         $user = new User();
         $particulars->pr_no = $sheet->pr_no;
         $particulars->date_required = $sheet->date_required;
         $particulars->requesting_division = $sheet->requesting_division;
         $particulars->particulars_details = $sheet->particulars_details;
         $particulars->po_id=$costs->po_id;
         $particulars->status=0;
         $particulars->user_id = Auth::user()->id;
         $particulars->save();
         
         
         $cashier = new Cashier();
         $cashier->cashier_date =$sheet->cashier_date;
         $cashier->po_id=$costs->po_id;
         $cashier->save();

   
         $delivery = new Delivery();
         $delivery->notice_to_proceed= $sheet->notice_to_proceed;
         $delivery->delivery_completion= $sheet->delivery_completion;
         $delivery->acceptance_turnover= $sheet->acceptance_turnover;
         $delivery->ci_no= $sheet->ci_no;
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
            });
    	}); 

        return redirect()->route('home');
    }

    public function getExportHome(){
            $viewdata = ViewData::all();
            Excel::create('Procurement',function($excel) use ($viewdata){
                $excel->sheet('Sheet 1', function($sheet) use($viewdata){
                    $sheet->fromArray($viewdata);
                });
            })->export('xlsx');
    }

    public function getExportPayable(){
            $viewdata = ViewData::where('remarks_details', 'Payable')->get();
            Excel::create('Procurement',function($excel) use ($viewdata){
                $excel->sheet('Sheet 1', function($sheet) use($viewdata){
                    $sheet->fromArray($viewdata);
                });
            })->export('xlsx');
    }

    public function getExportPettycash(){
           $viewdata = ViewData::where('remarks_details', 'Petty Cash')->get();
            Excel::create('Procurement',function($excel) use ($viewdata){
                $excel->sheet('Sheet 1', function($sheet) use($viewdata){
                    $sheet->fromArray($viewdata);
                });
            })->export('xlsx');
    }

    public function getExportUndelivered(){
            $viewdata = ViewData::where('remarks_details', 'Undelivered')->get();
            Excel::create('Procurement',function($excel) use ($viewdata){
                $excel->sheet('Sheet 1', function($sheet) use($viewdata){
                    $sheet->fromArray($viewdata);
                });
            })->export('xlsx');
    }

     public function getExportCancelled(){
            $viewdata = ViewData::where('remarks_details', 'Cancelled')->get();
            Excel::create('Procurement',function($excel) use ($viewdata){
                $excel->sheet('Sheet 1', function($sheet) use($viewdata){
                    $sheet->fromArray($viewdata);
                });
            })->export('xlsx');
    }

     public function getExportFailedBid(){
            $viewdata = ViewData::where('remarks_details', 'Failed Bid')->get();
            Excel::create('Procurement',function($excel) use ($viewdata){
                $excel->sheet('Sheet 1', function($sheet) use($viewdata){
                    $sheet->fromArray($viewdata);
                });
            })->export('xlsx');
    }
}
