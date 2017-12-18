<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Particulars;
use App\NotificationView;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Query\Builder;
class NotificationController extends Controller
{
    public function notification()
    { 
   		$particulars_data = NotificationView::paginate(6);
        return view('notif', ['data_particulars' => $particulars_data]);
 	}

 	 public function deletenotif($pr_id)
    { 
   		 
   		 $notif = DB::table('particulars')
            ->where('pr_id', $pr_id)
            ->update(['status' => 1]);


         return redirect()->route('notification');
 	}


}
 