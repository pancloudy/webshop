<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use app\Models\Category;
use app\Models\Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Admin\CategoryController;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function add($prod_quant, $user_id, $prod_id){
        $check = DB::select('SELECT * from cart where user_id=? AND status=1 ', [$user_id]);
        //Le van zárva
        if ($check == NULL){
            $cart = Cart::create([
                'products_id' => $prod_id,
                'users_id' => $user_id,
                'quantity' => $prod_quant,
                'status' => 1,
            ]);
        }
        //Nincs lezárva

        else{
            $existing_id = DB::select('SELECT products_id from cart where user_id=? AND status=1 ', [$user_id]);
            $existing_quant = DB::select('SELECT prod_quant from cart where user_id=? AND status=1 ', [$user_id]);
            $trim="|";
            $insert = DB::insert('INSERT INTO cart (products_id, quantity)
                                    VALUES 
                                  (? UNION ? UNION ?,
                                   ? UNION ? UNION ?,)
                                  WHERE user_id=? AND status=1' [$existing_id][$trim][$prod_id]
                                                                [$existing_quant][$trim][$prod_quant]
                                                                [$user_id]);
        }
    }
}