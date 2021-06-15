@extends('layouts.admin')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Add Product</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <form action="{{ route('products.store') }}" method="POST">
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
                                <input type="text" name="name" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="inputName">Price</label>
                                <input type="text" name="price" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="inputName">Product Image</label>
                                <input type="text" name="product_image" class="form-control">

                            </div>
                            <div class="form-group">
                                <label for="inputName">Description</label>
                                <input type="text" name="description" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="inputName">Category</label>

                                <div class="control">
                                  <div class="select @error('category_id')text-danger @enderror">
                                    <select name="category_id" id="categoryList" value="{{ old('category_id') }}">
                                      @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                  </div>
                                  <label>Subcategory</label>
                                  <select id="subcategoryList" class="form-control" name="subcategory_id" required>
                                      @foreach ($categories as $parent)
                                        @foreach ($parent->children as $child)
                                            <option value="{{ $child->id }}" class='parent-{{ $parent->id }} subcategory'>{{ $child->name }}</option>
                                        @endforeach
                                      @endforeach
                                  </select>
                                </div>
                                @error('category_id')
                                  <p class="help text-danger">{{ $message }}</p>
                                @enderror
                              </div>

                              {{-- <div class="field">
                                <label class="label">Tags</label>

                                <div class="control">
                                  <div class="select is-multiple @error('tags')is-danger @enderror">
                                    <select name="tags[]" value="{{ old('tags') }}" multiple>
                                      @foreach ($tags as $tag)
                                        <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                                      @endforeach
                                    </select>
                                  </div>
                                </div>
                                @error('tags')
                                  <p class="help is-danger">{{ $message }}</p>
                                @enderror
                              </div>
         --}}
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

@push('scripts')
<script>
    $('#categoryList').on('change', function () {
        $("#subcategoryList").attr('disabled', false); //enable subcategory select
        $("#subcategoryList").val("");
        $(".subcategory").attr('disabled', true); //disable all category option
        $(".subcategory").hide(); //hide all subcategory option
        $(".parent-" + $(this).val()).attr('disabled', false); //enable subcategory of selected category/parent
        $(".parent-" + $(this).val()).show();
    });
</script>
@endpush
