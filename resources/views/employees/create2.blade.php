@extends('layouts.page')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                @if (Session::has('message'))
                    <div class="alert alert-info">{{ Session::get('message') }}</div>
                @endif

                    @foreach ($errors->all() as $error)
                        <p class="alert alert-danger">{{ $error }}</p>
                    @endforeach
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-12">
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Add a Employee</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form action="{{url('employees')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">First Name </label>
                                        <input type="text" name="first_name" class="form-control" id="exampleInputEmail1" placeholder="Enter  first Name" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Last Name </label>
                                        <input type="text" name="last_name" class="form-control" id="exampleInputEmail1" placeholder="Enter last Name" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleSelectBorder">Company</label>
                                        <select name="company" class="custom-select " id="exampleSelectBorder" required>
                                            <option>Choose company</option>
                                            @foreach($companies as $company)
                                                <option value="{{$company->id}}">{{$company->name}}</option>
                                            @endforeach

                                        </select>
                                    </div>                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Email </label>
                                        <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Phone</label>
                                        <input type="text" name="phone" class="form-control" id="exampleInputPassword1" placeholder="Enter phone ">
                                    </div>

                                    <div class="form-check">
{{--                                        <input type="checkbox" class="form-check-input" id="exampleCheck1">--}}
{{--                                        <label class="form-check-label" for="exampleCheck1">Check me out</label>--}}
                                    </div>
                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                        <!-- /.card -->

                    </div>
                    <!--/.col (left) -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

@endsection



