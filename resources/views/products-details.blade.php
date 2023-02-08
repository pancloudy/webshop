@extends('layouts.app')

@section('content')

    
    <table class="table table-bordered table-striped">
        @foreach ($product as $products)
        <thead>
            <tr>
                <th>Name:  <td>{{ $products->name ?? false}}</td></th>
            </tr>
            <tr>
                <th>Small Description <td>{{ $products->small_description ?? false}}</td></th>
            </tr>
            <tr>
                <th>Description <td>{{ $products->description ?? false}}</td></th>
            </tr>
            <tr>
                <th>Selling Price <td>{{ $products->selling_price ?? false}}</td></th>
            </tr>
            <tr>
                <th>Original Price <td>{{ $products->original_price ?? false}}</td></th>
            </tr>
            <tr>
                <th>Quantity <td>{{ $products->quantity ?? false}}</td></th>
            </tr>
            <tr>
                <th>Status: <td>{{ $products->status ?? false}}</td></th>
            </tr>    
            
            <img src="{{ asset('images/' . $products->image) }}" height="500" width="500" class="img img-responsive" />
            
        @endforeach
        </thead>
        <tbody>
            
        </tbody>
    </table>
@endsection