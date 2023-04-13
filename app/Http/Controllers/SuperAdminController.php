<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SuperAdminController extends Controller
{
    public function index(){
        if (Auth::user()->role == '2') {
            return view('super_admin.index');
           }
           else{
            return redirect('/home')->with('status','Access denied');
        }
        
    }
    public function search($name){
        if (Auth::user()->role == '2') {
            $users0 = DB::select('SELECT * FROM users where name LIKE %?%', $name);
           }
           else{
            return redirect('/home')->with('status','Access denied');
        }
    }
    public function role(Request $request){
        if (Auth::user()->role == '2') {
            $role = $request->input('role');
            $id = $request->input('id');
            DB::update('UPDATE users set role = ? where id = ?', [$role, $id]);
            return view('super_admin.index');
        }
        else{
            return redirect('/home')->with('status','Access denied');
        }
    }
}
