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
                <div class="panel-heading" style="text-align: center; color: white; background-color: #39ac73">Records</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                     <div class="table-responsive" style="overflow-x:auto; border-collapse: collapse; border-spacing: 0; width: 100%;"> 
                        <table class="table table-bordered" style="table-layout: fixed;">
                            <thead class="thead-inverse" style="">
                              <tr>
                                <th style="width: 100px; text-align: center">Date Required</th>
                                <th style="width: 300px; text-align: center; table-layout: auto">Particulars</th>
                                <th style="width: 100px; text-align: center">Action</th>
                              </tr>
                            </thead>
                            <tbody>

                                 @foreach($data_particulars as $data)
                                 @if($data->before_date==$data->current)
                                <tr>
                                <td>Required within 3 days</td>
                                <td>{{$data->particulars_details}}</td>
                                <td><a href="{{route('deletenotif',$data->pr_id)}}"><button style="width:100px; margin-left: 10px">OK</button></a></td>
                                 @endif
                                 @if($data->second_date==$data->current)
                                <tr>
                                <td style="color:green">Required within 2 days</td>
                                <td>{{$data->particulars_details}}</td>
                                 <td><a href="{{route('deletenotif',$data->pr_id)}}"><button style="width:100px; margin-left: 10px">OK</button></a></td>
                                 @endif
                                 @if($data->third_date==$data->current)
                                <tr>
                                <td style="color:orange">Required within 1 day</td>
                                <td>{{$data->particulars_details}}</td>
                                <td><a href="{{route('deletenotif',$data->pr_id)}}"><button style="width:100px; margin-left: 10px">OK</button></a></td>
                                 @endif
                                  @if($data->final==$data->current)
                                <tr>
                                <td style="color:red; font-style:bolder">Required today!</td>
                                <td>{{$data->particulars_details}}</td>
                                <td><a href="{{route('deletenotif',$data->pr_id)}}"><button style="width:100px; margin-left: 10px">OK</button></a></td>
                                 @endif
                                 @endforeach
                            </tbody>
                        </table>
                        <center>
                        <hr>
                        {{$data_particulars->appends(Request::except('page'))->links()}}
                      </center> 
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
