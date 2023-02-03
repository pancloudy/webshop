@extends ('layouts.app')

@section('content')
<style>
    .column{
    float: left;
    width: 20%;
    padding: 5px;
    }
    .row::after {
  content: "";
  clear: both;
  display: table;
}
</style>
<br>
@foreach ($product as $products )
<div class=="row">
    <div class="column">
        {{ $products->name }}
        <img src="{{ asset('images/' . $products->image) }}" style="width:100%" />
    </div>

</div>
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