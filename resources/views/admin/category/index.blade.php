@extends('layouts.front')
@extends('layouts.app')

@section('content')
<a href="{{ url('/categories/add') }}" class="btn btn-success btn-sm" title="Add New Category">
    <i class="fa fa-plus" aria-hidden="true"></i> Add New</a>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Description</th>
                <th>Slug</th>
                <th>Status</th>
                <th>Image</th>

            </tr>
            @foreach ($category as $categories)
            <tr>
                <td>
                    {{ $categories->id ?? false }}
                </td>
                <td>
                    {{ $categories->name ?? false}}
                </td>
                <td>
                    {{ $categories->description ?? false}}
                </td>
                <td>
                    {{ $categories->slug ?? false}}
                </td>
                <td>
                    {{ $categories->status ?? false}}
                </td>
                <td>
                    <img src="{{ asset('images/' . $categories->image) }}" height="50" width = "50" class="img img-responsive" />
                </td>

                <td>

                    <form action="{{ route('categories.edit', $categories->id) }}"  class="btn btn-primary">
                    @csrf
                    
                    <button type="submit">Edit</button>
                    </form>
                    <form action="{{ route('categories.delete', $categories->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                    
                </td>
            </tr>
        @endforeach
        </thead>
        <tbody>
            
        </tbody>
    </table>
@endsection