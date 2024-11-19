<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function show() 
    { 
        $user = Auth::user(); 
        return view('auth.profile', compact('user')); 
    } 
    public function update(Request $request) 
    { 
        $user = Auth::user(); 
        
        $request->validate([ 
            'name' => 'required|string|max:255', 
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id, 
            'password' => 'nullable|string|min:8|confirmed', 
        ]);
        
        $user->name = $request->name; 
        $user->email = $request->email; 
        
        if ($request->filled('password')) { 
            $user->password = bcrypt($request->password); 
        } 
        
        $user->save(); 
    
        return back()->with('success', 'Profile updated successfully.');
    }
}