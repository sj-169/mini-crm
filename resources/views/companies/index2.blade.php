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
                                            <a class="btn btn-small btn-success" href="{{ URL::to('companies/create') }}">Add company</a>
                                    </ul>
                                </nav>

                                <h1>All the companies</h1>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Logo</th>
                                        <th>Website</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($companies as $key => $value)
                                        <tr>
                                            <td>{{ $value->id }}</td>
                                            <td>{{ $value->name }}</td>
                                            <td>{{ $value->email }}</td>
                                            <td> <div class="image">
                                                    <img src="{{ asset('/storage/'.$value->logo) }}" width="100" class="img-circle elevation-2" alt="User Image">
                                                </div>
                                                </td>
                                            <td>{{ $value->website }}</td>

                                            <!-- we will also add show, edit, and delete buttons -->
                                            <td>

                                                <!-- delete the company (uses the destroy method DESTROY /companies/{id} -->
                                                <!-- we will add this later since its a little more complicated than the other two buttons -->

                                                <!-- show the company (uses the show method found at GET /companies/{id} -->
{{--                                                <a class="btn btn-small btn-danger" href="{{ url('companies/' . $value->id) }}">Delete company</a>--}}
{{--                                            {{ Form::open(array('url' => 'companies/' . $value->id, 'class' => 'pull-right')) }}--}}
{{--                                            {{ Form::hidden('_method', 'DELETE') }}--}}
{{--                                            {{ Form::submit('Delete this Company', array('class' => 'btn btn-warning')) }}--}}
{{--                                            {{ Form::close() }}--}}


                                            <!-- edit this company (uses the edit method found at GET /companies/{id}/edit -->
                                                <a class="btn btn-small btn-info" href="{{ URL::to('companies/' . $value->id . '/edit') }}">Edit this company</a>

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


