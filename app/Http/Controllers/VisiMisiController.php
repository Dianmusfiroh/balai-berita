<?php

namespace App\Http\Controllers;

use App\Models\VisiMisi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VisiMisiController extends Controller
{
    protected $modul;
    public function __construct()
    {
        $this->modul = 'visimisi';
    }
    public function index()
    {
        $modul = $this->modul;
        $visi = VisiMisi::where('id_balai',Auth::user()->id_balai)
                        ->where('jenis','visi')
                        ->get();
        $misi = VisiMisi::where('id_balai',Auth::user()->id_balai)
                        ->where('jenis','misi')
                        ->get();
        return view('visimisi.index',compact('modul','visi','misi'));
    }}
