@extends('layouts.app')
@extends('layouts.front')
@extends('layouts.topbar')

@section('content')
<style>
    .table{
        float: left;
    }
</style>
<html>
    
    <table class="table table-bordered table-striped">
        
            <tr>
                <th>Új</th>
            </tr>
        
            <?php 
        $orders1 = DB::select('SELECT * from orders WHERE status=0');
            ?>
            
                @foreach ($orders1 as $order1 )
            
            <tr>
                <td>
                    {{ $order1->id ?? false}}
                </td>
            </tr>
        <tr>
            <td>
                <?php
                $exp = explode("|", $order1->prod_id); 
                ?>
                @for ($i = 1; $i<count($exp); $i=$i+1 )
                <?php 
                $element = $exp[$i];
                
                $name = DB::table('products')->where('id', $element)->value('name');
            
                ?>
                {{ $element }} {{ $name }}
                <br>
                @endfor
                <form method="POST" enctype="multipart/form-data" action="{{ action('App\Http\Controllers\Admin\OrdersController@status') }}">
                    @csrf
                    <input type="hidden" name="id" value="{{ $order1->id }}">
                    <select onchange="this.form.submit()" name="status" value="{{ $order1->status }}">
                        <option value="0">Új</option>
                        <option value="1">Folyamatban</option>
                        <option value="2">Lezárt</option>
                    </select>  
                </form>
                                
        </tr>
                @endforeach
        
            
    </table> 
    <table class="table table-bordered table-striped">
        
            <tr>
                <th>Folyamatban</th>
            </tr>
        
            <?php 
        $orders2 = DB::select('SELECT * from orders WHERE status=1');
            ?>
            
                @foreach ($orders2 as $order2 )
            
            <tr>
                <td>
                    {{ $order2->id ?? false}}
                </td>
            </tr>
        <tr>
            <td>
                <?php
                $exp = explode("|", $order2->prod_id); 
                ?>
                @for ($i = 1; $i<count($exp); $i=$i+1 )
                <?php 
                $element = $exp[$i];
                
                $name = DB::table('products')->where('id', $element)->value('name');
            
                ?>
                {{ $element }} {{ $name }}
                <br>
                @endfor
                <form method="POST" enctype="multipart/form-data" action="{{ action('App\Http\Controllers\Admin\OrdersController@status') }}">
                    @csrf
                    <input type="hidden" name="id" value="{{ $order2->id }}">
                    <select onchange="this.form.submit()" name="status" value="{{ $order2->status }}">
                        <option value="1">Folyamatban</option>
                        <option value="0">Új</option>
                        <option value="2">Lezárt</option>
                    </select>  
                </form>
                                   
        </tr>
                @endforeach
        
            
    </table>
    <table class="table table-bordered table-striped">
        
            <tr>
                <th>Lezárt</th>
            </tr>
        
            <?php 
        $orders3 = DB::select('SELECT * from orders WHERE status=2');
            ?>
            
                @foreach ($orders3 as $order3 )
            
            <tr>
                <td>
                    {{ $order3->id ?? false}}
                </td>
            </tr>
        <tr>
            <td>
                <?php
                $exp = explode("|", $order3->prod_id); 
                ?>
                @for ($i = 1; $i<count($exp); $i=$i+1 )
                <?php 
                $element = $exp[$i];
                
                $name = DB::table('products')->where('id', $element)->value('name');
            
                ?>
                {{ $element }} {{ $name }}
                <br>
                @endfor
                <form method="POST" enctype="multipart/form-data" action="{{ action('App\Http\Controllers\Admin\OrdersController@status') }}">
                    @csrf
                    <input type="hidden" name="id" value="{{ $order3->id }}">
                    <select onchange="this.form.submit()" name="status" value="{{ $order3->status }}">
                        <option value="2">Lezárt</option>
                        <option value="0">Új</option>
                        <option value="1">Folyamatban</option>
                    </select>  
                </form>
                              
        </tr>
                @endforeach
        
            
    </table>
</html>
@endsection