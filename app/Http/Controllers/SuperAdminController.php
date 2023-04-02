<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
            
           }
           else{
            return redirect('/home')->with('status','Access denied');
        }
    }
    public function role($id){
        if (Auth::user()->role == '2') {
            
           }
           else{
            return redirect('/home')->with('status','Access denied');
        }
    }
}
