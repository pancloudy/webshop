@extends('layouts.topbar')

@section('content')
    <style>
        .container{
            display: flex;
            justify-content: center;
        }
        h4{
            justify-content: center;
            display: flex;
        }
    </style>
        <h4>Új termék</h4>
        <br>
   <div class="container">
    <div class="col-md-3">
    <form action="{{ route("products.save") }}" method="post" enctype="multipart/form-data">
        @csrf
        Kategória ID: <input type="number" name="category_id" value="">
        <br>
        Név: <input type="text" name="name" value="">
        <br>
        Rövid leírás: <input type="text" name="small_description" value="">
        <br>
        Leírás: <input type="text" name="description" value="">
        <br>
        Eredeti ár: <input type="text" name="original_price" value="">
        <br>
        Leárazott ár: <input type="text" name="selling_price" value="">
        <br>  
            Válasszon ki egy képet(max 2mb):
            <input class="form-control" type="file" name="image" id="image">
        <br>
        Mennyiség: <input type="text" name="quantity" value="">
        <br>
        Elérhetőség:
        <select name="status">
            <option value="null">Nincs információ</option>
            <option value="0">Elfogyott</option>
            <option value="1">Raktáron</option>
        </select>
        <br>
    
        <button class="btn btn-primary" type="submit">Küldés</button>
    </form>
</div>
<div class="col-md-2"></div>
<div class="col-md-5">
    <table class="table table-bordered table-striped">
        <h4>Választható kategóriák</h4>
        <?php
        $names=DB::select('SELECT * FROM categories'); 
        ?>
        @foreach ($names as $name )
            <th>Id</th>
            <td>{{ $name->id }}</td>
            <th>Név</th>
            <td>{{ $name->name }}</td>
            <tr></tr>
        @endforeach
    </table>
    </div>
</div>
@endsection