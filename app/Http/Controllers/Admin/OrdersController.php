<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Orders;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class OrdersController extends Controller
{
    public function save(Request $request){
        $uid = Auth::user()->id;
        $prod_ids = "";
        $ertek = "";
        $incart = DB::select('SELECT prod_id, prod_quantities from cart where user_id=? AND status=1', [$uid]);
        $prices = DB::select('SELECT prod_id from cart where user_id=? AND status=1', [$uid]);
        foreach ($incart as $value){
            if($value->prod_quantities>1){
                for($i = 0; $i < $value->prod_quantities; $i++){
                $prod_ids=$prod_ids."|".$value->prod_id;
                }
            }else{
                $prod_ids=$prod_ids."|".$value->prod_id;
            }
            
        }


        $cart = DB::select('SELECT * from cart where user_id=? AND status=1', [$uid]);
        $surname = $request->input('surname');
        $forename = $request->input('forename');
        $country = $request->input('country');
        $zip = $request->input('zip');
        $city = $request->input('city');
        $address = $request->input('address1')." ".$request->input('address2');
        $phone = $request->input('phone');
        $price = $request->input('price');
        $order = Orders::create([
            'prod_id' => $prod_ids,
            'user_id' => $uid,
            'surname' => $surname,
            'forename' => $forename,
            'country' => $country,
            'zip' => $zip,
            'city' => $city,
            'address' => $address,
            'phone' => $phone,
            'status' => "0",
            'price' => $price
        ]);
        $cart = DB::update('UPDATE cart SET status=2 where user_id=? AND status=1', [$uid]);
 
        echo '<script>alert("Megrendelve.")</script>';
    
    }
    public function new(Request $request){
        $price = $request->input('price');
        return view('order')->with('price', $price);
    }
    public function index(){
        /*
        status lehet:
        Feldolgozás alatt
        Kiszállítás alatt
        Feldolgozva
        */
        
        return view('admin.orders.index');
    }
    public function status(Request $request){
        $status = $request->input('status');
        $id = $request->input('id');
        $change = DB::update('UPDATE orders set status = ? where id = ?', [$status, $id]);
        return view('admin.orders.index');
    }
}