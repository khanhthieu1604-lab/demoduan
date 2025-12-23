@extends('mainview.layouts.master')
@section('content')

<div class="container" style="margin-top: 50px; margin-bottom: 50px;">
    <div class="row">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Checkout</a></li>
                <li class="breadcrumb-item active" aria-current="page">Confirm-information</li>
            </ol>
        </nav>
        
        <div class="col-md-12">
            <h2>Customer Detailt Information</h2>

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

            <form method="POST" enctype="multipart/form-data" action="{{route('sendinfo',['id'=> $id])}}">
            {{-- <form class="col-sm-16" enctype="multipart/form-data" action="{{url('/sendinfo')}}" method="POST"> --}}
                @csrf
                <div class="form-group">
                    <label for="exampleFormControlInput1">Address</label> <span style="color: red">*</span>
                    <input type="text" class="form-control" name="address" placeholder="your address" value="{{old('address')}}">
                </div>

                <div class="form-group">
                    <label for="exampleFormControlInput1">Phone number</label> <span style="color: red">*</span>
                    <input type="number" class="form-control" name="phone_number" placeholder="your phone number" value="{{old('phone_number')}}">
                </div>

                <div class="form-group">
                    <label for="exampleFormControlInput1">Driver license</label> <span style="color: red">*</span>
                    <input type="text" class="form-control" name="driver_license" placeholder="your driver license" value="{{old('driver_license')}}">
                </div>

                <div class="form-group">
                    <label for="exampleFormControlInput1">Id Card</label> <span style="color: red">*</span>
                    <input type="text" class="form-control" name="id_card" placeholder="your id card" value="{{old('id_card')}}">
                </div>

                <div class="form-group">
                    <label for="exampleFormControlInput1">Passport</label> <span style="color: red">*</span>
                    <input type="text" class="form-control" name="passport" placeholder="your passport" value="{{old('passport')}}">
                </div>

                {{-- <div class="form-group">
                    <label for="exampleFormControlFile1">Images</label>
                    <input type="file" class="form-form-file" name="images">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlFile1">ID Image (Front)</label>
                    <input type="file" class="form-form-file" name="id_image_f">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlFile1">ID Image (Behind)</label>
                    <input type="file" class="form-form-file" name="id_image_b">
                </div> --}}

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

                <button type="submit" class="btn btn-primary">Send</button>
            </form>
        </div>
    </div>
</div>

@endsection