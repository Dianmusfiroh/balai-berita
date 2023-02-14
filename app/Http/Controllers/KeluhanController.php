<?php

namespace App\Http\Controllers;

use App\Models\Keluhan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KeluhanController extends Controller
{
    protected $modul;
    public function __construct()
    {
        $this->modul = 'keluhan';
    }
    public function index()
    {
        $modul = $this->modul;
        $data = Keluhan::where('id_balai',Auth::user()->id_balai)->get();
        return view('keluhan.index',compact('modul','data'));
    }
    public function destroy(){

    }
}
