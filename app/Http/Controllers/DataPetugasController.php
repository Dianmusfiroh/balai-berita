<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DataPetugasController extends Controller
{
    protected $modul;
    public function __construct()
    {
        $this->modul = 'dataPetugas';
    }
    public function index()
    {
        $modul = $this->modul;
        return view('dataPetugas.index',compact('modul'));
    }
    
}
