<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Carts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function index(){
        if (Auth::user()->id != NULL){
            $id = Auth::user()->id;
            $cart = DB::select('SELECT * from cart where user_id=? AND status=1', [$id]);
            return view('cart')->with('carts', $cart);
        }
        else return view('home');
    }
    public function add(Request $request){
        $prod_id = $request->input('prod_id');
        $user_id = $request->input('user_id');
        $prod_quant = $request->input('prod_quant');
        $check = DB::select('SELECT prod_id from cart where user_id=? AND prod_id=? AND status=1', [$user_id, $prod_id]);
        
        if($check != NULL){
            $amount = DB::table('cart')->where('user_id', $user_id)->where('prod_id', $prod_id)->where('status', 1)->value('prod_quantities');
            $intamount = intval($amount);
            $quantity = $intamount+$prod_quant;
            DB::update('UPDATE cart set prod_quantities=? WHERE prod_id=?',[$quantity, $prod_id]);
        }
        else{    
        
        Carts::create([
                'prod_id' => $prod_id,
                'user_id' => $user_id,
                'prod_quantities' => $prod_quant,
                'status' => 1
            ]);
            echo '<script>alert("Product added to cart.")</script>';
        }
        $id = Auth::user()->id;
        $cart = DB::select('SELECT * from cart where user_id=? AND status=1', [$id]);
        return view('cart')->with('carts', $cart);  
    }
    public function delete($id){
        DB::delete('DELETE from cart where id=?', [$id]);
        return redirect('cart');
    }
}