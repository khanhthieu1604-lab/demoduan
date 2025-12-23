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
                        <form class="col-sm-16" enctype="multipart/form-data" action="{{url('/edit-info/'.$customer->id)}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label>Address</label>
                                <input style="width: 400px" type="text" class="form-control" value="{{$customer->address}}" placeholder="Enter Product Address" name="address" id="address" required>
                            </div>

                            <div clss="form-group">
                                <label>Phone</label>
                                <input style="width: 250px" type="text" class="form-control" value="{{$customer->phone_number}}" placeholder="Enter Your Phone Number" name="phone_number" id="phone_number" required>
                            </div>

                            <div class="form-group">
                                <label>Driver License</label>
                                <input style="width: 250px" type="text" class="form-control" value="{{$customer->driver_license}}" placeholder="Enter Product Driver License" name="driver_license" id="driver_license" required>
                            </div>

                            <div class="form-group">
                                <label>ID Card</label>
                                <input style="width: 250px" type="text" class="form-control" value="{{$customer->id_card}}" placeholder="Enter Your ID Card" name="id_card" id="id_card" required>
                            </div>

                            <div class="form-group">
                                <label>Passport</label>
                                <input style="width: 250px" type="text" class="form-control" value="{{$customer->passport}}" placeholder="Enter Your Passport" name="passport" id="passport" required>
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

                            <div class="form-group">
                                <label>User ID: </label>
                                <strong>{{$userinfo->id}}</strong>
                            </div>

                            <div class="form-group">
                                <label>ID Image (Front)</label>
                                <input type="file" name="id_image_f">
                                <input type="hidden" name="current_image1" value="{{$customer->id_image_f}}">
                                <br>
                                @if(!empty($customer->id_image_f))
                                    <img class="img-thumbnail" style="width:200px;" src="{{url('/idimages/'.$customer->id_image_f)}}"> 
                                @endif
                            </div>

                            <div class="form-group">
                                <label>ID Image (Behind)</label>
                                <input type="file" name="id_image_b">
                                <input type="hidden" name="current_image2" value="{{$customer->id_image_b}}">
                                <br>
                                @if(!empty($customer->id_image_b))
                                   <img class="img-thumbnail" style="width:200px;" src="{{url('/idimages/'.$customer->id_image_b)}}"> 
                                @endif
                            </div>

                            <div class="form-group">
                                <label>Picture upload</label>
                                <input type="file" name="images">
                                <input type="hidden" name="current_image" value="{{$customer->images}}">
                                <br>
                                @if(!empty($customer->images))
                                   <img class="img-thumbnail" style="width:200px;" src="{{url('/userimages/'.$customer->images)}}"> 
                                @endif
                            </div>

                            <div class="reset-button">
                                <input type="submit" class="btn btn-success" value="Edit">
                                <li><a href="{{url('/user-info')}}" class="btn btn-warning"><i class="fa fa-quit"></i>Cancel</a></li>
                            </div>
                            
                        </form>
                    </div>
                    @endif
            </div>
        </div>
    </div>
</div>

@endsection

