@extends('layouts.topbar')

@section('content')
    <div class="card-header">
        <h4>Új termék</h4>
    </div>
    <div class="col-md-3"
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
            
            Válasszon ki egy képet:
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
<div class="col-md-3">
    <table class="table table-bordered table-striped">
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
@endsection