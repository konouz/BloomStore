@extends('layouts.admin')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>brands</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <table class="dataTable table table-bordered table-striped table-hover">
                                <thead>
                                <tr>
                                    <th>brand ID</th>
                                    <th>brand Name</th>
                                    <th> Price</th>
                                    <th>Description</th>
                                    <th>Created At</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($brand as $brand)
                                    <tr>
                                        <td>{{ $brand->id }}</td>
                                        <td>{{$brand->name}}</td>
                                        <td>{{ $brand->price}}</td>
                                        <td>{{$brand->brand_image}}</td>
                                        <td>{{$brand->description}}</span></td>
                                        <td class="text-right">

                                            <a class="btn btn-primary btn-sm mr-3" href="#">
                                                <i class="fas fa-folder">
                                                </i>
                                                View
                                            </a>
                                            <a class="btn btn-info btn-sm" href="{{ route('brands.edit', $brand) }}">
                                                <i class="fas fa-pencil-alt">
                                                </i>
                                                Edit
                                            </a>
                                            <a class="btn btn-danger btn-sm"
                                               href="{{ route('brands.destroy', $brand) }}">
                                                <i class="fas fa-trash">
                                                </i>
                                                Delete
                                            </a>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        window.onload = () => {
            $('.dataTable').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        }
    </script>
@endsection
