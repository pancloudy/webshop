@extends('layouts.topbar')

@section('content')
    <div class="card-header">
        <h4>Add categories</h4>
    </div>
    <form action="{{ route("categories.save") }}" method="post" enctype="multipart/form-data">
        @csrf

        
        Name: <input type="text" name="name" value="">
        
        <br>
        description: <input type="text" name="description" value="">
        <br>
        slug: <input type="text" name="slug" value="">
        <br>
        status:
        <select name="status">
            <option value="null"></option>
            <option value="0">out of stock</option>
            <option value="1">in stock</option>
        </select>
        <br>
            
            Select image to upload:
            <input class="form-control" type="file" name="image" id="image">

        <br>
        
    
        <button type="submit">Submit</button>
    </form>
@endsection