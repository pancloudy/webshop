@extends('layouts.app')

@section('content')
<html>
    <?php 
    $osszprice = 0;
    ?>

    <table class="table table-bordered table-striped">
        @foreach ($carts as $cart)
        <?php
        $product = DB::select('SELECT * from products where id=?', [$cart->prod_id]);
        ?>
        @foreach ($product as $products)
        <thead>
            <tr>
                <th>prod name: <td> {{ $products->name ?? false }}</td></th>
            </tr>
            <tr>
                <th>Quantities:  <td>{{ $cart->prod_quantities ?? false}}</td></th>
            </tr>
            <tr> <th>
                <img src="{{ asset('images/' . $products->image) }}" style="height:200px"  /></th>
            </tr>
            <tr>
                <th>Ár:  <td>{{ $products->selling_price ?? false}}</td></th>
            </tr>
            <?php 
            $osszprice = $osszprice+$products->selling_price;
            ?>
            
        @endforeach
        @endforeach
        <tr>
            <th>Fizetendő összeg: <td>{{ $osszprice }}</td></th>
        </tr>
        </thead>
        <tbody>
            
        </tbody>
    </table>
    </html>
@endsection