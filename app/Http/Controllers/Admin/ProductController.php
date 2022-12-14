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
        //$product = DB::table('products')->get();
        //return view('admin.product.index', compact('product'));
        $product = Product::all();
        return view('admin.product.index')->with('product', $product);
    }
    public function add(Product $productModel){
        return view('admin.product.add');
    }
    public function save(Request $request){
        
        //$requestData = $request->all();
        //$fileName = time().$request->file('image')->getClientOriginalName();
        //$path = $request->file('image')->storeAs('images', $fileName, 'public');
        //$requestData["image"] = '/storage/images/'.$path;
        //Product::create($requestData);
        //return redirect('products')->with('flash_message',"Product added succesfully");


        $request->validate([
            'image' => 'required|mimes:png,jpg,jpeg|max:5048'
        ]);

        $newImageName = time() . '-' . $request->name . '.' . $request->image->extension();

        $request->image->extension();

        $request->image->move(public_path('images'), $newImageName);

        $product = Product::create([
            'category_id' => $request->input('category_id'),
            'name' => $request->input('name'),
            'small_description' => $request->input('small_description'),
            'description' => $request->input('description'),
            'original_price' => $request->input('original_price'),
            'selling_price' => $request->input('selling_price'),
            'image' => $newImageName,
            'quantity' => $request->input('quantity'),
            'status' => $request->input('status'),
            
        ]);

        return redirect('/products/add');
    }
    public function edit($id){
        $product = DB::select('select * from products where id=?',[$id]);
        return view('product.edit', ['product'=>$product]);
    }
    public function update(Request $request, $id){
        $category_id=$request->get('category_id');
        $name=$request->get('name');
        $small_description=$request->get('small_description');
        $description=$request->get('description');
        $original_price=$request->get('original_price');
        $selling_price=$request->get('selling_price');
        $image=$request->get('image');
        $quantity=$request->get('quantity');
        $status=$request->get('status');

        $product = DB::update('update products set category_id=?, name=?, small_description=?, description=?, 
        description=?, original_price=?, selling_price=?, image=?, quantity=?, status=? where id=?',[$category_id, $name, $small_description,
         $description, $original_price, $selling_price, $image, $quantity, $status]);


        if($product){
            $redirect = redirect('products')->with('success');
        }else{
            $redirect = redirect('products.edit')->with('error');
        }
        return $redirect;
    }
    public function delete($id){

        $product = DB::delete('delete from products where id=?', [$id]);
        $redirect = redirect('main/listusers');
        return $redirect('products');
    }
}
