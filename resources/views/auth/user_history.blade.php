@extends('mainview.layouts.master')
@section('content')

<div class="container userinfo">
    <div class="row" style="border-bottom: 1px solid white">
        <div class="col-sm-2" style="border-right: 1px solid white">
            @if($customer)
            <div class="userimage">
                <caption>IMAGE</caption>
                <br>
                <img class="img-thumbnail" src="{{url('/userimages/'.$customer->images)}}" alt="" style="width:200px;">
            </div>
            @endif
        </div>

        <div class="col-sm-10">
            <div class="infobanner">
            BANNER
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-2" style="border-right:1px solid white">
            <strong>Welcome to CARRENTAL</strong>
            <br>
            <td>Hello! {{$userinfo->name}}</td>
            <br> 
            <td>Email: {{$userinfo->email}}</td>
            <br>
            ----------------------------------
            <li><a href="{{url('/user-info')}}" class="btn btn-warning"><i class="fa fa-quit"></i>Back</a></li>
            <br>
        </div>

        <div class="col-sm-10">
            <strong>HISTORY:</strong>
            <table id="table_id" class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col" style="text-align: center">CHECKOUT TIME</th>
                    <th scope="col" style="text-align: center">START</th>
                    <th scope="col" style="text-align: center">FINISH</th>
                    <th scope="col" style="text-align: center">TIME PICK UP</th>
                    <th scope="col" style="text-align: center">TIME DROP OFF</th>
                    <th scope="col" style="text-align: center">STATUS</th>
                </tr>
            </thead>
            
            <tbody>
                @foreach($contracts as $contract)
                <tr style="background-color: rgb(58, 54, 54)">
                    <td style="text-align: center">{{$contract->created_at}}</td>
                    <td style="text-align: center">{{$contract->pickup_location}}</td>
                    <td style="text-align: center">{{$contract->location_togo}}</td>
                    <td style="text-align: center">{{$contract->pickup_time}}</td>
                    <td style="text-align: center">{{$contract->dropoff_time}}</td>
                    <td style="text-align: center"><li class="btn btn-success">{{$contract->contract_status}}</li></td>
                </tr>
                @endforeach
            </tbody>
            </table>
        </div>
    </div>
</div>

@endsection