@extends('layouts.app')

@section('content')
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
        <thead>
            <tr>
                <th><td> {{ $products->name ?? false }}</td></th>
            </tr>
            <tr>
                <th>Darabszám:  <td>{{ $cart->prod_quantities ?? false}}</td></th>
            </tr>
            <tr> <th>
                <img src="{{ asset('images/' . $products->image) }}" style="height:200px"  /></th>
            </tr>
            <tr>
                <th>Ár:  <td>{{ $products->selling_price ?? false}}</td></th>
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
            <tr><th>
            <form action="{{ route('cart.delete', $cart->id) }}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit">Delete</button>
            </form></th></tr>
        @endforeach
        @endforeach
        <tr>
            <th>Fizetendő összeg: <td>{{ $osszprice }}</td></th>
        </tr>
        </thead>
        <tbody>
            
        </tbody>
    </table>
    
    <form action="{{ route('order.new') }}" method="get">
        <input type="hidden" name="price" value="{{ $osszprice }}"></input>
        <button type="submit">Submit</button>
    </form>
    </html>
@endsection