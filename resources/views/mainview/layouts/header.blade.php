    <!-- Start Main Top -->
    <div class="main-top">
        <div class="container-fluid">
            <div class="row">

                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="left-home">
                        <ul>
                            <li><a href="{{url('/to-ren')}}"><i class="fa fa-home"></i> Home</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="right-phone-box">
                        <p>Call US :<a href="#"> +84 077 349 6873</a></p>
                    </div>

                    <div class="our-link">
                        <ul>
                            {{-- <li><a href="#"><i class="fa fa-map"></i> Location</a></li> --}}
                            @if(empty(Auth::check()))
                            <li><a href="{{ route('login') }}"><i class="fa fa-lock"></i> Login</a></li>
                            @else
                            <li><a href="{{url('/user-info')}}"><i class="fa fa-user"></i> Profile</a></li>
                            <li><a href="{{route('logout')}}"><i class="fa fa-lock"></i> Logout</a></li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Main Top -->