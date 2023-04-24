<?php

namespace App\Http\Controllers;

use App\Models\Spesifikasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SpesifikasiController extends Controller
{
    protected $modul;
    public function __construct()
    {
        $this->modul = 'spesifikasi';
    }
    public function index()
    {
        $data = Spesifikasi::all();
        $modul = $this->modul;
      return view('spesifikasi.index', compact('data','modul'));
    }
    public function edit($id)
    {
        $data = Spesifikasi::find($id);
        $modul = $this->modul;
      return view('spesifikasi.edit', compact('data','modul'));
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_spesifikasi'=> 'required',
           ]);
     
        $post = Spesifikasi::create([
            'id_balai' => Auth::user()->id_balai,
            'nama_spesifikasi' =>  $request->nama_spesifikasi ,
        
        ]);

        if ($post) {
            return redirect()
            ->route('spesifikasi.index')
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
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nama_spesifikasi' => 'required',
        ]);
        $post = Spesifikasi::findOrFail($id);

        $post->update([
            'nama_spesifikasi' => $request->nama_spesifikasi,
        ]);

        if ($post) {
            return redirect()
                ->route('spesifikasi.index')
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
    public function destroy($id)
    {
        $post = Spesifikasi::findOrFail($id);
        $post->delete();

        if ($post) {
            return redirect()
                ->route('spesifikasi.index')
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
