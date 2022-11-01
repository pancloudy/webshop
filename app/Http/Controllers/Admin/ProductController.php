<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use app\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Admin\CategoryController;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index(){
        $product = DB::table('products')->get();
        return view('admin.product.index', compact('product'));
    }
    public function add(Product $productModel){
        $data = ['newdata' => $productModel::all()];
        return view('admin.product.add', $data);
    }
    public function save(Request $request){
        $products= new Product();
        
        $products->category_id = $request->input('category_id');
        $products->name = $request->input('name');
        $products->small_description = $request->input('small_description');
        $products->description = $request->input('description');
        $products->original_price = $request->input('original_price');
        $products->selling_price = $request->input('selling_price');
        $products->quantity = $request->input('quantity');
        $products->image = $request->input('image');
        $products->status = $request->input('status') == TRUE ? '1':'0';
        $products->save();
        $product = ['list' =>Product::all('category_id', 'name', 'small_description', 'image', 'description','original_price', 'selling_price','quantity', 'status')];
        return redirect('products')->with('status',"Product added succesfully");
    }
}
