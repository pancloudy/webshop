@extends('layouts.topbar')
@section('content')

<style>
    .card {
        box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
        float: left;
      text-align: center;
      transition: 0.3s;
      margin-right: 1rem;
  margin-bottom: 1rem;
      width:  22%;
    height: auto;
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
    @foreach ($product as $products )
    <?php 
    $slug = DB::table('categories')->where('id', $products->category_id)->value('slug');
    ?>
  <form action="{{ route('products.details', ['slug' => $slug, 'image' => $products->image]) }}" method="post" enctype="multipart/form-data">
      @csrf
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
  </form>
    @endforeach
    </body>

@endsection
