@extends('layouts.page')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <nav class="navbar navbar-inverse">
                                    <div class="navbar-header">
                                        <!-- will be used to show any messages -->
                                        @if (Session::has('message'))
                                            <div class="alert alert-info">{{ Session::get('message') }}</div>
                                        @endif
                                    </div>
                                    <ul class="nav navbar-nav">
                                            <a class="btn btn-small btn-success" href="{{ URL::to('employees/create') }}">Add employee</a>
                                    </ul>
                                </nav>

                                <h1>All the employees</h1>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Email</th>
                                        <th>Company</th>
                                        <th>Phone</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($employees as $key => $value)
                                        <tr>
                                            <td>{{ $value->id }}</td>
                                            <td>{{ $value->first_name }}</td>
                                            <td>{{ $value->last_name }}</td>
                                            <td>{{ $value->email }}</td>
                                            <td>{{ $value->company->name }}</td>

                                            <td>{{ $value->phone }}</td>

                                            <!-- we will also add show, edit, and delete buttons -->
                                            <td>

                                                <!-- delete the employee (uses the destroy method DESTROY /employees/{id} -->
                                                <!-- we will add this later since its a little more complicated than the other two buttons -->

                                                <!-- show the employee (uses the show method found at GET /employees/{id} -->
{{--                                                <a class="btn btn-small btn-danger" href="{{ url('employees/' . $value->id) }}">Delete employee</a>--}}
{{--                                            {{ Form::open(array('url' => 'employees/' . $value->id, 'class' => 'pull-right')) }}--}}
{{--                                            {{ Form::hidden('_method', 'DELETE') }}--}}
{{--                                            {{ Form::submit('Delete this employee', array('class' => 'btn btn-warning')) }}--}}
{{--                                            {{ Form::close() }}--}}


                                            <!-- edit this employee (uses the edit method found at GET /employees/{id}/edit -->
                                                <a class="btn btn-small btn-info" href="{{ URL::to('employees/' . $value->id . '/edit') }}">Edit this employee</a>

                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>

                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <script>
        $(function () {
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
@endsection



