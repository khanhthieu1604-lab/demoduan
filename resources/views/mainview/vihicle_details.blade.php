@extends('mainview.layouts.master')
@section('content')

    <!-- Start Shop Detail  -->
    <div class="shop-detail-box-main">
        <div class="container">
            <div class="row">
                <div class="col-xl-5 col-lg-5 col-md-6">
                    <div id="carousel-example-1" class="single-product-slider carousel slide" data-ride="carousel">
                        {{-- <ol class="carousel-indicators"> --}}
                            @php $images = json_decode(json_encode($vihicleDetails->images), true); @endphp
                            
                            @if(is_array($images) && !empty($images))
                                @for($i = 0; $i < count($images); $i++)
                                    <li data-target="#carousel-example-1" data-slide-to="{{$i}}" class="active">
                                        <img class="d-block w-100 img-fluid" src="{{asset($images[$i])}}" alt="{{$vihicleDetails->vihicle_name}}" />
                                    </li>
                                @endfor
                            @endif
                        {{-- </ol> --}}
                    </div>

                </div>
                <div class="col-xl-7 col-lg-7 col-md-6">
                    <div class="single-product-details">
                        <h2>{{$vihicleDetails->vihicle_name}}</h2>
                        <h3>{{$vihicleDetails->vihicle_price}} VND / 1 Day (24h)</h3>
                        <h5><span style="color: red">***</span>Deposit (10% price contract): {{$vihicleDetails->vihicle_deposit}} VND </h5>
                        <h4>Details:</h4>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Description</th>
                                </tr>
                            </thead>
                            <tbody>
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

                        @if ($vihicleDetails->vihicle_status == 'Deposited')
                            <div class="badge badge-danger">
                                <a class="btn hvr-hover">Deposited</a>  
                            </div>
                        @elseif ($vihicleDetails->vihicle_status == 'Rentaled')
                            <div class="badge badge-danger">
                                <a class="btn hvr-hover">Rentaled</a>  
                            </div>
                        @elseif ($vihicleDetails->vihicle_status == 'Checking')
                            <div class="badge badge-danger">
                                <a class="btn hvr-hover">Checking</a>  
                            </div>
                        @elseif ($vihicleDetails->vihicle_status == 'Broken')
                            <div class="badge badge-danger">
                                <a class="btn hvr-hover">Broken</a>  
                            </div>
                        @else
                            <div class="price-box-bar">
                                <div class="cart-and-bay-btn">
                                    <a class="btn hvr-hover" data-fancybox-close="" href="{{route('checkout',['id'=> $vihicleDetails->id])}}">Rental</a>
                                </div>
                                <br>
                                <h4>(<span style="color: red">***</span>Warning: If you cancel contract, you will lost your deposit)</h4>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Cart -->

@endsection