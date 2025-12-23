@extends('mainview.layouts.master')
@section('content')

<div class="container" style="margin-top: 50px; margin-bottom: 50px;">
    <div class="row">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('/to-ren')}}">Home</a></li>
                <li class="breadcrumb-item">Checkout</li>
            </ol>
        </nav>
        <div class="col-md-12">

                @if (count($errors)>0)
                <div class="alert alert-danger" style="margin-top: 20px;">
                    @foreach ($errors->all() as $error)
                    {{$error}}<br>
                    @endforeach
                </div>
            @endif

            @if (session('alert'))
                <div class="alert alert-danger">
                    {{session('alert')}}
                </div>
            @endif

            @if (session('success'))
                <div class="alert alert-success">
                    {{session('success')}}
                </div>
            @endif

            <form method="post" action="{{route('post.checkout',['id' => $vihicleDetails->id])}}">
                <h3>Customer Information</h3>
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <th scope="row">Name</th>
                            <td>{{ Auth::user()->name }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Address</th>
                            <td>{{ $customer->address }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Phone number</th>
                            <td>{{ $customer->phone_number }}</td>
                        </tr>
                        <tr>
                            <th scope="row">ID Card</th>
                            <td>{{ $customer->id_card }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Driver License</th>
                            <td>{{ $customer->driver_license }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Passport</th>
                            <td>{{ $customer->passport}}</td>
                        </tr>
                        <tr>
                            <th scope="row">Status</th>
                            <td>
                                @if($customer->customer_status == 'Accepted')
                                <li class="btn btn-success">{{$customer->customer_status}}</li>
                                @elseif($customer->customer_status == 'Rejected')
                                <li class="btn btn-danger">{{$customer->customer_status}}</li>
                                @else
                                <li class="btn btn-secondary">{{$customer->customer_status}}</li>
                                @endif
                            </td>
                        </tr>
                        
                    </tbody>
                </table>

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Description</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Vihicle Name</td>
                            <td>{{$vihicleDetails->vihicle_name}}</td>
                        </tr>
                        <tr>
                            <td>Price</td>
                            <td>{{$vihicleDetails->vihicle_price}} VND / 1 Day (24h)</td>
                        </tr>
                        <tr>
                            <td>Deposit (10% of Price)</td>
                            <td>{{$vihicleDetails->vihicle_deposit}}</td>
                        </tr>
                        <tr>
                            <td>Chair number</td>
                            <td>{{$vihicleDetails->number_chair}}</td>
                        </tr>
                        <tr>
                            <td>Size</td>
                            <td>{{$vihicleDetails->size}}</td>
                        </tr>
                        <tr>
                            <td>Engine</td>
                            <td>{{$vihicleDetails->engine}}</td>
                        </tr>
                        <tr>
                            <td>Maximum power</td>
                            <td>{{$vihicleDetails->maximum_power}}</td>
                        </tr>
                        
                        <tr>
                            <td>Maximum torque</td>
                            <td>{{$vihicleDetails->maximum_torque}}</td>
                        </tr>
                        <tr>
                            <td>Gearbox</td>
                            <td>{{$vihicleDetails->gearbox}}</td>
                        </tr>
                        <tr>
                            <td>Color</td>
                            <td>{{$vihicleDetails->color}}</td>
                        </tr>
                        <tr>
                            <td>Weight</td>
                            <td>{{$vihicleDetails->weight}}</td>
                        </tr>
                        <tr>
                            <td>Year Manufacturer</td>
                            <td>{{$vihicleDetails->year_manufacture}}</td>
                        </tr>
                        <tr>
                            <td>Register time</td>
                            <td>{{$vihicleDetails->register_time}}</td>
                        </tr>
                    </tbody>
                </table>

                @csrf
                <input type="hidden" name="company_id" value="{{$vihicleDetails->company_id}}">

                <input type="hidden" name="customer_id" value="{{$customer->id}}">

                <div class="form-group">
                    <input type="checkbox" name="driver_status" value="yes" checked>
                    <label for="driver_status">Need Driver: (negotiate on the price)</label>
                </div>

                <div class="form-group">
                    <label for="exampleFormControlInput1">Pick-up location</label>
                    <input type="text" class="form-control" name="pickup_location" placeholder="Location you want to pick up">
                </div>

                <div class="form-group">
                    <label for="exampleFormControlInput1">Location arrive</label>
                    <input type="text" class="form-control" name="location_togo" placeholder="Location you will arrive">
                </div>

                <div class="form-group form-check">
                    <input type="checkbox" class="form-check-input" name="location_dropoff_vihicle" value="Drop-off at pick-up location" checked="checked">
                    <label class="form-check-label" for="exampleCheck1">Drop-off at pick-up location</label>
                </div>

                <div class="form-row">
                    <div class="form-froup col-md-6" style="width: 400px;">
                        <label for="exampleFormControlInput1">Time Pick Up</label>
                        <input type="text" id="picker1" class="form-control" name="pickup_time">
                    </div>
                    <div class="form-froup col-md-6" style="width: 400px;">
                        <label for="exampleFormControlInput1">Time Drop Off</label>
                        <input type="text" id="picker2" class="form-control" name="dropoff_time">
                    </div>
                </div>

                <button type="submit" class="btn btn-primary mt-3">Send</button>
            </form>
        </div>
    </div>
</div>

@endsection

@section('scripts')
    <script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&libraries=places"></script>
   
    <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false&libraries=places"></script>

    <script type="text/javascript">
        google.maps.event.addDomListener(window, 'load', function () {
            var places = new google.maps.places.Autocomplete(document.getElementById('txtPlaces'));
            google.maps.event.addListener(places, 'place_changed', function () {

            });

            var places = new google.maps.places.Autocomplete(document.getElementById('txtPlaces1'));
            google.maps.event.addListener(places, 'place_changed', function () {

            });
        });
    </script>

    <script>
        $(function () {
            $('#datetimepicker3').datetimepicker({
                
            });
        });
    </script>

    <script>
        $( function() {
            $( "#datepicker" ).datepicker();
            $( "#datepicker1" ).datepicker();
        } );
    </script>
    
@endsection