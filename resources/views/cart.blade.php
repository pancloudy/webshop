@extends('layouts.app')

@section('content')
<html>

    <table class="table table-bordered table-striped">
        @foreach ($carts as $cart)
        <thead>
            <tr>
                <th>prod:  <td>{{ $cart->prod_id ?? false}}</td></th>
            </tr>
            <tr>
                <th>Quantities:  <td>{{ $cart->prod_quantities ?? false}}</td></th>
            </tr>

            
        
        @endforeach
        </thead>
        <tbody>
            
        </tbody>
    </table>
    </html>
@endsection