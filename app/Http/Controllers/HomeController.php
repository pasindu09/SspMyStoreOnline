<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        if (Auth::check()) {
            $role = Auth::user()->role;

            if ($role == '1') {
                return view('seller.dashboard');
            } elseif ($role == '2') {
                return view('admin.dashboard');
            } else {
                return view('dashboard');
            }
        } 
    }
}
