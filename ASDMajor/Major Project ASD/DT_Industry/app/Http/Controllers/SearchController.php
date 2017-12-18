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
use App\ViewData;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;

class SearchController extends Controller
{
     public function search(Request $request)
    {
    	$toSearch = $request['search'];
        $particulars_data = ViewData::where('pr_no', 'LIKE', '%'.$toSearch.'%') 
        					->orWhere('particulars_details', 'LIKE', '%'.$toSearch.'%')
        					->orWhere('date_required', 'LIKE', '%'.$toSearch.'%')
        					->orWhere('requesting_division', 'LIKE', '%'.$toSearch.'%')
        					->orWhere('po_no', 'LIKE', '%'.$toSearch.'%')
        					->orWhere('total_actual_cost', 'LIKE', '%'.$toSearch.'%')
        					->orWhere('total_approved_budget_cost', 'LIKE', '%'.$toSearch.'%')
        					->orWhere('supplier_name', 'LIKE', '%'.$toSearch.'%')
        					->orWhere('notice_to_proceed', 'LIKE', '%'.$toSearch.'%')
        					->orWhere('delivery_completion', 'LIKE', '%'.$toSearch.'%')
        					->orWhere('acceptance_turnover', 'LIKE', '%'.$toSearch.'%')
        					->orWhere('ci_no', 'LIKE', '%'.$toSearch.'%')
        					->orWhere('number_of_days_po_to_delivery', 'LIKE', '%'.$toSearch.'%')
        					->orWhere('number_of_days_delivery_to_cashier', 'LIKE', '%'.$toSearch.'%')
        					->orWhere('accounting_date', 'LIKE', '%'.$toSearch.'%')
        					->orWhere('cashier_date', 'LIKE', '%'.$toSearch.'%')
        					->orWhere('remarks_details', 'LIKE', '%'.$toSearch.'%')
        					->orWhere('name', 'LIKE', '%'.$toSearch.'%')
        					->paginate(5);
         return view('home', ['data_particulars' => $particulars_data]);
    }

}
