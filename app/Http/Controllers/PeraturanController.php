<?php

namespace App\Http\Controllers;

use App\Models\Peraturan;
use App\Models\User;
use File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PeraturanController extends Controller
{
    protected $modul;
    public function __construct()
    {
        $this->modul = 'peraturan';
    }
    public function index()
    {
        $modul = $this->modul;
    $data = Peraturan::where('id_balai',Auth::user()->id_balai)->get();
        return view('peraturan.index',compact('modul','data'));
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'judul' => 'required',
            'pdf' =>'required|mimes:csv,txt,xlx,xls,pdf|max:2048',
    
           ]);
        $fileName = time().'.'.$request->pdf->extension();  
        $request->pdf->move(public_path('uploads'), $fileName);
        $post = Peraturan::create([
            'judul' => $request->judul,
            'jenis' => $request->jenis,
            'tahun' => $request->tahun,
            'pdf' => $fileName ,
            'id_balai' =>Auth::user()->id_balai,
        ]);

        if ($post) {
            return redirect()
                ->route('peraturan.index')
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
        $post = Peraturan::findOrFail($id);
        File::delete('uploads/'.$post->pdf);
        $post->delete();

        if ($post) {
            return redirect()
                ->route('peraturan.index')
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
