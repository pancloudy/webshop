@extends('layouts.topbar')
@section('content')

<style>
.container{
    display: flex;
    justify-content: center;
}
.row{
    align-content: center;
}
.img{
  
}
</style>

    @foreach ($product as $products)
    <div class="container">
        
          <div class="col-md-4">
            <img src="{{ asset('images/' . $products->image) }}" height="auto" width="400" />
          </div>
          <div class="col-md-4">
            <h2>{{ $products->name }}</h2>
            <p class="lead">{{ $products->small_description }}</p>
            <h5>Ár: @if ($products->original_price > $products->selling_price)
                    <p style="text-decoration: line-through;">{{ $products->original_price }} ft</p>{{ $products->selling_price }}
                @else
                    {{ $products->selling_price }}
                @endif
                 ft</h5>
            <div class="d-flex justify-content-between align-items-center mb-3">
                <form action="{{ action('App\Http\Controllers\Admin\CartController@add') }}" method="post" enctype="multipart/form-data">
                    @csrf
              <div class="input-group">
                <label class="input-group-text" for="quantity">Mennyiség</label>
                <input type="number"  name="prod_quant" class="form-control" value="1" min="1" max="10">
                <input type="hidden" name="prod_id" value="{{ $products->id }}"></input>
                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}"></input>
              </div>
              <button type="submit" class="btn btn-primary">Kosárba</button>
            </form>
            </div>
            <p><strong>{{ $products->description }}</strong></p>
          </div>
        
      </div>
    @endforeach
@endsection