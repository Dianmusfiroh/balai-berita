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
        $this->modul = 'dataBalai';
    }
    public function index()
    {
        $modul = $this->modul;
        $data = Keluhan::find(Auth::user()->id_balai);
        
        return view('keluhan.index',compact('modul','data'));
    }
}
