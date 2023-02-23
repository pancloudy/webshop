@extends('layouts.app')

@section('content')

            
            <html>
    
    <table class="table table-bordered table-striped">
        
        @foreach ($product as $products)
        <thead>
            
            <tr>
                <th>Name:  <td>{{ $products->name ?? false}}</td></th>
            </tr>
            <tr>
                <th>Small Description <td>{{ $products->small_description ?? false}}</td></th>
            </tr>
            <tr>
                <th>Description <td>{{ $products->description ?? false}}</td></th>
            </tr>
            <tr>
                <th>Selling Price <td>{{ $products->selling_price ?? false}}</td></th>
            </tr>
            <tr>
                <th>Original Price <td>{{ $products->original_price ?? false}}</td></th>
            </tr>
            <tr>
                <th>Quantity <td>{{ $products->quantity ?? false}}</td></th>
            </tr>
            <tr>
                <th>Status: <td>{{ $products->status ?? false}}</td></th>
            </tr>    
            
            <img src="{{ asset('images/' . $products->image) }}" height="500" width="500" class="img img-responsive" />
                <form method="post">
                    <input type="number" name="quantity" value="1" max="{{ $products->quantity }}"></input>
                    <input type="hidden" name="product_id" value="{{ $products->id }}"></input>
                    <button type="submit"  name="add">Kosárba</button>
                    @csrf
                </form>
                
            
                
    <?php
        if(isset($_POST['add'])){
                                
            if (isset($_POST['p_id'], $_POST['p_quantity'])) {
                
                $p_id = (int)$_POST['p_id'];
                $p_quantity = (int)$_POST['p_quantity'];
                $stmt = $pdo->prepare('SELECT * FROM products WHERE id = ?');
                $stmt->execute([$_POST['p_id']]);
                $product = $stmt->fetch(PDO::FETCH_ASSOC);
                
                if ($product && $p_quantity > 0) {
                    
                    if (isset($_SESSION['cart']) && is_array($_SESSION['cart'])) {
                        if (array_key_exists($p_id, $_SESSION['cart'])) {
                            $_SESSION['cart'][$p_id] += $quantity;
                        } else {
                            $_SESSION['cart'][$p_id] = $quantity;
                        }
                    } else {
                        
                        $_SESSION['cart'] = array($p_id => $p_quantity);
                    }
                }
                exit;
                 }   
            }
            ?>
        @endforeach
        </thead>
        <tbody>
            
        </tbody>
    </table>
    </html>
@endsection