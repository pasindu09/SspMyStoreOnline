<?php

namespace App\Http\Controllers;
use App\Models\AdressBook;
use Illuminate\Http\Request;

class AdressBookController extends Controller
{
    public function createAdressBook(Request $request){
        $currentUserId = auth()->user()->id;
        $Book = AdressBook::create([
            'user_id' => $currentUserId,
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'country' => $request->country,
            'street' => $request->street,
            'city' => $request->city,
            'state' => $request->state,
            'zip' => $request->zip
        ]);

      
    

        
        
         return redirect()->route('checkout')
                         ->with('success','A product has been created successfully.');
    }
}
