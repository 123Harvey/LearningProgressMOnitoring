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

class RemarksController extends Controller
{
   public function cancel($pr_id){
   		$remarks = Remarks::find($pr_id);
   		$remarks->remarks_details ='Cancelled';
   		$remarks->pr_id = $pr_id;
   		$remarks->save();  
   		return redirect()->route('home');
   }

   public function failedbid($pr_id){
   		$remarks = Remarks::find($pr_id);
   		$remarks->remarks_details ='Failed Bid';
   		$remarks->pr_id = $pr_id;
   		$remarks->save();
   		return redirect()->route('home');
   }
}
