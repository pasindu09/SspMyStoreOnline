<?php

namespace App\Http\Controllers;

use App\Models\sellers;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisteredSellerController extends Controller
{
    public function createSeller(){
        return view('auth.registerseller');

    }

    public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:100|unique:users',
        'password' => 'required|string|min:8|confirmed',
        'contactno' => 'required|unique:users',

    ]);

    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'address' => $request->address,
        'contactno'=>$request->contactno,
        'password' => Hash::make($request->password),
        'role' => "1", 

    ]);

    if ($user){
        $seller = sellers::create([
            'user_id' => $user->id, 
        ]);
    }
    

     return redirect()->route('dashboard');
   
   
}

public function storeinsellertable(Request $request)
{
           
}




    }
