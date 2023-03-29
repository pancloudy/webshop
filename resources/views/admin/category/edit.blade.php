@extends('layouts.topbar')

@section('content')
    <div class="card-header">
        <h4>Edit/update categories</h4>
    </div>
    @foreach ($category as $categories)
    <form action="{{ action('App\Http\Controllers\Admin\CategoryController@update', $categories->id) }}"  enctype="multipart/form-data" method="post">
        @csrf
        @method('PUT')
        Name: <input type="text" name="name" value="{{ $categories->name }}">
        <br>
        description: <input type="text" name="description" value="{{ $categories->description }}">
        <br>
        slug: <input type="text" name="slug" value="{{ $categories->slug }}">
        <br>
        status: @if($categories->status=="1")
        <select name="status" value="{{ $categories->status }}">
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
        <img src="{{ asset('images/' . $categories->image) }}" height="50" width = "50" class="img img-responsive" />
            Select image to upload:
            <input class="form-control" enctype="multipart/form-data" type="file" name="image" id="image" value="{{ $categories->image }}">

        <br>

        <button type="submit">Submit</button>
    </form>
    @endforeach
@endsection