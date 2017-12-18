@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col-md-3" style="position: absolute ;margin-left:-112px; margin-top: 3px;width:30%;">
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
        <div class="col-md-10 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading" style="text-align: center; color:white; background-color: #39ac73">Add Procurement</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                        <form action="{{ route('Post')}}" method="post">
                        <div class="form-group" style="width:30%; margin-left: 5%">
                        <label for="text" >PR No.:</label>
                        <input type="text" class="form-control" name="pr_no" required>
                        </div> 
                        <div class="form-group" style="margin-left: 5%">
                        <label for="text">Particulars:</label>
                        <textarea name ="particulars_details" style="height: 20%; width: 30%;" class="                         form-control" id="pwd" required>
                        </textarea>
                        </div> 
                        <div class="form-group" style="width:30%;margin-left: 5%">
                        <label for="text" >Date Required:</label>
                        <input name="date_required" type="Date" class="form-control" id="                         usr" required>
                        </div>
                        <div class="form-group" style="width:30%;margin-left: 5%">
                        <label for="text" >Requesting Division:</label>
                        <input name="requesting_division" type="text" class="form-control"                         id="usr" required>
                        </div>
                        <div class="form-group" style="width:30%;margin-left: 5%">
                        <label for="text" >Po No.:</label>
                        <input name="po_no" type="text" class="form-control" id="usr">
                        </div>
                        <div class="form-group" style="width:30%;margin-left: 5%">
                        <label for="text" >Total Actual Cost:</label>
                        <input name="total_actual_cost" type="number" class="form-control" id="usr">
                        </div>
                        <div class="form-group" style="width:30%;margin-left: 5%">
                        <label for="text" >Total Approved Budget Cost:</label>
                        <input name="total_approved_budget_cost" type="number" class="form-control" id="usr">
                        </div>
                        <div class="form-group" style="width:30%; margin-left: 50%; margin-top: -62%">
                        <label for="text" >Supplier:</label>
                        <input name="supplier_name" type="text" class="form-control" id="usr">
                        </div>
                        <div class="form-group" style="width:30%;margin-left: 50%">
                        <label for="text" >Notice to proceed:</label>
                        <input name="notice_to_proceed" type="Date" class="form-control" id="usr">
                        </div>
                        <div class="form-group" style="width:30%;margin-left: 50%">
                        <label for="text" >Delivery/Completion:</label>
                        <input name="delivery_completion" type="Date" class="form-control" id="usr">
                        </div>
                        <div class="form-group" style="width:30%;margin-left: 50%">
                        <label for="text">Acceptance/Turnover:</label>
                        <input name="acceptance_turnover" type="Date" class="form-control" id="usr">
                        </div>
                        <div class="form-group" style="width:30%;margin-left: 50%">
                        <label for="text">CI No.:</label>
                        <input name="ci_no" type="text" class="form-control" id="usr">
                        </div>
                        <div class="form-group" style="width:30%;margin-left: 50%">
                        <label for="text">Accounting:</label>
                        <input name="accounting_date" type="Date" class="form-control" id="usr">
                        </div>
                        <div class="form-group" style="width:30%;margin-left: 50%">
                        <label for="text">Cashier:</label>
                        <input name="cashier_date" type="Date" class="form-control" id="usr">
                        </div>
                        <div class="form-group" style="width:30%; float: center;margin-left: 50%">
                        <button class="btn btn-primary btn-lg">
                        Submit</button> 
                        <input type="hidden" value="{{Session::token()}}" name="_token">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
    