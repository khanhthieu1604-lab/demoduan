@extends('mainview.layouts.master')
@section('content')

<div class="container userinfo">
    <div class="row" style="border-bottom: 1px solid white">
        <div class="col-sm-3" style="border-right: 1px solid white">
            @if($customer)
            <div class="userimage">
                <caption>IMAGE</caption>
                <br>
                <img class="img-thumbnail" src="{{url('/userimages/'.$customer->images)}}" alt="" style="width:200px;">
            </div>
            @endif
        </div>

        <div class="col-sm-9">
            <div class="infobanner">
            banner
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-3" style="border-right:1px solid white">
            <strong>Welcome to CARRENTAL</strong>
            <br>
            <td>Hello! {{$userinfo->name}}</td>
            <br> 
            <td>Email: {{$userinfo->email}}</td>
            <br>
            ----------------------------------
            <li><a href="{{url('/user-history')}}" class="btn btn-danger"><i class="fa fa-history"></i> History</a></li>
            <br>
            <li><a href="{{url('/user-rentaling')}}" class="btn btn-info"><i class="fa fa-spinner"></i> Rentaling Status</a></li>
            <br>
        </div>

        <div class="col-sm-9">
            <thead>
                <tr>
                    <th>INFOMATION: </th>
                </tr>
            </thead>
            
            <div class="information">
                    @if($customer)
                    <div class="panel-body">
                        <form class="col-md-12" enctype="multipart/form-data" action="{{url('/add-info')}}" method="POST">
                            <div class="form-group">
                                <td>Address: </td>
                                <td>{{$customer->address}}</td>
                            </div>

                            <div class="form-group">
                                <label>Phone: </label>
                                <td>{{$customer->phone_number}}</td>
                            </div>

                            <div class="form-group">
                                <label>Driver License: </label>
                                <td>{{$customer->driver_license}}</td>
                            </div>

                            <div class="form-group">
                                <label>ID Card: </label>
                                <td>{{$customer->id_card}}</td>
                            </div>

                            <div class="form-group">
                                <label>Passport: </label>
                                <td>{{$customer->passport}}</td>
                            </div>

                            <div class="form-group">
                                <label>Your ID: </label>
                                <strong>{{$customer->id}}</strong>
                            </div>

                            <div class="form-group">
                                <label>Status: </label>
                                <strong>
                                    @if($customer->customer_status == 'Accepted')
                                    <li class="btn btn-success">{{$customer->customer_status}}</li>
                                    @elseif($customer->customer_status == 'Rejected')
                                    <li class="btn btn-danger">{{$customer->customer_status}}</li>
                                    @else
                                    <li class="btn btn-secondary">{{$customer->customer_status}}</li>
                                    @endif
                                </strong>
                            </div>

                            @if(($customer->id_image_f)==null)
                            <label>PLEASE UPDATE ID IMAGE (FRONT)!!!</label>
                            <br>
                            @else
                             <div class="form-group">
                                <label>ID Image (Front)</label>
                                <br>
                                <img class="img-thumbnail" src="{{url('/idimages/'.$customer->id_image_f)}}" alt="" style="width:200px;">
                            </div>
                            @endif

                            @if(($customer->id_image_f)==null)
                            <label>PLEASE UPDATE ID IMAGE (BEHIND)!!!</label>
                            <br>
                             @else
                            <div class="form-group">
                                <label>ID Image (Behind)</label>
                                <br>
                                <img class="img-thumbnail" src="{{url('/idimages/'.$customer->id_image_b)}}" alt="" style="width:200px;">
                            </div>
                            @endif
                        </form>
                    </div>
                    @endif
            </div>

            <div class="add-info">
                @if($customer)
                    <li><a href="{{url('/edit-info/'.$customer->id)}}" class="btn btn-warning"><i class="fa fa-edit"></i>Edit Infomation</a></li>    
                @else
                    <li><a href="{{url('/add-info')}}" class="btn btn-primary"><i class="fa fa-add"></i> Add Infomation</a></li>
                @endif
            </div>
        </div>
    </div>
</div>

@endsection