@extends('layouts.app')

@section('content')
<html>
    <i class="fa fa-plus" aria-hidden="true"></i> Add New</a>
    <table class="table table-bordered table-striped">
        
            <tr>
                <th>Új</th>
                <th>Folyamatban</th>
                <th>Lezárt</th>

            </tr>
        
            <?php 
        $orders1 = DB::select('SELECT * from orders WHERE status=0');
        $orders2 = DB::select('SELECT * from orders WHERE status=1');
        $orders3 = DB::select('SELECT * from orders WHERE status=2');
            ?>
            @foreach ($orders1 as $order1)
            <tr>
                <td>                  
                    {{ $order1->id ?? false }}
                </td>
                <td>
                    
                </td>
            </tr>
            <tr>
                <td>
                    {{ $order1->prod_id ?? false}}
                </td>
            </tr>
            @endforeach
            @foreach ($orders1 as $order2)
            <tr>
                <td>hello</td>
            </tr>
             @endforeach

        
        
            
        
    </table>
    
</html>
@endsection