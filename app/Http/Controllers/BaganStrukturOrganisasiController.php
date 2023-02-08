<?php

namespace App\Http\Controllers;

use App\Models\BaganStrukurOrganisasi;
use App\Models\StrukurOrganisasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BaganStrukturOrganisasiController extends Controller
{
    protected $modul;
    public function __construct()
    {
        $this->modul = 'baganstrukturOrganisasi';
    }
    public function index()
    {
        $modul = $this->modul;
        $data = BaganStrukurOrganisasi::where('id_balai',Auth::user()->id_balai)->get();
        return view('BaganStruktur.index',compact('modul','data'));
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required',
           ]);
        $post = BaganStrukurOrganisasi::create([
            'nama' => $request->nama ,
            'id_balai' =>Auth::user()->id_balai,
        ]);

        if ($post) {
            return redirect()
                ->route('baganstrukturOrganisasi.index')
                ->with([
                    'success' => 'Data Berhasil Ditambah'
                ]);
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    'toast_error' => 'Terjadi Kesalahan, Mohon Coba Lagi!!!'
                ]);
        }
    }
    public function destroy($id)
    {
        $post = BaganStrukurOrganisasi::findOrFail($id);
        $post->delete();
        DB::table('t_struktur')->where('id_balai',$id)->delete();

        if ($post) {
            return redirect()
                ->route('baganstrukturOrganisasi.index')
                ->with([
                    'success' => 'Data Berhasil Dihapus'
                ]);
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    'toast_error' => 'Terjadi Kesalahan, Mohon Coba Lagi!!!'
                ]);
        }
    }
}
