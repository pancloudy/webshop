@extends('layouts.topbar')

@section('content')
<a href="{{ url('/categories/add') }}" class="btn btn-success btn-sm" title="Add New Category">
    <i class="fa fa-plus" aria-hidden="true"></i>Új kategória</a>
    <table class="table table-bordered table-striped">
        
            <tr>
                <th>Id</th>
                <th>Név</th>
                <th>Leírás</th>
                <th>Slug</th>
                <th>Elérhetőség</th>
                <th>Kép</th>
                <th>Műveletek</th>
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
                    
                    <button class="btn btn-primary" type="submit">Szerkesztés</button>
                    </form>
                    <form action="{{ route('categories.delete', $categories->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-primary" type="submit">Törlés</button>
                    </form>
                    
                </td>
            </tr>
        @endforeach
        
    </table>
@endsection