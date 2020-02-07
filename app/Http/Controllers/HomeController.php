<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // $users = User::all(); //All the records that store in users table

        // $users =User::orderBy('id','desc')->get();
        $users = User::orderBy('name','asc')->get();//asc or desc order a dekhte caile ei query chalate hobe
        // $total_users = User::count();
        return view('home', compact('users'));
    }
}
