@extends('layouts.topbar')

@section('content')
    <div class="card-header">
        <h4>Kategóriák szerkesztése</h4>
    </div>
    @foreach ($category as $categories)
    <form action="{{ action('App\Http\Controllers\Admin\CategoryController@update', $categories->id) }}"  enctype="multipart/form-data" method="post">
        @csrf
        @method('PUT')
        Név: <input type="text" name="name" value="{{ $categories->name }}">
        <br>
        Leírás: <input type="text" name="description" value="{{ $categories->description }}">
        <br>
        Slug: <input type="text" name="slug" value="{{ $categories->slug }}">
        <br>
        Elérhetőség: @if($categories->status=="1")
        <select name="status" value="{{ $categories->status }}">
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
        <img src="{{ asset('images/' . $categories->image) }}" height="50" width = "50" class="img img-responsive" />
            Válasszon ki egy képet:
            <input class="form-control" enctype="multipart/form-data" type="file" name="image" id="image" value="{{ $categories->image }}">

        <br>

        <button class="btn btn-primary" type="submit">Küldés</button>
    </form>
    @endforeach
@endsection