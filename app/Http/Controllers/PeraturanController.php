<?php

namespace App\Http\Controllers;

use App\Models\Peraturan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $data = Peraturan::all();
        return view('peraturan.index',compact('modul','data'));
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'judul' => 'required',
            'pdf' =>'required|mimes:csv,txt,xlx,xls,pdf|max:2048',
    
           ]);
    
        //    $name = $request->file('file')->getClientOriginalName();
        
        $fileName = time().'.'.$request->pdf->extension();  
        $request->pdf->move(public_path('uploads'), $fileName);
        $post = Peraturan::create([
            'judul' => $request->judul,
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
        //    $path = $request->file('file')->store('public/files');
    
    
        //    $save = new Peraturan();
    
        //    $save->judul = $name;
        //    $save->pdf = $path;
    
        //    return redirect('file-upload')->with('status', 'File Has been uploaded successfully in laravel 8');
    
    }
}
