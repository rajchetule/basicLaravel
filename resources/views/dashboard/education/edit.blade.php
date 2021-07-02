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
                            <h3 class="card-title">Edit Education</h3>
                            <div class="box-tools float-right">
                                <a href="{{ route('education-list') }}" class="btn btn-success btn-sm btn-flat">Education list</a>
                            </div>
                        </div>
                        <!-- form start -->
                        <form role="form" action="{{ route('education-edit', ['id' => $education->id]) }}" method="post" >
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="exampleInputStudentName">Student Name</label>
                                            <!-- <input type="text" class="form-control" id="exampleInputName" name="student_id" value="{{ $education->name }}" placeholder="Enter name"> -->
                                            <select  name="student_id" id="exampleInputName" class="form-control" >
                                                @foreach ($students as $student)
                                                    <option value="{{ $student->id }}">{{ $student->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">University </label>
                                            <input type="text" class="form-control" id="exampleInputUniversity" name="university" value="{{ $education->university }}" placeholder="Enter University">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">College</label>
                                            <input type="text" class="form-control" id="exampleInputCollege" name="college" value="{{ $education->college }}" placeholder="Enter College">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Branch</label>
                                            <input type="text" class="form-control" id="exampleInputBranch" name="branch" value="{{ $education->branch }}" placeholder="Enter Branch">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Semester</label>
                                            <input type="text" class="form-control" id="exampleInputSemester" name="semester" value="{{ $education->semester }}" placeholder="Enter Semester">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
  </div>
@endsection





