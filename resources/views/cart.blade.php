@extends('layouts.topbar')
@section('content')
<style>

</style>

    <?php 
    $osszprice = 0;
    $seged = 0;
    ?>
    
    <div class="container">
        <table class="table">
          <thead>
            <tr>
              <th> </th>
              <th>Termék</th>
              <th>Ár</th>
              <th>Mennyiség</th>
              <th>Összeg</th>
              <th> </th>
            </tr>
          </thead>
          <tbody>
            @foreach ($carts as $cart)
        <?php
        $product = DB::select('SELECT * from products where id=?', [$cart->prod_id]);
        ?>
        @foreach ($product as $products)
            <tr>
                <td><img src="{{ asset('images/' . $products->image) }}" style="height:200px"></td>
              <td>{{ $products->name }}</td>
              <td>{{ $products->selling_price }} ft</td>
              <td>{{ $cart->prod_quantities }}</td>
              <?php 
            if($cart->prod_quantities > 1){
                $seged = $cart->prod_quantities * $products->selling_price;
                $osszprice = $osszprice+$seged;
            }
            else{
                $seged = $products->selling_price;
                $osszprice = $osszprice+$products->selling_price;
            }
            ?>
              <td>{{ $seged }} ft</td>
              <td><form action="{{ route('cart.delete', $cart->id) }}" method="post">
                @csrf
                @method('DELETE')
                <button class="btn btn-primary" type="submit">Törlés</button>
            </form></td>
            </tr>
            @endforeach
            @endforeach
            <tr>
              <td colspan="4" class="text-end"><strong>Teljes összeg:</strong></td>
              <td><strong>{{ $osszprice }} ft</strong></td>
            </tr>
            
          </tbody>
        </table>
        <div class="d-flex justify-content-end">
            <form action="{{ route('order.new') }}" method="get">
                <input type="hidden" name="price" value="{{ $osszprice }}"></input>
                <button class="btn btn-primary" type="submit">Rendeléshez</button>
            </form>
        </div>
      </div>
    
@endsection