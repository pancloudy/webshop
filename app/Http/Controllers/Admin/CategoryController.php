<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        return view('admin.category.index');
    }
    public function add(){
        return view('admin.category.add');
    }
    public function insert(Request $request){
        $category = new Category();
        if($request->hasFile('image')){
            $file=$request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('assets/uploads/category',$filename);
            $category->image = $filename;
        }
        $category->name = $request->input('name');
        $category->description = $request->input('description');
        $category->slug = $request->input('slug');
        $category->status = $request->input('status') == TRUE ? '1':'0';
    }
}
