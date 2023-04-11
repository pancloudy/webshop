@extends('layouts.topbar')

@section('content')
    <div class="card-header">
        <h4>Új kategória</h4>
    </div>
    <form action="{{ route("categories.save") }}" method="post" enctype="multipart/form-data">
        @csrf
        Név: <input type="text" name="name" value="">
        <br>
        Leírás: <input type="text" name="description" value="">
        <br>
        Slug: <input type="text" name="slug" value="">
        <br>
        Elérhetőség:
        <select name="status">
            <option value="null">Nincs információ</option>
            <option value="0">Elfogyott</option>
            <option value="1">Raktáron</option>
        </select>
        <br>
            
            Válasszon ki egy képet:
            <input class="form-control" type="file" name="image" id="image">

        <br>
        
    
        <button class="btn btn-primary" type="submit">Submit</button>
    </form>
@endsection