@extends('layouts.app')

@section('content')

            
            <html>
    
    <table class="table table-bordered table-striped">
        
        @foreach ($product as $products)
        <thead>
            
            <tr>
                <th>Name:  <td>{{ $products->name ?? false}}</td></th>
            </tr>
            <tr>
                <th>Small Description <td>{{ $products->small_description ?? false}}</td></th>
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
            
            <img src="{{ asset('images/' . $products->image) }}" height="500" width="500" class="img img-responsive" />
                <form method="post">
                    <input type="number" name="quant" value="1" max="{{ $products->quantity }}"></input>
                    <input type="hidden" name="id" value="{{ $products->id }}"></input>
                    <button type="submit"  name="add">Kosárba</button>
                    @csrf
                </form>
                
            
                
                <?php
                function cookie_btn(){
                    
                    echo ("Product added");
                    if (!isset ($product_details[0] ) ) {
                        
                      setcookie ("product_details[0]", $_POST['id']);
                    }else{
                        echo "Product already in cart";
                    }
                    setcookie("product_details[1]", $_POST['quant']);
                 }
            
            if(isset($_POST['add'])){
                
                cookie_btn();
            }
            ?>
        @endforeach
        </thead>
        <tbody>
            
        </tbody>
    </table>
    </html>
@endsection