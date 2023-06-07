<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController2 extends Controller
{
    /**
     * Display a listing of the resource.
     */
   public function index()
{
    $users = User::where('role', 1)->get();

    return view('admin.createseller', compact('users'));
}



public function create()
{
    return view('admin.addnewuserseller');
}


    public function store(Request $request)
    {
     
        $request->validate([
            'password' => 'required|string|min:8',
            'name' => 'required|string|max:255',
            'email' => 'required|string|email:rfc,dns|max:255|unique:users',
        ]);

        $User = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);
        
        return redirect('/usersseller');
    }

    public function edit($id)
    {
        $usercreated = User::find($id);
        return view('admin.editseller',compact('usercreated'));
    }
  
    public function update(Request $request, $id)
    {
    $user = User::find($id);

    $request->validate([
        'password' => 'required|string|min:8',
    ]);

    $user->password = Hash::make($request->password);
    $user->save();

    return redirect('/usersseller');
    
    }

    public function destroy($id)
    {
        User::destroy($id);
        return redirect('usersseller');
    }
    
}
