@extends ('layouts.app')

@section('content')
<style>
    .column{
    float: left;
    width: 20%;
    padding: 5px;
    margin: 5px;
  border: 1px solid #ccc;
    }
    .row{
        padding: 3px;
    }
    .row::after {
  content: "";
  clear: both;
  display: table;
}
 .pricegreen{
color:greenyellow;
 }
 .pricered{
color: red;
text-decoration: line-through;
 }
</style>
<br>
@foreach ($product as $products )
<form action="{{ action('App\Http\Controllers\Admin\ProductController@details', $products->id) }}"  enctype="multipart/form-data" >
<div class=="row">
    <div class="column">
        {{ $products->name }}
        <img src="{{ asset('images/' . $products->image) }}" height="600" width="400"  />
        @if ($products->original_price != $products->selling_price)
            <div class="pricegreen">
                {{ $products->selling_price}}
            </div>
            <div class="pricered">{{ $products->original_price }}</div>
        @else
        {{ $products->selling_price }}
        @endif
        <button type="submit">Megtekintés</button>
    </div>

</div>
</form>
@endforeach
<!--<?php
$i = 0;
?>
<table>
    @foreach ($product as $products )
    
        @if ($i = 4)
            <br>
            <?php
            $i = 0;
            ?>
        @endif
    
    <th>
        <th>
            {{ $products->name }}
            <?php
            $i = $i + 1; 
            ?>
        </th>
        <td>
            <img src="{{ asset('images/' . $products->image) }}" height="50" width = "50" class="img img-responsive" />
        </td>
    </th>
    @endforeach
</table>-->
@endsection