
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
            ----------------------
            <li><a href="{{url('/user-info')}}" class="btn btn-warning"><i class="fa fa-quit"></i>Back</a></li>
            <br>
            CONTRACT STATUS:
            <td style="text-align: center"><li><a class="btn btn-secondary"><i class="fa fa-question"></i></a><b> : VERIFYING</b></li></td>
            <br>
            <td style="text-align: center"><li><a class="btn btn-danger"><i class="fa fa-window-close"></i></a><b> : CANCEL</b></li></td>
            <br>
            <td style="text-align: center"><li><a class="btn btn-success"><i class="fa fa-money-check"></i></a><b> : SEND MONEY</b></li></td>
            <br>
            <td style="text-align: center"><li><a class="btn btn-warning"><i class="fa fa-exclamation-triangle"></i></a><b> : CAN'T EDIT</b></li></td>
            <br>
            <td style="text-align: center"><li><a class="btn btn-success"><i class="fa fa-check"></i></a><b> : CHECKING MONEY</b></li></td>
            <br>
            <td style="text-align: center"><li><a class="btn btn-success"><i class="fa fa-shipping-fast"></i></a><b> : DELIVERY</b></li></td>
            <br>
            <td style="text-align: center"><li><a class="btn btn-success"><i class="fa fa-exchange-alt"></i></a><b> : RETURN VIHICLE</b></li></td>
            <br>
        </div>

        <div class="col-sm-10">
            <strong>RENTALING STATUS:</strong>
            <table id="table_id" class="table table-bordered">

            <thead>
                <tr>
                    <th scope="col" style="text-align: center">CHECKOUT TIME</th>
                    <th scope="col" style="text-align: center">START</th>
                    <th scope="col" style="text-align: center">FINISH</th>
                    <th scope="col" style="text-align: center">TIME PICK UP</th>
                    <th scope="col" style="text-align: center">TIME DROP OFF</th>
                    <th scope="col" style="text-align: center">STATUS</th>
                    <th scope="col" style="text-align: center">ACTIVE</th>
                    <th scope="col" style="text-align: center">CANCEL</th>
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
                    <td style="text-align: center"><h1><span class="badge badge-primary"><b>{{$contract->contract_status}}</b></span></h1></td>
                    
                    {{-- ACTIVE --}}
                    @if ($contract->contract_status === 'Verifying')
                    <td style="text-align: center"><li><a class="btn btn-secondary"><i class="fa fa-question"></i></a></li></td>

                    @elseif ($contract->contract_status === 'Deposit')
                    <td style="text-align: center"><li><a href="{{url('/rentaling-edit/'.$contract->id)}}" class="btn btn-success"><i class="fa fa-money-check"></i></a></li></td>

                    @elseif($contract->contract_status === 'Rejected')
                    <td style="text-align: center"><li><a class="btn btn-warning"><i class="fa fa-exclamation-triangle"></i></a></li></td>

                    @elseif($contract->contract_status === 'Deposited')
                    <td style="text-align: center"><li><a class="btn btn-success"><i class="fa fa-check"></i></a></li></td>

                    @elseif($contract->contract_status === 'Delivery')
                    <td style="text-align: center"><li><a class="btn btn-success"><i class="fas fa-shipping-fast"></i></a></li></td>

                    @elseif ($contract->contract_status === 'Rentaling')
                    <td style="text-align: center"><li><a href="{{url('/rentaling-edit/'.$contract->id)}}" class="btn btn-success"><i class="fas fa-exchange-alt"></i></a></li></td>

                    @elseif($contract->contract_status === 'Return')
                    <td style="text-align: center"><li><a class="btn btn-warning"><i class="fa fa-exclamation-triangle"></i></a></li></td>                   

                    @else
                    <td style="text-align: center"><li><a class="btn btn-warning"><i class="fa fa-exclamation-triangle"></i></a></li></td>

                    @endif

                    {{-- CANCEL --}}
                    @if ($contract->contract_status === 'Verifying')
                    <td style="text-align: center"><li><a href="{{url('/rentaling-cancel/'.$contract->id)}}" class="btn btn-danger"><i class="fa fa-window-close"></i></a></li></td>

                    @elseif ($contract->contract_status === 'Deposit')
                    <td style="text-align: center"><li><a href="{{url('/rentaling-cancel/'.$contract->id)}}" class="btn btn-danger"><i class="fa fa-window-close"></i></a></li></td>

                    @elseif($contract->contract_status === 'Rejected')
                    <td style="text-align: center"><li></li></td>

                    @elseif($contract->contract_status === 'Deposited')
                    <td style="text-align: center"><li><a href="{{url('/rentaling-cancel/'.$contract->id)}}" class="btn btn-danger"><i class="fa fa-window-close"></i></a></li></td>

                    @elseif($contract->contract_status === 'Delivery')
                    <td style="text-align: center"><li><a href="{{url('/rentaling-cancel/'.$contract->id)}}" class="btn btn-danger"><i class="fa fa-window-close"></i></a></li></td>

                    @elseif ($contract->contract_status === 'Rentaling')
                    <td style="text-align: center"><li></li></td>

                    @elseif($contract->contract_status === 'Return')
                    <td style="text-align: center"><li><a href="{{url('/rentaling-cancel/'.$contract->id)}}" class="btn btn-danger"><i class="fa fa-window-close"></i></a></li></td>

                    @else
                    <td style="text-align: center"><li></li></td> 

                    @endif

                </tr>
                @endforeach
            </tbody>

            </table>
        </div>
    </div>

    {{-- @if ($contract->contract_status === 'Verifying')
    <td style="text-align: center"><li><a href="" class="btn btn-secondary"><i class="fa fa-question"></i></a></li></td>
    <td style="text-align: center"><li><a href="{{url('/rentaling-cancel/'.$contract->id)}}" class="btn btn-danger"><i class="fa fa-window-close"></i></a></li></td>

    @elseif ($contract->contract_status === 'Deposit')
    <td style="text-align: center"><li><a href="{{url('/rentaling-cancel/'.$contract->id)}}" class="btn btn-success"><i class="fa fa-money-check"></i></a></li></td>
    <td style="text-align: center"><li><a href="{{url('/rentaling-cancel/'.$contract->id)}}" class="btn btn-danger"><i class="fa fa-window-close"></i></a></li></td>

    @elseif($contract->contract_status === 'Rejected')
    <td style="text-align: center"><li><a class="btn btn-warning"><i class="fa fa-exclamation-triangle"></i></a></li></td>
    <td style="text-align: center"><li></li></td>

    @elseif($contract->contract_status === 'Deposited')
    <td style="text-align: center"><li><a class="btn btn-success"><i class="fa fa-check"></i></a></li></td>
    <td style="text-align: center"><li></li></td>

    @elseif($contract->contract_status === 'Delivery')
    <td style="text-align: center"><li><a class="btn btn-success"><i class="fas fa-shipping-fast"></i></a></li></td>
    <td style="text-align: center"><li><a href="{{url('/rentaling-cancel/'.$contract->id)}}" class="btn btn-danger"><i class="fa fa-window-close"></i></a></li></td>

    @elseif ($contract->contract_status === 'Rentaling')
    <td style="text-align: center"><li><a href="{{url('/rentaling-cancel/'.$contract->id)}}" class="btn btn-success"><i class="fas fa-exchange-alt"></i></a></li></td>
    <td style="text-align: center"><li></li></td>

    @elseif($contract->contract_status === 'Return')
    <td style="text-align: center"><li><a class="btn btn-warning"><i class="fa fa-exclamation-triangle"></i></a></li></td>
    <td style="text-align: center"><li><a href="{{url('/rentaling-cancel/'.$contract->id)}}" class="btn btn-danger"><i class="fa fa-window-close"></i></a></li></td>

    @else
    <td style="text-align: center"><li><a class="btn btn-warning"><i class="fa fa-exclamation-triangle"></i></a></li></td>
    <td style="text-align: center"><li></li></td> 

    @endif --}}


