@extends('layouts.topbar')
@section('content')
<style>

</style>
<html>
    <?php 
    $osszprice = 0;
    $seged = 0;
    ?>
    
    <table class="table table-bordered table-striped">
        <div class="col-md-2">
        @foreach ($carts as $cart)
        <?php
        $product = DB::select('SELECT * from products where id=?', [$cart->prod_id]);
        ?>
        @foreach ($product as $products)
        
                <th>Termék neve:</th>

                <td> {{ $products->name ?? false }}</td>
            
        
            
                <th>Darabszám:  <td>{{ $cart->prod_quantities ?? false}}</td></th>
           
             <th>
                <img src="{{ asset('images/' . $products->image) }}" style="height:200px"  /></th>
            
            
                <th>Ár:  <td>{{ $products->selling_price ?? false}}</td></th>
            
            <?php 
            if($cart->prod_quantities > 1){
                $seged = $cart->prod_quantities * $products->selling_price;
                $osszprice = $osszprice+$seged;
            }
            else{
                $osszprice = $osszprice+$products->selling_price;
            
            }
            ?>
            <th>
            <form action="{{ route('cart.delete', $cart->id) }}" method="post">
                @csrf
                @method('DELETE')
                <button class="btn btn-primary" type="submit">Törlés</button>
            </form></th>
            <tr></tr>
        @endforeach
        @endforeach
        <tr>
            <th>Fizetendő összeg: <td>{{ $osszprice }}</td></th>
        </tr>
       
    

    </table>
    </div
    <form action="{{ route('order.new') }}" method="get">
        <input type="hidden" name="price" value="{{ $osszprice }}"></input>
        <button class="btn btn-primary" type="submit">Rendeléshez</button>
    </form>
    </html>
@endsection