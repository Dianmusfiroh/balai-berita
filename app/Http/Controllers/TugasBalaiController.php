<?php

namespace App\Http\Controllers;

use App\Models\TugasBalai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TugasBalaiController extends Controller
{
    protected $modul;
    public function __construct()
    {
        $this->modul = 'tugasBalai';
    }
    public function index()
    {
        $modul = $this->modul;
        $data = TugasBalai::all();
        return view('tugasBalai.index',compact('modul','data'));
    }
    public function store(Request $request)
    {
    $validatedData = $request->validate([
            'nama_tugas' => 'required',
          
           ]);
        $post = TugasBalai::create([
            'nama_tugas' => $request->nama_tugas ,
            'id_balai' =>  Auth::user()->id_balai ,
        ]);

        if ($post) {
            return redirect()
                ->route('tugasBalai.index')
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
        $post = TugasBalai::findOrFail($id);
        $post->delete();

        if ($post) {
            return redirect()
                ->route('tugasBalai.index')
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
}}
