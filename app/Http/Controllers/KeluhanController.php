<?php

namespace App\Http\Controllers;

use App\Models\Keluhan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class KeluhanController extends Controller
{
    protected $modul;
    public function __construct()
    {
        $this->modul = 'keluhan';
    }
    public function index()
    {
        $modul = $this->modul;
        $data = Keluhan::where('id_balai',Auth::user()->id_balai)->get();
        return view('keluhan.index',compact('modul','data'));
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id_balai'=> 'required',
            'nama'=> 'required',
            'alamat'=> 'required',
            'no_hp'=> 'required',
            'keluhan'=> 'required',
           ]);
     
        $post = Keluhan::create([
            'id_balai' => $request->id_balai,
            'nama' =>  $request->nama ,
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp,
            'keluhan' => $request->keluhan,
            'status' =>'0',
        ]);

        if ($post) {
            return redirect()
            ->route('gues')
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
    public function tanggapan($id)
    {
        $data = Keluhan::find($id);
        $data->status = '1';
        $data->tanggapan = 'Keluhan Diterima';
        $data->save();
        $link ='https://api.whatsapp.com/send?phone=62{{ $data->no_hp }}&text=Keluhan%20Anda%20Sedang%20Diproses' ;
       return Redirect::to($link);

    }
    public function destroy(){

    }
}
