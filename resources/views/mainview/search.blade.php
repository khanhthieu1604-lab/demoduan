@extends('mainview.layouts.master')
@section('content')

    <!-- Start Top Search -->
    <div class="container">
        <div class="input-group">
            <form role="search" method="GET" id="searchForm" action="{{route('search')}}">
                <input type="text" value="" name="key" id="s" placeholder="Enter Keyword" />
                <button class="fa fa-search" type="submit" id="searchsubmit"></button>
            </form>
            <button href="{{url('/to-ren')}}"><< Back</button>
        </div>
        <h1>Founded: {{count($vihicles)}} vihicles</h1>
    </div>
    <!-- End Top Search -->
    
    <!-- Start Shop Page  -->
    <div class="shop-box-inner">
        <div class="container">
            <div class="row">
                <div class="col-md-12 shop-content-right">
                    <div class="right-product-box">
                        <div class="row product-categorie-box">
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane fade show active" id="grid-view">
                                    <div class="row">
                                        @foreach($vihicles as $vihicle)
                                        <div class="col-md-3">
                                            <div class="products-single fix">

                                                <div class="box-img-hover">
                                                    {{-- @php $images = json_decode(json_encode($vihicle->images), true); @endphp
                                                    @if(is_array($images) && !empty($images))
                                                        <img src="{{$images[0]}}" class="img-fluid" alt="Image not available" style="width:300px; height: 160px">
                                                    @endif --}}

                                                    @php $images = json_decode(json_encode($vihicle->images), true); @endphp

                                                    @if(is_array($images) && !empty($images))
                                                        <img src="{{$images[0]}}" class="img-fluid" alt="Image not available" style="width:300px; height: 160px">
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

                                                <div class="why-text">
                                                    <h4>{{$vihicle->vihicle_name}}</h4>

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
