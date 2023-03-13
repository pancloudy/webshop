<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use app\Models\Category;
use app\Models\Orders;
use Illuminate\Http\Request;
use App\Http\Controllers\Admin\CategoryController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class OrdersController extends Controller
{
    public function save(Request $request){
        $uid = Auth::user()->id;
        $prod_ids = "";
        $incart = DB::select('SELECT prod_id from cart where user_id=? AND status=1', [$uid]);
        foreach ($incart as $value){
            $prod_ids=$prod_ids."|".$value->prod_id;
        }
        


        $cart = DB::select('SELECT * from cart where user_id=? AND status=1', [$uid]);
        $surname = $request->input('surname');
        $forename = $request->input('forename');
        $country = $request->input('country');
        $zip = $request->input('country');
        $city = $request->input('country');
        $address = $request->input('address1').$request->input('address2');
        $phone = $request->input('phone');
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
            'status' => "0"
        ]);
        echo '<script>alert("Megrendelve.")</script>';
    
    }
    public function edit(){
        
    }
    public function index(){
        /*
        status lehet:
        Feldolgozás alatt
        Kiszállítás alatt
        Feldolgozva
        */
        $orders0 = DB::select('SELECT * from orders WHERE status=0');
        $orders2 = DB::select('SELECT * from orders WHERE status=1');
        $orders3 = DB::select('SELECT * from orders WHERE status=2');

    }
}