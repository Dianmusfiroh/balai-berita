<?php

namespace App\Http\Controllers;

use App\Models\Kawasan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use File;
use Illuminate\Support\Facades\Storage;

class KawasanController extends Controller
{
    protected $modul;
    public function __construct()
    {
        $this->modul = 'kawasan';
    }
    public function index()
    {
        $modul = $this->modul;
        $kawasan = Kawasan::where('id_balai',Auth::user()->id_balai)->get();
        return view('kawasan.index',compact('modul','kawasan'));
    }
    public function store(Request $request){
        $validatedData = $request->validate([
            'judul'=> 'required',
            'lokasi' => 'required',
            'foto'=> 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'deskripsi'=> 'required',
           ]);
        $imageName = time().'.'.$request->foto->extension();  
        $request->foto->storeAs('public/images/kawasan/', $imageName);
     
        $data = Kawasan::create([
            'lokasi' => $request->lokasi,
            'judul' => $request->judul,
            'foto' => $imageName ,
            'deskripsi' => $request->deskripsi,
            'id_balai' =>Auth::user()->id_balai,
        ]);
        if ($data) {
            return redirect()
                ->route('kawasan.index')
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
        $post = Kawasan::findOrFail($id);
        Storage::delete('public/images/kawasan/'.$post->foto);
        $post->delete();

        if ($post) {
            return redirect()
                ->route('kawasan.index')
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
        $data = Kawasan::find($id);
        return view('kawasan.edit',compact('data','modul'));
    }
       
    public function update(Request $request, $id_kawasan)
    {
        $post = Kawasan::find($id_kawasan);
        $imageName = '';
        if ($request->hasFile('foto')) {

          $imageName = time() . '.' . $request->foto->extension();
          $request->foto->storeAs('public/images/kawasan/', $imageName);
          if ($post->foto) {
            Storage::delete('public/images/kawasan/'.$post->foto);
          }
        } else {
          $imageName = $post->foto;
        }
        $post->update([
            'judul' => $request->judul,
            'lokasi' => $request->lokasi,
            'foto' => $imageName ,
            'deskripsi' => $request->deskripsi,
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
