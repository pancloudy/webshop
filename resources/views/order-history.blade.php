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
        <?php 
        $order = DB::select('SELECT * FROM orders WHERE user_id=?', [$uid]);
        ?>
    @if($order != NULL)
    @foreach ($order as $orders )
      <div class="card" style="width: 18rem;">
        <div class="card-body">
          <h5 class="card-title">Rendelés szám: {{ $orders->id }}</h5>
          <p class="card-text">
            <?php
            $cart = DB::select('SELECT * FROM cart where order_id=?', [$orders->id]);
            ?>
            @foreach ($cart as $carts )
              <?php
                $prod = DB::table('products')->where('id', $carts->prod_id)->value('name');
              ?>
              @if ($carts->prod_quantities > 1)
                @for ($i = 0; $i < $carts->prod_quantities; $i++)
                  <br>{{ $prod }}
                @endfor
              @else
              <br>{{ $prod }}
              @endif 
            @endforeach
           </p>
        </div>
        <ul class="list-group list-group-flush">
              <li class="list-group-item">Rendelő: {{ $orders->surname }} {{ $orders->forename }}</li>
              <li class="list-group-item">Megadott cím: {{ $orders->country }} {{ $orders->zip }} {{ $orders->city }} {{ $orders->address }}</li>
              <li class="list-group-item">Megadott telefonszám: {{ $orders->phone }}</li>
              <li class="list-group-item">Megrendelve: {{ $orders->created_at }}</li>
              <li class="list-group-item">
                @if( $orders->status == 0)
                Feldolgozás alatt
                @elseif ($orders->status == 1)
                Kiszállítás alatt
                @else
                Kiszállítva
                @endif
              </li>
              <li class="list-group-item">Fizetett összeg: {{ $orders->price }} ft</li>
        </ul>
      </div>
  
    @endforeach
    @else
    <h5>Ön erről a felhasználóról még nem rendelt.</h5>
    @endif
  </div>
    
@endsection