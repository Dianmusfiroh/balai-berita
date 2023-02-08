<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use File;

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
        $request->foto->move(public_path('images'), $imageName);
     
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
        File::delete('images/'.$post->foto);
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
       
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'judul'=> 'required',
            'foto'=> 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'deskripsi'=> 'required',
        ]);
        $post = Berita::findOrFail($id);
        if ($image = $request->file('foto')) {
            $destinationPath = 'images/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $post['foto'] = "$profileImage";
        }else{
            unset($input['foto']);
        }
         
        $post->update([
            'judul' => $request->judul,
            'foto' => $profileImage ,
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
