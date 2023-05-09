<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function index(){
        $product = Product::all();
        return view('admin.product.index')->with('product', $product);
    }
    public function list(){
        $product = DB::select('SELECT * from products WHERE status=1');
        return view('products-list')->with('product', $product);
    }
    public function details($slug, $image){
        $product = Product::where('image', 'LIKE', '%'.$image.'%')->get();
        return view('products-details',  ['product'=>$product, 'image'=>$image, 'slug'=>$slug]);
    }
    public function add(){
        return view('admin.product.add');
    }
    public function save(Request $request){
        if($request->image != NULL){
            $request->validate([
                'image' => 'required|mimes:png,jpg,jpeg,webp|max:2000000'
            ]);
            $newImageName = time() . '-' . $request->name . '.' . $request->image->extension();
            $request->image->extension();
            $request->image->move(public_path('images'), $newImageName);
            }else{
                $newImageName=NULL;
            }

        Product::create([
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
        $product = DB::select('SELECT * from products where id=?', [$id]);
        return view('admin.product.edit', ['product'=>$product], ['id'=>$id]);
    }
    public function update(Request $request, $id){

        $category_id=$request->get('category_id');
        $name=$request->get('name');
        $small_description=$request->get('small_description');
        $description=$request->get('description');
        $original_price=$request->get('original_price');
        $selling_price=$request->get('selling_price');
        $quantity=$request->get('quantity');
        $status=$request->get('status');
        $image=$request->input('image');

        if($request->image != NULL){
            $request->validate([
                'image' => 'required|mimes:png,jpg,jpeg,webp|max:2000000'
            ]);
            $newImageName = time() . '-' . $request->name . '.' . $request->image->extension();
            $request->image->extension();
            $request->image->move(public_path('images'), $newImageName);
        }
        else{
                $newImageName=NULL;
            }
            
            if($newImageName == NULL){
                $product = DB::update('update products set category_id=?, name=?, small_description=?, description=?, 
                original_price=?, selling_price=?, quantity=?, status=? where id=?',[$category_id, $name, $small_description,
                 $description, $original_price, $selling_price, $quantity, $status, $id]);
            }
            else{
                $product = DB::update('update products set category_id=?, name=?, small_description=?, description=?, 
        original_price=?, selling_price=?, image=?, quantity=?, status=? where id=?',[$category_id, $name, $small_description,
         $description, $original_price, $selling_price, $newImageName, $quantity, $status, $id]);
            }
            if($product){
                $redirect = redirect('products')->with('success');
            }else{
                $redirect = redirect('products.edit')->with('error');
            }
            return $redirect;
    }
    public function delete($id){
        DB::delete('delete from products where id=?', [$id]);
        return redirect('products');
    }
}
