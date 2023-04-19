@extends('layouts.topbar')

@section('content')
    <div class="card-header">
        <h4>Termékek szerkesztése</h4>
    </div>
    @foreach ($product as $products)
    <form action="{{ action('App\Http\Controllers\Admin\ProductController@update', $products->id) }}"  enctype="multipart/form-data" method="post">
        @csrf
        @method('PUT')
        Kategória ID: <input type="number" name="category_id" value="{{ $products->category_id }}">
        <br>
        Név: <input type="text" name="name" value="{{ $products->name }}">
        <br>
        Rövid leírás: <input type="text" name="small_description" value="{{ $products->small_description }}">
        <br>
        Leírás: <input type="text" name="description" value="{{ $products->description }}">
        <br>
        Eredeti ár: <input type="text" name="original_price" value="{{ $products->original_price }}">
        <br>
        Leárazott ár: <input type="text" name="selling_price" value="{{ $products->selling_price }}">
        <br>
        <img src="{{ asset('images/' . $products->image) }}" height="50" width = "50" class="img img-responsive" />
            Válasszon ki egy képet
            <input class="form-control"  type="file" name="image" id="image">
        <br>
        Mennyiség: <input type="text" name="quantity" value="{{ $products->quantity }}">
        <br>
        Elérhetőség:
        @if($products->status=="1")
        <select name="status" value="{{ $products->status }}">
            <option value="1">Raktáron</option>
            <option value="null">Nincs információ</option>
            <option value="0">Elfogyott</option>
        </select>
        @elseif($products->status=="0")
        <select name="status" value="{{ $products->status }}">
            <option value="0">Elfogyott</option>
            <option value="1">Raktáron</option>
            <option value="null">Nincs információ</option>
        </select>
        @else
        <select name="status" value="{{ $products->status }}">
            <option value="null">Nincs információ</option>
            <option value="0">Elfogyott</option>
            <option value="1">Raktáron</option>
        </select>
        @endif
        <br>
        <button class="btn btn-primary" type="submit">Küldés</button>
    </form>
    @endforeach
@endsection