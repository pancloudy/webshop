@extends('layouts.app')

@section('content')
<a href="{{ url('/products/add') }}" class="btn btn-success btn-sm" title="Add New Contact">
    <i class="fa fa-plus" aria-hidden="true"></i> Add New</a>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Small Description</th>
                <th>Description</th>
                <th>Original Price</th>
                <th>Selling Price</th>
                <th>Image</th>
                <th>Quantity</th>
                <th>Status</th>
            </tr>
            @foreach ($product as $products)
            <tr>
                <td>
                    {{ $products->id ?? false }}
                </td>
                <td>
                    {{ $products->name ?? false}}
                </td>
                <td>
                    {{ $products->small_description ?? false}}
                </td>
                <td>
                    {{ $products->description ?? false}}
                </td>
                <td>
                    {{ $products->original_price ?? false}}
                </td>
                <td>
                    {{ $products->selling_price ?? false}}
                </td>
                <td>
                    <img src="{{ asset('images/' . $products->image) }}" height="50" width = "50" class="img img-responsive" />
                </td>
                <td>
                    {{ $products->quantity ?? false}}
                </td>
                <td>
                    {{ $products->status ?? false}}
                </td>
            </tr>
        @endforeach
        </thead>
        <tbody>
            
        </tbody>
    </table>
@endsection