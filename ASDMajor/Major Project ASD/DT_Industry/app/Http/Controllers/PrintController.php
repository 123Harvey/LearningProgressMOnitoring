<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ViewData;
class PrintController extends Controller
{
    public function print_preview()
    {
    	$data_particulars = ViewData::all();
    	return view('home', compact('data_particulars'));
    }
}
