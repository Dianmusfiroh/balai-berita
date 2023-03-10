<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use File;
use Illuminate\Support\Facades\Storage;

class BeritaController extends Controller
{
    protected $modul;
    public function __construct()
    {
        $this->modul = 'berita';
    }
    public function index()
    {
        $modul = $this->modul;
        $data = Berita::where('id_balai',Auth::user()->id_balai)->get();
        return view('berita.index',compact('modul','data'));
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'judul'=> 'required',
            'foto'=> 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'deskripsi'=> 'required',
           ]);
        $imageName = time().'.'.$request->foto->extension();  
        $request->foto->storeAs('public/images/informasi/', $imageName);
     
        $post = Berita::create([
            'judul' => $request->judul,
            'foto' => $imageName ,
            'deskripsi' => $request->deskripsi,
            'id_balai' =>Auth::user()->id_balai,
        ]);

        if ($post) {
            return redirect()
                ->route('berita.index')
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
        $post = Berita::findOrFail($id);
        Storage::delete('public/images/informasi/'.$post->foto);
        $post->delete();

        if ($post) {
            return redirect()
                ->route('berita.index')
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
        $data = Berita::find($id);
        return view('berita.edit',compact('data','modul'));
    }
       
    public function update(Request $request, $id_berita, Berita $berita)
    {
        $post = Berita::find($id_berita);
        $imageName = '';
        if ($request->hasFile('foto')) {

          $imageName = time() . '.' . $request->foto->extension();
          $request->foto->storeAs('public/images/informasi/', $imageName);
          if ($post->foto) {
            Storage::delete('public/images/informasi/'.$post->foto);
          }
        } else {
          $imageName = $post->foto;
        }
      
        $post->update([
            'judul' => $request->judul,
            'foto' => $imageName ,
            'deskripsi' => $request->deskripsi,
        ]);

        if ($post) {
            return redirect()
                ->route('berita.index')
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
