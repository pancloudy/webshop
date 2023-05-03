@extends('layouts.topbar')

@section('content')
<style>
    
</style>
<html>
    <div class="row">
    <div class="col-md-4">
    <table class="table table-bordered table-striped">
            <tr>
                <th>Új</th>
            </tr>
            <?php 
        $orders1 = DB::select('SELECT * from orders WHERE status=0');
            ?>
                @foreach ($orders1 as $order1)
        <?php
        $carts1 = DB::select('SELECT * from cart WHERE order_id = ?', [$order1->id]); 
        ?>
                
            <tr>
                <td>
                    {{ $order1->id ?? false}} order id<br>
                    {{ $order1->surname }} {{ $order1->forename }} 
                </td>
            </tr>
            
        <tr>
            <td>
                @foreach ($carts1 as $cart1)
                <?php 
                    $uid = Auth::user()->id;
                    $id = DB::table('products')->where('id', $cart1->prod_id)->value('id');
                    $name = DB::table('products')->where('id', $cart1->prod_id)->value('name');
                    $count = DB::table('cart')->where('prod_id', $id)->where('order_id', $order1->id)->where('user_id', $uid)->value('prod_quantities');
                    ?>
                    @if ($count > 1)
                     @for ($i = 0; $i < $count; $i++)
                      {{ $id }} {{ $name }}
                       @if($i != $count-1)
                       <br>
                       @endif
                     @endfor
                    @else
                          {{ $id }} {{ $name }}
                    @endif
                    <br>
                @endforeach
                <form method="POST" enctype="multipart/form-data" action="{{ action('App\Http\Controllers\Admin\OrdersController@status') }}">
                    @csrf
                    <input type="hidden" name="id" value="{{ $order1->id }}">
                    <select onchange="this.form.submit()" name="status" value="{{ $order1->status }}">
                        <option value="0">Új</option>
                        <option value="1">Folyamatban</option>
                        <option value="2">Lezárt</option>
                    </select>  
                </form>
            </td>             
        </tr>
                @endforeach 
    </table>
</div>
<div class="col-md-4"> 
    <table class="table table-bordered table-striped">
        
            <tr>
                <th>Folyamatban</th>
            </tr>
        
            <?php 
        $orders2 = DB::select('SELECT * from orders WHERE status=1');
            ?>
            
                @foreach ($orders2 as $order2 )
                <?php
                $carts2 = DB::select('SELECT * from cart WHERE order_id = ?', [$order2->id]); 
                ?>
            <tr>
                <td>
                    {{ $order2->id ?? false}} order id<br>
                    {{ $order2->surname }} {{ $order2->forename }} 
                </td>
            </tr>
        <tr>
            <td>
                @foreach ($carts2 as $cart2)
                <?php 
                    $uid = Auth::user()->id;
                    $id = DB::table('products')->where('id', $cart2->prod_id)->value('id');
                    $name = DB::table('products')->where('id', $cart2->prod_id)->value('name');
                    $count = DB::table('cart')->where('prod_id', $id)->where('order_id', $order2->id)->where('user_id', $uid)->value('prod_quantities');
                    ?>
                     @if ($count > 1)
                     @for ($i = 0; $i < $count; $i++)
                     {{ $id }} {{ $name }}
                     @if($i != $count-1)
                        <br>
                        @endif
                     @endfor
                     @else
                          {{ $id }} {{ $name }}
                     @endif
                    <br>
                @endforeach
                <form method="POST" enctype="multipart/form-data" action="{{ action('App\Http\Controllers\Admin\OrdersController@status') }}">
                    @csrf
                    <input type="hidden" name="id" value="{{ $order2->id }}">
                    <select onchange="this.form.submit()" name="status" value="{{ $order2->status }}">
                        <option value="1">Folyamatban</option>
                        <option value="0">Új</option>
                        <option value="2">Lezárt</option>
                    </select>  
                </form>
            </td>                
        </tr>
                @endforeach
        
            
    </table>
</div>
<div class="col-md-4">
    <table class="table table-bordered table-striped">
        
            <tr>
                <th>Lezárt</th>
            </tr>
        
            <?php 
        $orders3 = DB::select('SELECT * from orders WHERE status=2');
            ?>
            
                @foreach ($orders3 as $order3 )
                <?php
                $carts3 = DB::select('SELECT * from cart WHERE order_id = ?', [$order3->id]); 
                ?>
            <tr>
                <td>
                    {{ $order3->id ?? false}} order id<br>
                    {{ $order3->surname }} {{ $order3->forename }} 
                </td>
            </tr>
        <tr>
            <td>
                @foreach ($carts3 as $cart3)
                <?php 
                    $uid = Auth::user()->id;
                    $id = DB::table('products')->where('id', $cart3->prod_id)->value('id');
                    $name = DB::table('products')->where('id', $cart3->prod_id)->value('name');
                    $count = DB::table('cart')->where('prod_id', $id)->where('order_id', $order3->id)->where('user_id', $uid)->value('prod_quantities');
                    ?>
                    @if ($count > 1)
                        @for ($i = 0; $i < $count; $i++)
                        {{ $id }} {{ $name }}
                        @if($i != $count-1)
                        <br>
                        @endif
                        @endfor
                    @else
                         {{ $id }} {{ $name }}
                    @endif
                    <br>
                @endforeach
                <form method="POST" enctype="multipart/form-data" action="{{ action('App\Http\Controllers\Admin\OrdersController@status') }}">
                    @csrf
                    <input type="hidden" name="id" value="{{ $order3->id }}">
                    <select onchange="this.form.submit()" name="status" value="{{ $order3->status }}">
                        <option value="2">Lezárt</option>
                        <option value="0">Új</option>
                        <option value="1">Folyamatban</option>
                    </select>  
                </form>
            </td>           
        </tr>
                @endforeach
        
            
    </table>
</div>
</div>
</html>
@endsection