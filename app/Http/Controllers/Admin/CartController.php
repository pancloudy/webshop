<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use app\Models\Cart;
use App\Models\Carts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function add(Request $request){
        $prod_id = $request->input('prod_id');
        $user_id = $request->input('user_id');
        $prod_quant = $request->input('prod_quant');
        $check = DB::select('SELECT * from cart where user_id=? AND status=1 ', [$user_id]);
        //Le van zárva
        if ($check == NULL){
            $cart = Carts::create([
                'prod_ids' => $prod_id,
                'user_id' => $user_id,
                'prod_quantities' => $prod_quant,
                'status' => 1,
            ]);
        }
        //Nincs lezárva

        else{
            $existing_id = DB::select('SELECT prod_ids from cart where user_id=? AND status=1 ', [$user_id]);
            $existing_quant = DB::select('SELECT prod_quantities from cart where user_id=? AND status=1 ', [$user_id]);
            $trim="|";
            $insert = DB::insert('INSERT INTO cart (prod_ids, prod_quantities)
                                    VALUES 
                                  (? UNION ? UNION ?,
                                   ? UNION ? UNION ?,)
                                  WHERE user_id=? AND status=1' [$existing_id][$trim][$prod_id]
                                                                [$existing_quant][$trim][$prod_quant]
                                                                [$user_id]);
        }
    }
}