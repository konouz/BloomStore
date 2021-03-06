@extends('layouts.admin')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Add brand</h1>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <form action="{{ route('brands.store') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">brand Info</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="inputName">brand Name</label>
                            <input type="text" name="name" class="form-control">
                        </div>

                        {{-- <div class="form-group">
                                <label for="inputName">brand Image</label>
                                <input type="text" name="brand_image" class="form-control">

                            </div> --}}

                    </div>

                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <input type="submit" value="Create new brand" class="btn btn-success float-right">
            </div>
        </div>
    </form>
</section>
<!-- /.content -->
@endsection
