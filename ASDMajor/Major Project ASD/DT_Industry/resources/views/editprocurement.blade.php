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
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading" style="text-align: center; color: white; background-color: #39ac73">Edit Procurement</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    @foreach($particulars_id as $value)
                        <form action="{{route('edit', $value->pr_id)}}" method="post">
                        <div class="form-group" style="width:30%;">
                        <label for="text" >PR No.:</label>
                        <input type="text" class="form-control" name="pr_no" value="{{$value->pr_no}}" required>
                        </div>
                        <div class="form-group">
                        <label for="text">Particulars:</label>
                         <textarea name ="particulars_details" style="height:20%" class="                         form-control" id="pwd" required> {{$value->particulars_details}}
                        </textarea>
                        </div> 
                        <div class="form-group" style="width:30%;">
                        <label for="text" >Date Required:</label>
                        <input name="date_required" type="Date" class="form-control" id="                         usr" value="{{$value->date_required}}" required>
                        </div>
                        <div class="form-group" style="width:30%;">
                        <label for="text" >Requesting Division:</label>
                        <input name="requesting_division" type="text" class="form-control"                         id="usr" value="{{$value->requesting_division}}" required>
                        </div>
                        <div class="form-group" style="width:30%;">
                        <label for="text" >Po No.:</label>
                        <input name="po_no" type="text" class="form-control" id="usr" value="{{$value->po_no}}" >
                        </div>
                        <div class="form-group" style="width:30%;">
                        <label for="text" >Total Actual Cost:</label>
                        <input name="total_actual_cost" type="number" class="form-control" id="usr" value="{{$value->total_actual_cost}}" >
                        </div>
                        <div class="form-group" style="width:30%;">
                        <label for="text" >Total Approved Budget Cost:</label>
                        <input name="total_approved_budget_cost" type="number" class="form-control" id="usr" value="{{$value->total_approved_budget_cost}}">
                        </div>
                        <div class="form-group" style="width:30%;">
                        <label for="text" >Supplier:</label>
                        <input name="supplier_name" type="text" class="form-control" id="usr" value="{{$value->supplier_name}}">
                        </div>
                        <div class="form-group" style="width:30%;">
                        <label for="text" >Notice to proceed:</label>
                        <input name="notice_to_proceed" type="Date" class="form-control" id="usr" value="{{$value->notice_to_proceed}}">
                        </div>
                        <div class="form-group" style="width:30%;">
                        <label for="text" >Delivery/Completion:</label>
                        <input name="delivery_completion" type="Date" class="form-control" id="usr" value="{{$value->delivery_completion}}">
                        </div>
                        <div class="form-group" style="width:30%;">
                        <label for="text">Acceptance/Turnover:</label>
                        <input name="acceptance_turnover" type="Date" class="form-control" id="usr" value="{{$value->acceptance_turnover}}">
                        </div>
                        <div class="form-group" style="width:30%;">
                        <label for="text">CI No.:</label>
                        <input name="ci_no" type="text" class="form-control" id="usr" value="{{$value->ci_no}}">
                        </div>
                        <div class="form-group" style="width:30%;">
                        <label for="text">Accounting:</label>
                        <input name="accounting_date" type="Date" class="form-control" id="usr" value="{{$value->accounting_date}}">
                        </div>
                        <div class="form-group" style="width:30%;">
                        <label for="text ">Cashier:</label>
                        <input name="cashier_date" type="Date" class="form-control" id="usr" value="{{$value->cashier_date}}">
                        </div>
                        <div class="form-group" style="width:30%;">
                        <button class="btn btn-primary btn-lg">
                        Submit</button> 
                        <input type="hidden" value="{{Session::token()}}" name="_token">
                        </div>
                    </form>
                     @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
    