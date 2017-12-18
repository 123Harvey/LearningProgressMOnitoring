@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col-md-3" style="position: absolute ;margin-left:-120px; margin-top: 3px;width:30%;">
        <a href="home"><button class="btn btn-primary" style="width:50%; height:60px; background-color: ">
          Home
        </button></a>
        <a href="addprocurement"><button class="btn btn-primary" style="width:50%;  height:70px; margin-top: 10px;">
          Add Procurement
        </button></a>
        <a href="notification"><button class="btn btn-primary" style="width:50%; height:100%; height:70px; margin-top: 10px;">
          Notifications
        </button></a>
    </div>
    <div class="row">
    <button type="button" class="btn btn-primary btn-lg">Primary</button>
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading" style="text-align: center;">Records</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div>
                        <form action="{{route('search')}}" method="get">
                        <label>Search:</label>
                        <input type="text" name="search">
                        <button onclick="" style="width: 100px; margin-left: 5px;">Search</button>
                        </form>
                    </div>
                     <div class="table-responsive" style="overflow-x:auto; border-collapse: collapse; border-spacing: 0; width: 100%;"> 
                        <table class="table table-bordered" style="table-layout: fixed;">
                            <thead class="thead-inverse" style="">
                              <tr>
                                <th style="width: 100px; text-align: center">PR No.</th>
                                <th style="width: 300px; text-align: center; table-layout: auto">Particulars</th>
                                <th style="width: 120px; text-align: center">Date Required</th>
                                <th style="width: 100px; text-align: center">Requesting Division</th>
                                <th style="width: 100px; text-align: center">PO No.</th>
                                <th style="width: 100px; text-align: center">Total Actual Cost</th>
                                <th style="width: 150px; text-align: center">Total Approved Buget Cost</th>
                                <th style="width: 150px; text-align: center">Supplier</th>
                                <th style="width: 100px; text-align: center">Notice to Proceed</th>
                                <th style="width: 150px; text-align: center">Delivery/Completion</th>
                                <th style="width: 160px; text-align: center">Acceptance/Turnover</th>
                                <th style="width: 150px; text-align: center">CI No.</th>
                                <th style="width: 150px; text-align: center">No. of Days PO to Delivery</th>
                                <th style="width: 150px; text-align: center">No. of Days Delivery to Cashier</th>
                                <th style="width: 100px; text-align: center">Accounting</th>
                                <th style="width: 100px; text-align: center">Cashier</th>
                                <th style="width: 150px; text-align: center">Remarks</th>
                                <th style="width: 150px; text-align: center">Posted By</th>
                                 <th style="width: 150px; text-align: center">Update</th>
                              </tr>
                            </thead>
                            <tbody>
                                 @foreach($data_particulars as $data)
                              <tr>
                                <td>{{$data->pr_no}}</td>
                                <td>{{$data->particulars_details}}</td>
                                <td>{{$data->date_required}}</td>
                                <td>{{$data->requesting_division}}</td>
                                <td>{{$data->po_no}}</td>
                                <td>{{$data->total_actual_cost}}</td>
                                <td>{{$data->total_approved_budget_cost}}</td>
                                <td>{{$data->supplier_name}}</td>
                                <td>{{$data->notice_to_proceed}}</td>
                                <td>{{$data->delivery_completion}}</td>
                                <td>{{$data->acceptance_turnover}}</td>
                                <td>{{$data->ci_no}}</td>
                                <td>{{$data->number_of_days_po_to_delivery}}</td>
                                <td>{{$data->number_of_days_delivery_to_cashier}}</td>
                                <td>{{$data->accounting_date}}</td>
                                <td>{{$data->cashier_date}}</td>
                                <td>{{$data->remarks_details}}</td>
                                <td>{{$data->name}}</td>
                                <td>
                                <a href="{{route('editprocurement',$data->pr_id)}}">
                                    <button onclick="" style="width: 100px; margin-left: 20px;">Edit</button></a>
                                </td>
                                </tr>
                                 @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
