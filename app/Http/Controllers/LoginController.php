<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(){
        return view('login');
    }
    public function authenticate(Request $request){
        $validate = $request->validate([
            'password' => 'required',
            'username' => 'required',
        ]);

        if(Auth::attempt($validate)){
            $request->session()->regenerate();
            return redirect('/user');
        }

        return redirect()->back()->with('loginError', "Login Failed!");
    }
    public function register(){
        return view('register')->with('registerSuccess', "You successfully registered!");
    }

    public function payment(){
        $price = session('price');
        return view('payment', compact('price'));
    }
    public function savePayment(Request $request){

        // $u = User::find(auth()->user()->id);
        // $u->wallet = $request->wallet - $request->price;
        // $u->update();

        return redirect('/user');
    }

    public function store(Request $request){
        $validate = $request->validate([
            'username' => 'required|unique:users',
            'password' => 'required',
            'field' => 'required',
            'linkedin' => 'required',
            'phone' => 'required',
            'gender' => 'required',
            'image' => 'required|image|file'
        ]);

        $validate['image'] = $request->file('image')->store('/image');
        $validate['password'] = bcrypt($validate['password']);

        User::create($validate);

        $request->session()->regenerate();

        $price = $request->price;

        return redirect('/payment')->with('price', $price);

    }

    public function logout(){
        Auth::logout();

        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect('/');

    }
}
