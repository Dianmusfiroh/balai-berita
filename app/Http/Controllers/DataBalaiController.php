<?php

namespace App\Http\Controllers;

use App\Models\Balai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DataBalaiController extends Controller
{
    protected $modul;
    public function __construct()
    {
        $this->modul = 'dataBalai';
    }
    public function index()
    {
        $modul = $this->modul;
        $data = Balai::find(Auth::user()->id_balai);
        return view('dataBalai.index',compact('modul','data'));
    }
}
