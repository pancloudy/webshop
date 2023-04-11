@extends('layouts.topbar')
@section('content')

<style>
    img{
      float: right;  
    }
    .container{
        display: grid;
 align-items: center; 
 grid-template-columns: 1fr 1fr 1fr;
 column-gap: 5px;
    }
    .after{
        padding-left: 20px;
    }
</style>

    @foreach ($product as $products)
    
                
    <div class="container">
        
    <table class="table table-bordered table-striped">  

            <tr>
                <th>Név:  <td>{{ $products->name ?? false}}</td></th>
            </tr>
            <tr>
                <th>Rövid leírás <td>{{ $products->small_description ?? false}}</td></th>
            </tr>
            <tr>
                <th>Description <td>{{ $products->description ?? false}}</td></th>
            </tr>
            <tr>
                <th>Selling Price <td>{{ $products->selling_price ?? false}}</td></th>
            </tr>
            <tr>
                <th>Original Price <td>{{ $products->original_price ?? false}}</td></th>
            </tr>
            <tr>
                <th>Quantity <td>{{ $products->quantity ?? false}}</td></th>
            </tr>
            <tr>
                <th>Status: <td>{{ $products->status ?? false}}</td></th>
            </tr>    
    
    </table>
    <div class="after">
    <img src="{{ asset('images/' . $products->image) }}" height="100%" width="100%" />
</div>
            <br>
            <form action="{{ action('App\Http\Controllers\Admin\CartController@add') }}" method="post" enctype="multipart/form-data" >
                <br>
                <input type="number" style="width:5em" name="prod_quant" value="1"></input>
                <br>
                <input type="hidden" name="prod_id" value="{{ $products->id }}"></input>
                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}"></input>
                    <button type="submit" class="btn btn-primary" name="add">Kosárba</button>
                @csrf
            </form>
        
</div>
    @endforeach
@endsection