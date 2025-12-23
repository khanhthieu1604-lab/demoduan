@extends('mainview.layouts.master')
@section('content')

<div class="container userinfo">
    <div class="row" style="border-bottom: 1px solid white">
        <div class="col-sm-3" style="border-right: 1px solid white">
            PERSONAL IMAGE
        </div>

        <div class="col-sm-9">
            <div class="infobanner">
            BANNER
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
            <li><a href="{{url('/user-info')}}" class="btn btn-warning"><i class="fa fa-quit"></i> Back</a></li>
            <br>
        </div>

        <div class="col-sm-9">
            <thead>
                <tr>
                    <th>UPDATE INFOMATION: </th>
                </tr>
            </thead>
            
            <div class="information">
                    <div class="panel-body">
                        <form class="col-sm-16" enctype="multipart/form-data" action="{{url('/add-info')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label>Address</label> <span style="color: red">*</span>
                                <input style="width: 400px" type="text" class="form-control" placeholder="Enter Your Address" name="address" id="address" required>
                            </div>

                            <div class="form-group">
                                <label>Phone</label> <span style="color: red">*</span>
                                <input style="width: 250px" type="text" class="form-control" placeholder="Phone Number (10-11 number) " name="phone_number" id="phone_number" required>
                            </div>

                            <div class="form-group">
                                <label>Driver License</label> <span style="color: red">*</span>
                                <input style="width: 250px" type="text" class="form-control" placeholder="Enter Product Driver License" name="driver_license" id="driver_license" required>
                            </div>

                            <div class="form-group">
                                <label>ID Card</label> <span style="color: red">*</span>
                                <input style="width: 250px" type="text" class="form-control" placeholder="Enter Your ID Card" name="id_card" id="id_card" required>
                            </div>

                            <div class="form-group">
                                <label>Passport</label> <span style="color: red">*</span>
                                <input style="width: 250px" type="text" class="form-control" placeholder="Enter Your Passport" name="passport" id="passport" required>
                            </div>

                            @if($customer)
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
                            @endif

                            <div class="form-group">
                                <label>Your ID: </label>
                                <strong>{{$userinfo->id}}</strong>
                            </div>

                            <div class="form-group">
                                <label>ID Image (Front)</label> <span style="color: red">*</span>
                                <input type="file" name="id_image_f">
                            </div>

                            <div class="form-group">
                                <label>ID Image (Behind)</label> <span style="color: red">*</span>
                                <input type="file" name="id_image_b">
                            </div>

                            <div class="form-group">
                                <label>Personal Image</label> <span style="color: red">*</span>
                                <input type="file" name="images">
                            </div>

                            <div class="reset-button">
                                <input type="submit" class="btn btn-success" value="Add Info">
                            </div>
                        </form>
                    </div>
            </div>
        </div>
    </div>
</div>

@endsection
