@extends('layouts.index')
@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Student</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active">Student Add</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card card-light">
                        <div class="card-header">
                            <h3 class="card-title">Add Student</h3>
                            <div class="box-tools float-right">
                                <a href="{{ route('student-list') }}" class="btn btn-success btn-sm btn-flat">Student list</a>
                            </div>
                        </div>
                        <!-- form start -->
                        <form role="form" action="{{ route('student-add') }}" method="post" >
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="exampleInputname">Name</label>
                                            <input type="text" class="form-control" id="exampleInputName" name="name" placeholder="Enter name">
                                            @if($errors->has('name'))
                                                <lable class="error">{{ $errors->first('name') }}</lable>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Email </label>
                                            <input type="email" class="form-control" id="exampleInputEmail" name="email" placeholder="Enter email">
                                            @if($errors->has('email'))
                                                <lable class="error">{{ $errors->first('email') }}</lable>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="exampleInputMobile">Mobile</label>
                                            <input type="text" class="form-control" id="exampleInputMobile" name="mobile" placeholder="Enter mobile">
                                            @if($errors->has('mobile'))
                                                <lable class="error">{{ $errors->first('mobile') }}</lable>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="exampleInputCity">City</label>
                                            <input type="text" class="form-control" id="exampleInputCity" name="city" placeholder="Enter city">
                                            @if($errors->has('city'))
                                                <lable class="error">{{ $errors->first('city') }}</lable>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="exampleInputAddress">Address</label>
                                            <input type="text" class="form-control" id="exampleInputAddress" name="address" placeholder="Enter address">
                                            @if($errors->has('address'))
                                                <lable class="error">{{ $errors->first('address') }}</lable>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
  </div>
@endsection





