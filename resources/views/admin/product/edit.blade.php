@extends('layouts.topbar')

@section('content')
    <div class="card-header">
        <h4>Edit/update products</h4>
    </div>
    @foreach ($product as $products)
    <form action="{{ action('App\Http\Controllers\Admin\ProductController@update', $products->id) }}"  enctype="multipart/form-data" method="post">
        @csrf
        @method('PUT')
        category_id: <input type="number" name="category_id" value="{{ $products->category_id }}">
        <br>
        Name: <input type="text" name="name" value="{{ $products->name }}">
        <br>
        small description: <input type="text" name="small_description" value="{{ $products->small_description }}">
        <br>
        description: <input type="text" name="description" value="{{ $products->description }}">
        <br>
        original price: <input type="text" name="original_price" value="{{ $products->original_price }}">
        <br>
        selling_price: <input type="text" name="selling_price" value="{{ $products->selling_price }}">
        <br>
        <img src="{{ asset('images/' . $products->image) }}" height="50" width = "50" class="img img-responsive" />
            Select image to upload:
            <input class="form-control" enctype="multipart/form-data" type="file" name="image" id="image" value="{{ $products->image }}">

        <br>
        quantity: <input type="text" name="quantity" value="{{ $products->quantity }}">
        <br>
        status:
        @if($products->status=="1")
        <select name="status" value="{{ $products->status }}">
            <option value="1">in stock</option>
            <option value="null">no information</option>
            <option value="0">out of stock</option>
        </select>
        @elseif($products->status=="0")
        <select name="status" value="{{ $products->status }}">
            <option value="0">out of stock</option>
            <option value="1">in stock</option>
            <option value="null">no information</option>
        </select>
        @else
        <select name="status" value="{{ $products->status }}">
            <option value="null">no information</option>
            <option value="0">out of stock</option>
            <option value="1">in stock</option>
        </select>
        @endif
        <br>
        <button type="submit">Submit</button>
    </form>
    @endforeach
@endsection