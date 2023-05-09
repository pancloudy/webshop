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
    <div class="card-header">
        <h4>Kategóriák szerkesztése</h4>
    </div>
    @foreach ($category as $categories)
    <div class="container">
        <div class="col-md-3">
    <form action="{{ action('App\Http\Controllers\Admin\CategoryController@update', $categories->id) }}"  enctype="multipart/form-data" method="post">
        @csrf
        @method('PUT')
        Név: <input type="text" name="name" value="{{ $categories->name }}">
        <br>
        Leírás: <input type="textarea" name="description"  value="{{ $categories->description }}">
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
        <button class="btn btn-primary" type="submit">Küldés</button>
        </div>
        <div class="col-md-3">
        <img src="{{ asset('images/' . $categories->image) }}" style="width: 18rem;" class="img img-responsive" />
        <br>
            Válasszon ki egy képet(max 2mb):
            <input class="form-control" type="file" name="image" id="image">
        </div>
        
    </form>
    @endforeach
</div>
@endsection