<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;

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
        $logged_in_user = Auth::id();
        $users = User::where('id','!=',$logged_in_user)->orderBy('name','asc')->get();//asc or desc order a dekhte caile ei query chalate hobe
        // $total_users = User::count();
        return view('home', compact('users'));
    }
}
