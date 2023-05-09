<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(){
        return view('home');
    }
    public function search(Request $request){
        $search = $request->input('search');
        $result = Product::where('name', 'LIKE', '%'.$search.'%')->get();
        return view('products-list')->with('product', $result);
    }
}
