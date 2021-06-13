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
        <form action="{{ route('categories.update', $category) }}"  method="POST">
            @method('PUT')
            @csrf
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Category Info</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="inputName">category Name</label>
                                <input type="text" name="name" class="form-control" value="{{ old('name') ?? $category->name}}">
                            </div>

                           <div class="form-group">
                                <label for="inputName">icon</label>
                                <input type="text" name="icon" class="form-control" value="{{ old('icon') ?? $category->icon}}">

                            </div>
                            <div class="form-group">
                                <label for="inputName">Parent ID</label>
                                <input type="text" name="parent_id" class="form-control" value="{{ old('parent_id') ?? $category->parent_id}}">
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <input type="submit" value="Create new Category" class="btn btn-success float-right">
                </div>
            </div>
        </form>
    </section>
    <!-- /.content -->
@endsection
