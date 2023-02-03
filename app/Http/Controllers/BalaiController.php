<?php

namespace App\Http\Controllers;

use App\Http\Requests\BalaiRequest;
use App\Models\Balai;
use Illuminate\Http\Request;

class BalaiController extends Controller
{
    protected $modul;
    public function __construct()
    {
        $this->modul = 'profilBalai';
    }
    public function index()
    {
        $modul = $this->modul;
        $data = Balai::all();
        return view('balai.index',compact('modul','data'));
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama_balai' => 'required',
        ]);

        $post = Balai::create([
            'nama_balai' => $request->nama_balai,
        ]);

        if ($post) {
            return redirect()
                ->route('profilBalai.index')
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
        $post = Balai::findOrFail($id);
        $post->delete();
        if ($post) {
            return redirect()
                ->route('profilBalai.index')
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
        $data = Balai::find($id);
        return view('balai.edit',compact('data','modul'));
    }
       
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nama_balai' => 'required',
        ]);
        $post = Balai::findOrFail($id);

        $post->update([
            'nama_balai' => $request->nama_balai,
        ]);

        if ($post) {
            return redirect()
                ->route('profilBalai.index')
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
