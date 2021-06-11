@extends('layouts.admin')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Products</h1>
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
                                    <th>Product ID</th>
                                    <th>Product Name</th>
                                    <th> Price</th>
                                    <th>Description</th>
                                    <th>Created At</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($product as $product)
                                    <tr>
                                        <td>{{ $product->id }}</td>
                                        <td>{{$product->name}}</td>
                                        <td>{{ $product->price}}</td>
                                        <td>{{$product->product_image}}</td>
                                        <td>{{$product->description}}</span></td>
                                        <td class="text-right">

                                            <a class="btn btn-primary btn-sm mr-3" href="#">
                                                <i class="fas fa-folder">
                                                </i>
                                                View
                                            </a>
                                            <a class="btn btn-info btn-sm" href="{{ route('products.edit', $product) }}">
                                                <i class="fas fa-pencil-alt">
                                                </i>
                                                Edit
                                            </a>
                                            <a class="btn btn-danger btn-sm"
                                               href="{{ route('products.destroy', $product) }}">
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
