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
    @foreach ($category as $categories )
  <form action="{{ route('categories-products-list') }}" method="get" enctype="multipart/form-data">
      @csrf
      <input type="hidden" name="id" value="{{ $categories->id }}">
      <div class="card" style="width: 18rem;">
        <img src="{{ asset('images/' . $categories->image) }}" class="card-img-top">
        <div class="card-body">
          <h5 class="card-title">{{ $categories->name }}</h5>
          <p class="card-text">{{ $categories->description }}</p>
        </div>
        <ul class="list-group list-group-flush">
            
        </ul>
        <div class="card-body">
          <button class="btn btn-primary" type="submit">Megtekintés</button>
        </div>
      </div>
  </form>
    @endforeach
  </div>
    

@endsection
