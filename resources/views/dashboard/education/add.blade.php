@extends('layouts.index')
@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Education</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active">Education Add</li>
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
                            <h3 class="card-title">Add Education</h3>
                            <div class="box-tools float-right">
                                <a href="{{ route('education-list') }}" class="btn btn-success btn-sm btn-flat">Education list</a>
                            </div>
                        </div>
                        <!-- form start -->
                        <form role="form" action="{{ route('education-add') }}" method="post" >
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="exampleInputStudentName">Student Name</label>
                                            <!-- <input type="text" class="form-control" id="exampleInputName" name="name" placeholder="Enter name"> -->
                                            <select  name="student_id" id="exampleInputName" class="form-control" >
                                                @foreach ($students as $student)
                                                    <option value="{{ $student->id }}">{{ $student->name }}</option>
                                                @endforeach
                                            </select>
                                            @if($errors->has('student_id'))
                                                <lable class="error">{{ $errors->first('student_id') }}</lable>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="exampleInputUniversity">University </label>
                                            <input type="text" class="form-control" id="exampleInputUniversity" name="university" placeholder="Enter university">
                                            @if($errors->has('university'))
                                                <lable class="error">{{ $errors->first('university') }}</lable>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="exampleInputCollege">College</label>
                                            <input type="text" class="form-control" id="exampleInputCollege" name="college" placeholder="Enter college">
                                            @if($errors->has('college'))
                                                <lable class="error">{{ $errors->first('college') }}</lable>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="exampleInputBranch">Branch</label>
                                            <input type="text" class="form-control" id="exampleInputBranch" name="branch" placeholder="Enter branch">
                                            @if($errors->has('branch'))
                                                <lable class="error">{{ $errors->first('branch') }}</lable>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="exampleInputSemester">Semester</label>
                                            <select name="semester" id="exampleInputSemester" class="form-control" >
                                                <option selected="selected">Select Semester </option>

                                                @foreach(Config::get('constant.semesters') as $semester)
                                                    <option value="{{  $semester }}">{{  $semester }}</option>
                                                @endforeach

                                            </select>
                                            @if($errors->has('semester'))
                                                <lable class="error">{{ $errors->first('semester') }}</lable>
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





