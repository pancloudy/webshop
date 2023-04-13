@extends('layouts.topbar')

@section('content')

<div class="col" align="center">
    <div class="col-md-3">
     <div class="card">
        <h5 class="card-header">Termékek</h5>
        <div class="card-body" style="background-color:rgb(71, 226, 71)">
            <h5 class="card-title">Ezen a felületen kezelhetőek a termékek.</h5>
            <a href="{{ url('products') }}" class="btn btn-secondary">Tovább</a>
        </div>
     </div>
    </div>
    <div class="col-md-3">
        <div class="card">
           <h5 class="card-header">Kategóriák</h5>
           <div class="card-body" style="background-color:rgb(70, 167, 247)">
               <h5 class="card-title">Ezen a felületen kezelhetőek a kategóriák.</h5>
               <a href="{{ url('categories') }}" class="btn btn-secondary">Tovább</a>
           </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card">
           <h5 class="card-header">Rendelések</h5>
           <div class="card-body" style="background-color:rgb(235, 180, 62)">
               <h5 class="card-title">Ezen a feleületen kezelhetőek a rendelések.</h5>
               <a href="{{ url('orders') }}" class="btn btn-secondary">Tovább</a>
           </div>
        </div>
    </div>
</div>



@endsection