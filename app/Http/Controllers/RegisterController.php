<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register.index',[
            'title' => 'Register',

        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'username'=> 'required|min:6|max:255',
            'password'=> 'required|min:6|max:30' 
        ]);

        //$validatedData['password'] = bcrypt($validatedData['$password']);

        $validatedData['password'] = Hash::make($validatedData['password']);

        User::create($validatedData);

        // $request->session()->flash('pesan', 'Regitrastion Successfull! Please Login');

        return redirect()->route('login')->with('pesan','Regitrastion Successfull! Please Login');

        // return redirect('/login');
    }
}
