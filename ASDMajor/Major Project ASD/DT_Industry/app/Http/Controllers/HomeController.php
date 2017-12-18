<?php

namespace App\Http\Controllers;

use App\Particulars;
use App\Accounting;
use App\Cashier;
use App\Cost;
use App\Delivery;
use App\Remarks;
use App\Supplier;
use App\User;
use App\ViewData;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     * 
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $particulars_data = ViewData::paginate(6);
         return view('home', ['data_particulars' => $particulars_data]);
    }
     public function forSearch()
     {
         $particulars_data = ViewData::paginate(6);
          return view('ItemSearch', ['data_particulars' => $particulars_data]);
     }
    public function addprocurement(){
        return view('addprocurement');
    }

    public function editprocurement($ps_id){
        $particulars_id = ViewData::where('pr_id','=',$ps_id)->get();
        return view('editprocurement', ['particulars_id' => $particulars_id]);
    }

    public function notif(){
        return view('notif');
    }

    public function procurementstatus(){
        $particulars_data = ViewData::paginate(6);
         return view('procurementstatus', ['data_particulars' => $particulars_data]);
    }

    public function payable()
    {
         $particulars_data = ViewData::where('remarks_details', 'payable')->paginate(6);
         return view('home', ['data_particulars' => $particulars_data]);
    }

     public function pettycash()
    {
         $particulars_data = ViewData::where('remarks_details', 'Petty Cash')->paginate(6);
         return view('home', ['data_particulars' => $particulars_data]);
    }

     public function undelivered()
    {
         $particulars_data = ViewData::where('remarks_details', 'Undelivered')->paginate(6);
         return view('home', ['data_particulars' => $particulars_data]);
    }

     public function cancelled()
    {
         $particulars_data = ViewData::where('remarks_details', 'Cancelled')->paginate(6);
         return view('home', ['data_particulars' => $particulars_data]);
    }

    public function failedbid()
    {
         $particulars_data = ViewData::where('remarks_details', 'Failed Bid')->paginate(6);
         return view('home', ['data_particulars' => $particulars_data]);
    }
}
