<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index(){
        $users = User::all();

        return view('home', compact('users'));
    }

    public function user(){
        $id = auth()->user()->id;


        $users = User::where('id', '!=', $id)
        ->get();

        return view('home', compact('users'));
    }
}
