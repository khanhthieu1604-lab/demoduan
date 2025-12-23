{{-- @extends('mainview.layouts.master')


@section('content')

    <!-- Start Slider -->
    <div id="slides-shop" class="cover-slides">
        <ul class="slides-container">
            <li class="text-left">
                <img src="images/banner-01.jpg" alt="">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="m-b-20"><strong>Welcome To <br> CARRENTAL</strong></h1>
                            <p class="m-b-40">You are having trouble finding a rental vehicle <br> THECARRENTAL will solve it for you.</p>
                            <p><a class="btn hvr-hover" href="#">Liện hệ ngay</a></p>
                        </div>
                    </div>
                </div>
            </li>
            <li class="text-center">
                <img src="images/banner-02.jpg" alt="">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="m-b-20"><strong>Welcome To <br> CARRENTAL</strong></h1>
                            <p class="m-b-40">You are having trouble connecting with car rental customers <br> THECARRENTAL will provide the solution for you.</p>
                            <p><a class="btn hvr-hover" href="#">Liện hệ ngay</a></p>
                        </div>
                    </div>
                </div>
            </li>
            <li class="text-right">
                <img src="images/banner-03.jpg" alt="">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="m-b-20"><strong>Welcome To <br> CARRENTAL</strong></h1>
                            <p class="m-b-40">Optimal technology solutions for car rental <br> What are you waiting for ? Come on with THE CARRENTAL.</p>
                            <p><a class="btn hvr-hover" href="#">Liện hệ ngay</a></p>
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

    <!-- Start Shop Page  -->
    <h1>Founded: {{count($vihicles)}} vihicles</h1>
    <div class="shop-box-inner">
        <div class="container">
            <div class="row">
                <div class="col-xl-9 col-lg-9 col-sm-12 col-xs-12 shop-content-right">
                    <div class="right-product-box">

                        <div class="row product-categorie-box">
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane fade show active" id="grid-view">
                                    <div class="row">
                                        @foreach($vihicles as $vihicle)
                                        <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4">
                                            <div class="products-single fix">
                                                {{$vihicle->address_district.' - '.$vihicle->address_city}}
                                                <div class="box-img-hover">
                                                    @php $images = json_decode($vihicle->images, true); @endphp
                                                    @if(is_array($images) && !empty($images))
                                                        <img src="{{$images[0]}}" class="img-fluid" alt="Image not available">
                                                    @endif
                                                    <div class="mask-icon">
                                                        <a class="cart" href="{{url('/vihicles/'.$vihicle->id)}}">Thuê Ngay</a>
                                                    </div>
                                                </div>
                                                <div class="why-text">
                                                    <h4>{{$vihicle->vihicle_name}}</h4>
                                                    @foreach($services as $service)
                                                        @if($vihicle->service_id == $service->id)
                                                            <h4>{{$service->time}}</h4>
                                                            <h4>{{number_format($service->price)}}</h4>
                                                        @endif
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                   
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
 --}}
