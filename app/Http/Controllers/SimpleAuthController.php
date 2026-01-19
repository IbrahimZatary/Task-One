<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SimpleAuthController extends Controller
{
    // Show login form
    public function showLogin()
    {
        return view('home');
    }

    // Handle login
    public function login(Request $request)
    {
        $request->validate([
            'name' => 'required|string'
        ]);

     
        if (strtolower($request->name) === 'ibraheem') {
            // Set ibraheem as admin
            session(['user_name' => $request->name]);
            session(['user_role' => 'admin']);
            
            return redirect()->route('categories.index');
        } else {
            // show 404 as message
            abort(404, 'Access Denied.');
        }
    }










    
    // Logout
    public function logout()
    {
        session()->forget(['user_name', 'user_role']);
        return redirect()->route('simple.login');
    }
}