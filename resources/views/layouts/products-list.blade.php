@extends ('layouts.app')

@section('content')
<?php
$i = 0;
?>
<table>
    @foreach ($product as $products )
    
        @if ($i = 4)
            <br>
            <?php
            $i = 0;
            ?>
        @endif
    
    <tr>
        <td>
            {{ $products->name }}
            <?php
            $i = $i + 1; 
            ?>
        </td>
    </tr>
    @endforeach
</table>
@endsection