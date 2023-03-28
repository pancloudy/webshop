@extends('layouts.front')
@extends ('layouts.app')

@section('content')
    <div class="card-header">
        <h4>Add products</h4>
    </div>
    <form action="{{ route("products.save") }}" method="post" enctype="multipart/form-data">
        @csrf

        category_id: <input type="number" name="category_id" value="">
        <br>
        Name: <input type="text" name="name" value="">
        <br>
        small description: <input type="text" name="small_description" value="">
        <br>
        description: <input type="text" name="description" value="">
        <br>
        original price: <input type="text" name="original_price" value="">
        <br>
        selling_price: <input type="text" name="selling_price" value="">
        <br>
            
            Select image to upload:
            <input class="form-control" type="file" name="image" id="image">

        <br>
        quantity: <input type="text" name="quantity" value="">
        <br>
        status:
        <select name="status">
            <option value="null"></option>
            <option value="0">out of stock</option>
            <option value="1">in stock</option>
        </select>
        <br>
    
        <button type="submit">Submit</button>
    </form>
@endsection