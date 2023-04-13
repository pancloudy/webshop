
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
    .card {
        box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
        float: left;
      text-align: center;
      transition: 0.3s;
      margin-right: 1rem;
  margin-bottom: 1rem;
      
    object-fit: cover;
    }
    .card:after{
        padding: 10px;
    }
    .card:hover {
      box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
    }
    
    .container {
      padding: 3px;
      max-height: 500px;
      float:left;
    }
    .pricegreen{
color:greenyellow;
 }
 .pricered{
color: red;
text-decoration: line-through;
 }
</style>
<body>
<div class="jumbotron">
    <h1>Köszöntjük az oldalunkon!</h1>
  </div>

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                <?php
                $product = DB::select('SELECT * from products'); 
                ?>
                @foreach ($product as $products )
                <?php 
                $slug = DB::table('categories')->where('id', $products->category_id)->value('slug');
                ?>
              <form action="{{ route('products.details', ['slug' => $slug, 'image' => $products->image]) }}" method="post" enctype="multipart/form-data">
                  @csrf
                  <div class="col-md-8">
                <div class="card">
                    <img src="{{ asset('images/' . $products->image) }}" style="height:200px"  />
                  <div class="container">
                    <h4><b>{{ $products->name }}</b></h4> 
                    <p>@if ($products->original_price != $products->selling_price)
                        <div class="pricegreen">
                            <h4>{{ $products->selling_price}}</h4>
                        </div>
                        <div class="pricered"> <h4> {{ $products->original_price }} </h4></div>
                    @else
                    <h4>{{ $products->selling_price }}</h4>
                    @endif</p> 
                    <button class="btn btn-primary" type="submit">Megtekintés</button>
                  </div>
                </div>
                </div>
              </form>
                @endforeach

</body>
</html>
@endsection
