@extends('layouts.front')
@extends('layouts.app')

@section('content')

<a href="{{ url('products') }}">
    <p>products</p>
</a>
<a href="{{ url('products/add') }}">
    <p>add products</p>
</a>
<a href="{{ url('category') }}">
    <p>Category</p>
</a>
<a href="{{ url('add-category') }}">
    <p>Add Categories</p>
</a>


@endsection