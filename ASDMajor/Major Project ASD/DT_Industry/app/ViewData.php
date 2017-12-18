<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ViewData extends Model
{
   protected $table ='procurement_view';

   protected $fillable=[
   		'pr_no',
   		'particulars_details',
   		'date_required',
   		'requesting_division',
   		'po_no',
   		'total_actual_cost',
   		'total_approved_budget_cost',
   		'supplier_name',
   		'notice_to_proceed',
   		'delivery_completion',
   		'acceptance_turnover',
   		'ci_no',
   		'number_of_days_po_to_delivery',
   		'number_of_days_delivery_to_cashier',
   		'accounting_date',
   		'cashier_date',
   		'remarks_details',
   		'name',
   	];

   	public $timestamps =false;  
}
