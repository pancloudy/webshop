@extends('layouts.topbar')
@section('content')

<style>
    .card:hover {
      box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
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
    </style>
    
      <div class="container">
    @foreach ($product as $products )
    <?php 
    $slug = DB::table('categories')->where('id', $products->category_id)->value('slug');
    ?>
  <form action="{{ route('products.details', ['slug' => $slug, 'image' => $products->image]) }}" method="post" enctype="multipart/form-data">
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
        </ul>
        <div class="card-body">
          <button class="btn btn-primary" type="submit">Megtekintés</button>
        </div>
      </div>
  </form>
    @endforeach
  </div>
    

@endsection