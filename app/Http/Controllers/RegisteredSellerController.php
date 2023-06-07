<?php

namespace App\Http\Controllers;

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
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:8|confirmed',
    ]);

    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'address' => $request->address,
        'contactnumber'=>$request->contactno,
        'password' => Hash::make($request->password),
        'role' => "1", 
    ]);

    

    return redirect()->route('dashboard');
}




}
