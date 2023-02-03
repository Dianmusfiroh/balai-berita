<?php

namespace App\Http\Controllers;

use App\Models\Balai;
use App\Models\User;
use Illuminate\Http\Request;

class DataPetugasController extends Controller
{
    protected $modul;
    public function __construct()
    {
        $this->modul = 'dataPetugas';
    }
    public function index()
    {
        $modul = $this->modul;
        $balai = Balai::all();
        $data = User::all();
        return view('dataPetugas.index',compact('modul','balai','data'));
    }
    public function store(Request $request)
    {
        if (empty($request->id_balai)) {

            $this->validate($request, [
                'name' => 'required',
                'email' => 'required',
                'role' => 'required',
                'password' => 'required',
            ]);
    
            $post = User::create([
                'name' => $request->name,
                'email' =>$request->email,
                'role' => $request->role,
                'password' => bcrypt($request->password),
            ]);
        } else {
            $this->validate($request, [
                'name' => 'required',
                'email' => 'required',
                'role' => 'required',
                'password' => 'required',
                'id_balai' => 'required',
            ]);
    
            $post = User::create([
                'name' => $request->name,
                'email' =>$request->email,
                'role' => $request->role,
                'password' => bcrypt($request->password),
                'id_balai' => $request->id_balai
            ]);
        }
        
        
      

        if ($post) {
            return redirect()
                ->route('dataPetugas.index')
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
        $post = User::findOrFail($id);
        $post->delete();
        if ($post) {
            return redirect()
                ->route('dataPetugas.index')
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
