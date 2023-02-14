<?php

use App\Http\Controllers\BaganStrukturOrganisasiController;
use App\Http\Controllers\BalaiController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\DataBalaiController;
use App\Http\Controllers\DataPetugasController;
use App\Http\Controllers\GuesController;
use App\Http\Controllers\KawasanController;
use App\Http\Controllers\KeluhanController;
use App\Http\Controllers\PeraturanController;
use App\Http\Controllers\StrukturOrganisasiController;
use App\Http\Controllers\TugasBalaiController;
use App\Http\Controllers\VisiMisiController;
use App\Models\Berita;
use App\Models\Kawasan;
use App\Models\Peraturan;
use App\Models\VisiMisi;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
  Route::get('/detailProfilBalai', function () {
    return view('detailProfilBalai');
})->name('detailProfilBalai');
      
Route::get('/', [GuesController::class, 'index'])->name('gues');

Auth::routes(['verify' => true]);
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::resource('profilBalai', BalaiController::class);
    Route::resource('dataPetugas', DataPetugasController::class);
    Route::resource('dataMaster/strukturOrganisasi', StrukturOrganisasiController::class);
    Route::resource('dataMaster/baganstrukturOrganisasi', BaganStrukturOrganisasiController::class);
    Route::resource('dataMaster/peraturan', PeraturanController::class);
    Route::resource('dataMaster/tugasBalai', TugasBalaiController::class);
    Route::resource('dataMaster/dataBalai', DataBalaiController::class);
    Route::resource('dataMaster/kawasan', KawasanController::class);
    Route::resource('dataMaster/visimisi', VisiMisiController::class);
    Route::resource('berita', BeritaController::class);
    Route::resource('keluhan', KeluhanController::class);
    Route::post('dataMaster/dataBalai/storeAlamat', [DataBalaiController::class, 'storeAlamat'])->name('storeAlamat');
    Route::post('dataMaster/dataBalai/storeFoto', [DataBalaiController::class, 'storeFoto'])->name('storeFoto');
    Route::post('dataMaster/dataBalai/storeLogo', [DataBalaiController::class, 'storeLogo'])->name('storeLogo');
    Route::post('dataMaster/dataBalai/storeDeskripsi', [DataBalaiController::class, 'storeDeskripsi'])->name('storeDeskripsi');
    Route::get('dataMaster/dataBalai/{id}/editNamaBalai', [DataBalaiController::class, 'editNamaBalai'])->name('editNamaBalai');
    Route::put('dataMaster/dataBalai/{id}/storeNamaBalai', [DataBalaiController::class, 'storeNamaBalai'])->name('storeNamaBalai');
    Route::put('dataMaster/dataBalai/{id}/updateAlamat', [DataBalaiController::class, 'storeAlamat'])->name('updateAlamat');
    Route::get('dataMaster/dataBalai/{id}/editAlamat', [DataBalaiController::class, 'editAlamat'])->name('editAlamat');
    Route::get('dataMaster/dataBalai/{id}/editFoto', [DataBalaiController::class, 'editFoto'])->name('editFoto');
    Route::put('dataMaster/dataBalai/{id}/updateFoto', [DataBalaiController::class, 'uploadFoto'])->name('updateFoto');
    Route::get('dataMaster/dataBalai/{id}/editDeskripsi', [DataBalaiController::class, 'editDeskripsi'])->name('editDeskripsi');
    Route::put('dataMaster/dataBalai/{id}/updateDeskripsi', [DataBalaiController::class, 'storeDeskripsi'])->name('updateDeskripsi');
    Route::post('dataMaster/dataBalai/storeVisi', [DataBalaiController::class, 'storeVisi'])->name('storeVisi');
    Route::post('dataMaster/dataBalai/storeMisi', [DataBalaiController::class, 'storeMisi'])->name('storeMisi');
    Route::get('dataMaster/dataBalai/{id}/editVisi', [DataBalaiController::class, 'editVisi'])->name('editVisi');
    Route::put('dataMaster/dataBalai/{id_visi_misi}/updateVisi', [DataBalaiController::class, 'updateVisi'])->name('updateVisi');
    Route::get('dataMaster/dataBalai/{id}/editMisi', [DataBalaiController::class, 'editMisi'])->name('editMisi');
    Route::get('keluhan/{id}/tanggapan', [KeluhanController::class, 'tanggapan'])->name('tanggapan');
    // Route::put('dataMaster/dataBalai/{id_visi_misi}/updateMisi', [DataBalaiController::class, 'updateMisi'])->name('updateMisi');
     
});