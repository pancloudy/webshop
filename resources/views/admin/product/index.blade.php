@extends('layouts.topbar')

@section('content')
<a href="{{ url('/products/add') }}" class="btn btn-success btn-sm" title="Új">
    <i class="fa fa-plus" aria-hidden="true"></i>Új termék</a>
    <table class="table table-bordered table-striped">
        
            <tr>
                <th>ID</th>
                <th>Kategória ID</th>
                <th>Kategória</th>
                <th>Név</th>
                <th>Rövid leírás</th>
                <th>Leírás</th>
                <th>Eredeti ár</th>
                <th>Akciós ár</th>
                <th>Kép</th>
                <th>Mennyiség</th>
                <th>Elérhetőség</th>
                <th>Műveletek</th>
            </tr>
            @foreach ($product as $products)
            <tr>
                <td>
                    {{ $products->id ?? false }}
                </td>
                <td>
                    {{ $products->category_id ?? false}}
                </td>
                <td>
                    <?php
                    $category_name = DB::table('categories')->where('id', $products->category_id)->value('name');
                    ?>
                    {{ $category_name ?? false }}
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
                <td>
                    <form action="{{ route('products.edit',
                     $products->id) }}">
                    @csrf
                    <button class="btn btn-primary"
                     type="submit">Szerkesztés</button>
                    </form>
                    <form action="{{ route('products.delete', $products->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-primary" type="submit">Törlés</button>
                    </form>
                </td>
            </tr>
        @endforeach
    
    </table>
@endsection