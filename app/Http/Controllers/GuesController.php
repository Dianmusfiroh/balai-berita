<?php

namespace App\Http\Controllers;

use App\Models\BaganStrukurOrganisasi;
use App\Models\Balai;
use App\Models\Berita;
use App\Models\Kawasan;
use App\Models\Peraturan;
use App\Models\StrukurOrganisasi;
use App\Models\VisiMisi;
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
    public function detailBalai($id)
    {
        $dataBalai = Balai::find($id);
        $visi = VisiMisi::where('id_balai',$id)
                ->where('jenis','visi')
                ->get();
        $misi = VisiMisi::where('id_balai',$id)
                ->where('jenis','misi')
                ->get();        
        $peraturan = Peraturan::where('id_balai',$id)->get(); 
        $informasi = Berita::where('id_balai',$id)->get(); 
        $kawasan = Kawasan::where('id_balai',$id)->get();
        // $stuktur = StrukurOrganisasi::where('id_balai',$id)->get();
        $baganStruktur = BaganStrukurOrganisasi::where('id_balai',$id)->get();
        return view('detailProfilBalai',compact('baganStruktur','dataBalai','visi','misi','peraturan','informasi','kawasan'));
    }
    public function detailBerita($id)
    {
        $berita = Berita::find($id);
        return view('detailBerita',compact('berita'));
    }
    public function detailKawasan($id)
    {
        $kawasan = Kawasan::find($id);
        return view('detailKawasan',compact('kawasan'));
    }
}
