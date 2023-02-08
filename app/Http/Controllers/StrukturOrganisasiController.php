<?php

namespace App\Http\Controllers;

use App\Models\BaganStrukurOrganisasi;
use App\Models\StrukurOrganisasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StrukturOrganisasiController extends Controller
{
    protected $modul;
    public function __construct()
    {
        $this->modul = 'strukturOrganisasi';
    }
    public function index()
    {
        $modul = $this->modul;
        $data = StrukurOrganisasi::join('t_bagan_struktur','t_bagan_struktur.id_bagan_struktur','t_struktur.id_bagan_struktur')
                                    ->select('t_struktur.*','t_bagan_struktur.nama AS namaBagan')
                                   ->where('t_bagan_struktur.id_balai',Auth::user()->id_balai)->get();
        $bagan = BaganStrukurOrganisasi::all();
        return view('Struktur.index',compact('modul','data','bagan'));
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required',
            'jabatan' => 'required',
            'id_bagan_struktur' => 'required'
           ]);
        $post = StrukurOrganisasi::create([
            'nama' => $request->nama ,
            'jabatan' =>  $request->jabatan ,
            'id_bagan_struktur' =>  $request->id_bagan_struktur 
        ]);

        if ($post) {
            return redirect()
                ->route('strukturOrganisasi.index')
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
        $post = StrukurOrganisasi::findOrFail($id);
        $post->delete();

        if ($post) {
            return redirect()
                ->route('strukturOrganisasi.index')
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
    public function edit(Request $request,$id)
    {
        $modul = $this->modul;
        $data = StrukurOrganisasi::find($id);
        $bagan = BaganStrukurOrganisasi::all();
        return view('Struktur.edit',compact('data','modul','bagan'));
    }
       
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nama' => 'required',
            'jabatan' => 'required',
            'id_bagan_struktur' => 'required'
        ]);
        $post = StrukurOrganisasi::findOrFail($id);

        $post->update([
            'nama' => $request->nama ,
            'jabatan' =>  $request->jabatan ,
            'id_bagan_struktur' =>  $request->id_bagan_struktur 
        ]);

        if ($post) {
            return redirect()
                ->route('strukturOrganisasi.index')
                ->with([
                    'success' => 'Data Berhasil Diubah'
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
