<?php

namespace App\Http\Controllers;

use App\Models\Balai;
use App\Models\Berita;
use App\Models\Peraturan;
use Illuminate\Http\Request;

class GuesController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth');
    }
    public function index(){
        $dataBalai = Balai::all();
        $peraturan = Peraturan::all(); 
        $informasi = Berita::all();
        return view('welcome',compact('dataBalai','peraturan','informasi'));
    }

}
