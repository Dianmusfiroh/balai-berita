<?php

namespace App\Http\Controllers;

use App\Models\Balai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $balai = Balai::find(Auth::user()->id_balai);
        
        return view('home',compact('balai'));
    }
}
