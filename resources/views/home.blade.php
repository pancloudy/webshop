
@extends('layouts.topbar')


@section('content')
<html>
<style>
.jumbotron {
      background-image: url("https://images.pexels.com/photos/65718/pexels-photo-65718.jpeg");
      background-size: cover;
      height: 600px;
      color: #fff;
      text-align: center;
      display: flex;
      flex-direction: column;
      justify-content: center;
    }
    .jumbotron h1 {
      font-size: 60px;
      font-weight: bold;
      margin-bottom: 0;
      text-shadow:
        0.02em 0 black,
        0 0.02em black,
        -0.02em 0 black,
        0 -0.02em black;
      color:#308a44;
    }
    .container{
      display: flex;
      flex-wrap: wrap;
      width: 1500px;
      justify-content: center;
      margin: auto;
    }
    .card{
      flex: 1 0 300px;
      margin: 5px;
      text-align: center;
      min-height: 50px;
    }
    .card:hover {
      box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
    }
    
</style>
<body>
<div class="jumbotron">
    <h1>Köszöntjük az oldalunkon!</h1>
  </div>
                <?php
                $product = DB::select('SELECT * from products WHERE status=1'); 
                ?>
              @if($product)
              <div class="container">
                @foreach ($product as $products )
                  <?php 
                  $slug = DB::table('categories')->where('id', $products->category_id)->value('slug');
                  $exp = strtok($products->image, '.');
                  ?>
                  <form action="{{ route('products.details', ['slug' => $slug, 'image' => $exp]) }}" method="post" enctype="multipart/form-data">
                    @csrf
                  <div class="card" style="width: 18rem;">
                    <img src="{{ asset('images/' . $products->image) }}" class="card-img-top">
                    <div class="card-body">
                      <h5 class="card-title">{{ $products->name }}</h5>
                      <p class="card-text">{{ $products->small_description }}</p>
                    </div>
                    <ul class="list-group list-group-flush">
                        @if ($products->original_price > $products->selling_price)
                          <li class="list-group-item" style="text-decoration: line-through;">{{ $products->original_price }} ft</li>
                          <li class="list-group-item">{{ $products->selling_price }} ft</li>
                        @else
                          <li class="list-group-item">{{ $products->selling_price }} ft</li>
                        @endif
                        @if($products->status == 0)
                          <li class="list-group-item">Elfogyott</li>
                        @endif
                    </ul>
                    <div class="card-body">
                      <button class="btn btn-primary" type="submit">Megtekintés</button>
                    </div>
                  </div>
                </form>
              @endforeach
            </div>
            @else
              <h5>Nincs megjeleníthető termék.</h5>
            @endif
</body>
</html>
@endsection