</div>

{{-- <td style="text-align: center"><li><a href="#" id="button" class="btn btn-danger"><i class="fa fa-edit"></i>EDIT</a></li></td>
<div class="bg-modal" style="width: 100%;
                            height: 100%;
                            background-color: rgba(255, 255, 255, 0.7);
                            position: absolute;
                            top: 0;
                            display: flex;
                            justify-content: center;
                            align-items: center;
                            display: none;">
    <div  iv class="model-content" style="width: 500px;
                                    height: 300px;
                                    background-color: gray;
                                    border-radius: 4px;
                                    align-items: center;
                                    padding: 20px;
                                    position: relative;">
        <h2>ARE YOU SURE ???</h2>

        <div class="close" style="position: absolute;
                                top: 0;
                                right: 14px;
                                font-size: 42px;
                                transform: rotate(45deg);
                                cursor: pointer;">+</div>
        @if ($contract->contract_status === 'Verifying')
        <td style="text-align: center"><li><a href="{{url('/rentaling-cancel/'.$contract->id)}}" class="btn btn-danger"><i class="fa fa-window-close"></i>Verifying</a></li></td>

        @elseif ($contract->contract_status === 'Deposit')
        <td style="text-align: center"><li><a href="{{url('/rentaling-cancel/'.$contract->id)}}" class="btn btn-success"><i class="fa fa-money-check"></i>Deposit</a></li></td>

        @elseif($contract->contract_status === 'Rejected')
        <td style="text-align: center"><li><a class="btn btn-warning"><i class="fa fa-exclamation-triangle"></i>Rejected</a></li></td>

        @elseif($contract->contract_status === 'Deposited')
        <td style="text-align: center"><li><a class="btn btn-success"><i class="fa fa-check"></i>Deposited</a></li></td>

        @elseif($contract->contract_status === 'Delivery')
        <td style="text-align: center"><li><a class="btn btn-success"><i class="fas fa-shipping-fast"></i>Delivery</a></li></td>

        @elseif ($contract->contract_status === 'Rentaling')
        <td style="text-align: center"><li><a href="{{url('/rentaling-cancel/'.$contract->id)}}" class="btn btn-success"><i class="fas fa-exchange-alt"></i>Rentaling</a></li></td>

        @elseif($contract->contract_status === 'Return')
        <td style="text-align: center"><li><a class="btn btn-warning"><i class="fa fa-exclamation-triangle"></i>Return</a></li></td>

        @else 
        <td style="text-align: center"><li><a href="{{url('/rentaling-cancel/'.$contract->id)}}" class="btn btn-danger"><i class="fa fa-window-close"></i>Cancel</a></li></td>

        @endif
    </div>
</div> --}}

<script src="{{asset('js/popup.js')}}"></script>

@endsection

