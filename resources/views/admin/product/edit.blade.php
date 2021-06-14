@extends('layouts.admin')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Product</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <form action="{{ route('products.update', $product) }}"  method="POST">
            @method('PUT')
            @csrf
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Product Info</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="inputName">Product Name</label>
                                <input type="text" name="name" class="form-control" value="{{ old('name') ?? $product->name}}">
                            </div>
                            <div class="form-group">
                                <label for="inputName">Price</label>
                                <input type="text" name="regular_price" class="form-control" value="{{ old('regular_price') ?? $product->regular_price}}">
                            </div>
                            <div class="form-group">
                                <label for="inputName">Product Image</label>
                                <input type="text" name="product_image" class="form-control" value="{{ old('product_image') ?? $product->product_image}}">

                            </div>
                            <div class="form-group">
                                <label for="inputName">Description</label>
                                <input type="text" name="description" class="form-control" value="{{ old('description') ?? $product->description}}">
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <input type="submit" value="Create new Product" class="btn btn-success float-right">
                </div>
            </div>
        </form>
    </section>
    <!-- /.content -->
@endsection
