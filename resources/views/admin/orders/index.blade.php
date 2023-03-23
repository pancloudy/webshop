@extends('layouts.app')

@section('content')

<html>
    
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
                
                @foreach ($orders2 as $order2)
            
                @foreach ($orders3 as $order3 )
            
            <tr>
                <td>                  
                    {{ $order1->id ?? false }}
                </td>
                <td>
                    {{ $order2->id ?? false}}
                </td>
                <td>
                    {{ $order3->id ?? false}}
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
                <form method="GET" action="">
                    <select onchange="this.form.submit()" name="status" value="{{ $order1->status }}">
                        <option value="0">Új</option>
                        <option value="1">Folyamatban</option>
                        <option value="2">Lezárt</option>
                    </select>  
                </form>
                <?php
                    if(isset($_GET["status"])){
                    $status=$_GET["status"];
                    $id = $order1->id;
                    $change = DB::update('UPDATE orders set status = ? where id = ?', [$status, $id]);
                    header("Refresh:0");
                 }
                    ?>                
            </td>
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
                <form method="GET" action="">
                <select onchange="this.form.submit()" name="status" value="{{ $order2->status }}">
                    <option value="1">Folyamatban</option>
                    <option value="0">Új</option>
                    <option value="2">Lezárt</option>
                </select>  
            </form>
            <?php
                if(isset($_GET["status"])){
                $status=$_GET["status"];
                $id = $order2->id;
                $change = DB::update('UPDATE orders set status = ? where id = ?', [$status, $id]);
                header("Refresh:0");
             }
                ?>
            </td>
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
                <form method="POST" action="">
                    <select onchange="this.form.submit()" name="status" value="{{ $order3->status }}">
                        <option value="2">Lezárt</option>
                        <option value="0">Új</option>
                        <option value="1">Folyamatban</option>
                    </select>  
                </form>
                <?php
                    if(isset($_POST["status"])){
                    $status=$_POST["status"];
                    $id = $order3->id;
                    $change = DB::update('UPDATE orders set status = ? where id = ?', [$status, $id]);
                    header("Refresh:0");
                 }
                    ?>  
            </td>
        </tr>
             @endforeach
             @endforeach 
             @endforeach
        
        
            
        
    </table>
    
</html>
@endsection