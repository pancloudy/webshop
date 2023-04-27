<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function index(){
        $category = Category::all();
        return view('admin.category.index')->with('category', $category);
    }
    public function list(){
        $category = Category::all();
        return view('categories-list')->with('category', $category);
    }
    
    public function add(){
        return view('admin.category.add');
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
        
        $category = Category::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'slug' => $request->input('slug'),
            'status' => $request->input('status'),
            'image' => $newImageName,
        ]);


        return redirect('/categories/add');
    }
    public function edit($id){
       
        $category = DB::select('SELECT * from categories where id=?', [$id]);
        return view('admin.category.edit', ['category'=>$category], ['id'=>$id]);
    }
    public function update(Request $request, $id){

        $name=$request->get('name');
        $description=$request->get('description');
        $slug=$request->get('slug');
        $status=$request->get('status');


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
                $category = DB::update('update categories set name=?, description=?, 
                slug=?, status=? where id=?',[$name, $description, $slug, $status, $id]);
            }
            else{
                $category = DB::update('update categories set name=?, description=?,
             slug=?, status=?, image=? where id=?',[$name, $description, $slug, $status, $newImageName, $id]);
            }


        if($category){
            $redirect = redirect('categories')->with('success');
        }else{
            $redirect = redirect('category.edit')->with('error');
        }
        return $redirect;
    }
    public function delete($id){

        $category = DB::delete('delete from categories where id=?', [$id]);
        return redirect('categories');
    }
    public function select(Request $request){
        $categ_id = $request->input('id');
        return view('categories-products-list', compact('categ_id'));
    }
}

