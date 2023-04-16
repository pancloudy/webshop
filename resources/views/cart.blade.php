@extends('layouts.topbar')
@section('content')
<style>
.container{
        display: grid;
 align-items: center; 
 grid-template-columns: 1fr 1fr 1fr;
 column-gap: 5px;
    }
</style>
<html>
    <?php 
    $osszprice = 0;
    $seged = 0;
    ?>
    
    <table class="table table-bordered table-striped">
        
        
        @foreach ($carts as $cart)
        <?php
        $product = DB::select('SELECT * from products where id=?', [$cart->prod_id]);
        ?>
        @foreach ($product as $products)
        <div class="container">
            <tr>
                <th>Termék neve:</th>
                <td> {{ $products->name ?? false }}</td>
            </tr>
            <tr>
                <th>Darabszám:</th>
                <td>{{ $cart->prod_quantities ?? false}}</td>
            </tr>
            <tr>
             <th><img src="{{ asset('images/' . $products->image) }}" style="height:200px"></th>
            </tr>
            <tr>
                <th>Ár:</th>
                <td>{{ $products->selling_price ?? false}}</td>
            </tr>
                
            <?php 
            if($cart->prod_quantities > 1){
                $seged = $cart->prod_quantities * $products->selling_price;
                $osszprice = $osszprice+$seged;
            }
            else{
                $osszprice = $osszprice+$products->selling_price;
            }
            ?>
            <tr>
            <th>
            <form action="{{ route('cart.delete', $cart->id) }}" method="post">
                @csrf
                @method('DELETE')
                <button class="btn btn-primary" type="submit">Törlés</button>
            </form></th>
            </tr>
        @endforeach
        @endforeach
        <tr>
            <th>Fizetendő összeg: <td>{{ $osszprice }}</td></th>
        </tr>
    </div>
    </table>
    <form action="{{ route('order.new') }}" method="get">
        <input type="hidden" name="price" value="{{ $osszprice }}"></input>
        <button class="btn btn-primary" type="submit">Rendeléshez</button>
    </form>
    </html>
@endsection