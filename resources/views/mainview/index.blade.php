@extends('mainview.layouts.master')
@section('content')

        <!-- Start Slider -->
        <div id="slides-shop" class="cover-slides">
            <ul class="slides-container">
                <li class="text-left">
                    <img src="images/banner-1.jpg" alt="">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <h1 class="m-b-20"><strong>Welcome To <br> CARRENTAL</strong></h1>
                                <p class="m-b-40">You are having trouble finding a rental vehicle <br> THECARRENTAL will solve it for you.</p>
                                <p><a class="btn hvr-hover" href="#">HOTLINE</a></p>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="text-center">
                    <img src="images/banner-2.jpg" alt="">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <h1 class="m-b-20"><strong>Welcome To <br> CARRENTAL</strong></h1>
                                <p class="m-b-40">You are having trouble connecting with car rental customers <br> THECARRENTAL will provide the solution for you.</p>
                                <p><a class="btn hvr-hover" href="#">HOTLINE</a></p>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="text-right">
                    <img src="images/banner-3.jpg" alt="">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <h1 class="m-b-20"><strong>Welcome To <br> CARRENTAL</strong></h1>
                                <p class="m-b-40">Optimal technology solutions for car rental <br> What are you waiting for ? Come on with THE CARRENTAL.</p>
                                <p><a class="btn hvr-hover" href="#">HOTLINE</a></p>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
            <div class="slides-navigation">
                <a href="#" class="next"><i class="fa fa-angle-right" aria-hidden="true"></i></a>
                <a href="#" class="prev"><i class="fa fa-angle-left" aria-hidden="true"></i></a>
            </div>
        </div>
        <!-- End Slider -->

    <!-- Start Top Search -->
    <div class="container">
        <div class="input-group">
            <form role="search" method="GET" id="searchForm" action="{{route('search')}}">
                <input type="text" value="" name="key" id="s" placeholder="Enter Keyword" />
                <button class="fa fa-search" type="submit" id="searchsubmit"></button>
            </form>
        </div>
    </div>
    <!-- End Top Search -->
    
    <!-- Start Shop Page  -->
    <div class="shop-box-inner">
        <div class="container">
            <div class="row">
                <div class="col-md-12 shop-content-right">
                    <div class="right-product-box">
                        <caption><h3 style="color: white"><strong>ALL VIHICLE</strong></h3></caption>
                        <div class="row product-categorie-box">
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane fade show active" id="grid-view">
                                    <div class="row">
                                        @foreach($vihicles as $vihicle)
                                        <div class="col-md-3">
                                            <div class="products-single fix">

                                                <div class="box-img-hover">
                                                    @php $images = json_decode(json_encode($vihicle->vihicle_images), true); @endphp

                                                    @if(is_array($images) && !empty($images))
                                                        <img src="{{asset('uploads/vihicle/'.$images[0])}}" class="img-fluid" alt="Image not available" style="width:300px; height: 160px">
                                                    @endif

                                                    @if ($vihicle->vihicle_status == 'Deposited')
                                                        <div class="mask-icon">
                                                            <a class="cart">Deposited</a>
                                                        </div>
                                                    @elseif ($vihicle->vihicle_status == 'Rentaled')
                                                        <div class="mask-icon">
                                                            <a class="cart">Rentaled</a>
                                                        </div>
                                                    @elseif ($vihicle->vihicle_status == 'Checking')
                                                        <div class="mask-icon">
                                                            <a class="cart">Checking</a>
                                                        </div>
                                                    @elseif ($vihicle->vihicle_status == 'Broken')
                                                        <div class="mask-icon">
                                                            <a class="cart">Broken</a>
                                                        </div>
                                                    @else
                                                        <div class="mask-icon">
                                                            <a class="cart" href="{{url('/vihicles/'.$vihicle->id)}}">Rental Now</a>
                                                        </div>
                                                    @endif
                                                </div>

                                                <div style="border-top: 2px solid black" class="why-text">
                                                    <h2>{{$vihicle->vihicle_name}}</h2>

                                                    @foreach($companies as $company)
                                                        @if($vihicle->company_id == $company->id)
                                                        <strong>{{'City:'.$company->address_city}}</strong>
                                                        @endif
                                                    @endforeach

                                                    <h4>{{$vihicle->vihicle_price}} VND/ 1 Day(24h)</h4>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>

                                    <div class="row">{{$vihicles->links()}}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Shop Page -->

@endsection

