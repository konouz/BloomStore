<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="row">

            <div class="col-md-6 offset-md-2">
                <form action="/products" method="POST">
                    @csrf
                    <input type="text" name="searsh" id="searsh" class="form-control">
                    <button type="submit" class="btn btn-primary mt-2"> Search</button>
                </form>
            </div>
							</div>
						</div>
</div>


  <section class="section">
    <div class="container">
 @if (session('status'))
 <div class='alert'>{{session('status')}}</div>

 @endif

      <div class="columns is-multiline">
        @foreach ($product as $product)
        <div class="column is-4">
            <div class="card" style="height: 100%;">
              <div class="card-image">
                <figure class="image is-4by3">
                  <img src="{{ $product->product_image }}" alt="Placeholder image">
                </figure>
              </div>
              <div class="card-content">
                <div class="media">
                  <div class="media-left">
                    <figure class="image is-48x48">
                      <img src="https://bulma.io/images/placeholders/96x96.png" alt="Placeholder image">
                    </figure>
                  </div>
                  <div class="media-content">
                    <p class="title is-4">{{ $product->name }}</p>

                  </div>
                </div>
                <div class="content">
                  {{-- {{ $product->description }} --}}
                  {{ Str::limit(strip_tags($product->description), 80) }} ...
                  {{ $product->price }}
                  {{ $product->reviews }}



                  <time datetime="2016-1-1">{{ $product->created_at }}</time>
                </div>
              </div>
            </div>
          </a>
        </div>
        @endforeach

</body>
</html>
