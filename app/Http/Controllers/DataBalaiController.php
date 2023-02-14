<?php

namespace App\Http\Controllers;

use App\Models\Balai;
use App\Models\VisiMisi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class DataBalaiController extends Controller
{
    protected $modul;
    public function __construct()
    {
        $this->modul = 'dataBalai';
    }
    public function index()
    {
        $modul = $this->modul;
        $data = Balai::find(Auth::user()->id_balai);
        $visi = VisiMisi::where('id_balai',Auth::user()->id_balai)
                        ->where('jenis','visi')
                        ->get();
        $misi = VisiMisi::where('id_balai',Auth::user()->id_balai)
                        ->where('jenis','misi')
                        ->get();
        return view('dataBalai.index',compact('modul','data','visi','misi'));
    }
    public function storeNamaBalai(Request $request,$id){
        $data = Balai::find(Auth::user()->id_balai);
        $data->nama_balai = $request->nama_balai;
        $data->save();
        if ($data) {
            return redirect()
                ->route('dataBalai.index')
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
    public function storeAlamat(Request $request){
        $data = Balai::find(Auth::user()->id_balai);
        $data->alamat = $request->alamat;
        $data->save();
        if ($data) {
            return redirect()
                ->route('dataBalai.index')
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
    public function storeDeskripsi(Request $request){
        $data = Balai::find(Auth::user()->id_balai);
        $data->deskripsi = $request->deskripsi;
        $data->save();
        if ($data) {
            return redirect()
                ->route('dataBalai.index')
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
    public function storeVisi(Request $request){

        $validatedData = $request->validate([
            'deskripsi'=> 'required',
           ]);
        $data = VisiMisi::create([
            'jenis' => 'visi',
            'deskripsi' => $request->deskripsi,
            'id_balai' =>Auth::user()->id_balai,
        ]);

        if ($data) {
            return redirect()
                ->route('dataBalai.index')
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
    public function storeMisi(Request $request){
        $validatedData = $request->validate([
            'deskripsi'=> 'required',
           ]);
        $data = VisiMisi::create([
            'jenis' => 'misi',
            'deskripsi' => $request->deskripsi,
            'id_balai' =>Auth::user()->id_balai,
        ]);

        if ($data) {
            return redirect()
                ->route('dataBalai.index')
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
    public function storeFoto(Request $request){
        $data = Balai::find(Auth::user()->id_balai);
        $imageName = time().'.'.$request->foto_balai->extension();  
        $request->foto_balai->storeAs('public/images/foto_balai/', $imageName);
        $data->foto_balai = $imageName;
        $data->save();
        if ($data) {
            return redirect()
                ->route('dataBalai.index')
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
    public function uploadFoto( Request $request,$id){
        $post = Balai::find($id);
        $imageName = '';
        if ($request->hasFile('foto_balai')) {

          $imageName = time() . '.' . $request->foto_balai->extension();
          $request->foto_balai->storeAs('public/images/foto_balai/', $imageName);
          if ($post->foto_balai) {
            Storage::delete('public/images/foto_balai/'.$post->foto_balai);
          }
        } else {
          $imageName = $post->foto_balai;
        }
      
        $post->update([
            'foto_balai' => $imageName ,
        ]);
        if ($post) {
            return redirect()
                ->route('dataBalai.index')
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
    public function storeLogo(Request $request){
        $data = Balai::find(Auth::user()->id_balai);
        $imageName = time().'.'.$request->logo_balai->extension();  
        $request->logo_balai->storeAs('public/images/logo_balai/', $imageName);
        $data->logo_balai = $imageName;
        $data->save();
        if ($data) {
            return redirect()
                ->route('dataBalai.index')
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
    public function uploadLogo( Request $request,$id){
        $post = Balai::find($id);
        $imageName = '';
        if ($request->hasFile('logo_balai')) {

          $imageName = time() . '.' . $request->logo_balai->extension();
          $request->logo_balai->storeAs('public/images/logo_balai/', $imageName);
          if ($post->logo_balai) {
            Storage::delete('public/images/logo_balai/'.$post->logo_balai);
          }
        } else {
          $imageName = $post->logo_balai;
        }
      
        $post->update([
            'logo_balai' => $imageName ,
        ]);
        if ($post) {
            return redirect()
                ->route('dataBalai.index')
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
    public function editNamaBalai(Request $request,$id)
    {
        $modul = $this->modul;
        $data = Balai::find($id);
        return view('dataBalai.editNamaBalai',compact('data','modul'));
    }
    public function editAlamat(Request $request,$id)
    {
        $modul = $this->modul;
        $data = Balai::find($id);
        return view('dataBalai.editAlamat',compact('data','modul'));
    }
    public function editFoto(Request $request,$id)
    {
        $modul = $this->modul;
        $data = Balai::find($id);
        return view('dataBalai.editFoto',compact('data','modul'));
    }
    public function editDeskripsi(Request $request,$id)
    {
        $modul = $this->modul;
        $data = Balai::find($id);
        return view('dataBalai.editDeskripsi',compact('data','modul'));
    }
    public function editVisi(Request $request,$id_visi_misi)
    {
        $modul = $this->modul;
        $data = VisiMisi::find($id_visi_misi);
        return view('dataBalai.editVisi',compact('data','modul'));
    }

    public function updateVisi( Request $request, $id_visi_misi){
        $data = VisiMisi::find($id_visi_misi);
        $data->deskripsi = $request->deskripsi;
        $data->save();
        if ($data) {
            return redirect()
                ->route('dataBalai.index')
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
    public function editMisi(Request $request,$id_visi_misi)
    {
        $modul = $this->modul;
        $data = VisiMisi::find($id_visi_misi);
        return view('dataBalai.editMisi',compact('data','modul'));
    }

    public function updateMisi( Request $request, $id_visi_misi){
        $data = VisiMisi::find($id_visi_misi);
        $data->deskripsi = $request->deskripsi;
        $data->save();
        if ($data) {
            return redirect()
                ->route('dataBalai.index')
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
}
