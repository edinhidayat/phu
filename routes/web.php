<?php

use App\Http\Controllers\AgendaPendaftaranController;
use App\Http\Controllers\AwalController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BankController;
use App\Http\Controllers\BasicController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PejabatController;
use App\Http\Controllers\PelimpahanController;
use App\Http\Controllers\PembatalanController;
use App\Http\Controllers\RekapbatalController;
use App\Http\Controllers\RekappelimpahanController;
use App\Http\Controllers\TahunController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VerifikatorController;
use App\Http\Controllers\WilayahController;
use App\Http\Controllers\WordBatalController;
use App\Http\Controllers\WordPelimpahanController;

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

Route::get('/', [AwalController::class, 'index']);
Route::get('/surat', [AwalController::class, 'surat']);
Route::get('/surat/{id}', [AwalController::class, 'baca']);
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/dash', function () {
    return view('dash.v_dash', [
        'title' => 'Dashboard | Seksi PHU'
    ]);
})->middleware('auth');
Route::get('/dash/basic', [BasicController::class, 'index'])->middleware('auth');

Route::resource('/dash/tahun', TahunController::class)->middleware('auth')->except('show');
Route::resource('/dash/bank', BankController::class)->middleware('auth')->except('show');
Route::resource('/dash/petugas', VerifikatorController::class)->middleware('auth')->except('show');
Route::resource('/dash/pejabat', PejabatController::class)->middleware('auth')->except('show');
Route::resource('/dash/user', UserController::class)->middleware('auth')->except('show');
Route::resource('/dash/agenda', AgendaPendaftaranController::class)->middleware('auth');
Route::resource('/dash/batal', PembatalanController::class)->middleware('auth');
Route::resource('/dash/pelimpahan', PelimpahanController::class)->middleware('auth');
Route::post('/dash/pelimpahan/getkabupaten', [WilayahController::class, 'getkabupaten'])->name('getkabupaten')->middleware('auth');
Route::post('/dash/pelimpahan/getkecamatan', [WilayahController::class, 'getkecamatan'])->name('getkecamatan')->middleware('auth');
Route::post('/dash/pelimpahan/getkelurahan', [WilayahController::class, 'getkelurahan'])->name('getkelurahan')->middleware('auth');
Route::get('/dash/batal/word/{id}', [WordBatalController::class, 'index'])->middleware('auth');
Route::get('/dash/pelimpahan/word/{id}', [WordPelimpahanController::class, 'index'])->middleware('auth');
Route::controller(RekapbatalController::class)->group(function () {
    Route::get('/dash/rekapbatal', 'index');
    Route::get('/dash/rekapbatal/{data}', 'tampilkan');
    Route::get('/dash/rekapbatal/proses/{data}', 'sumber');
    Route::get('/dash/rekapbatal/edit/{data}/{proses}/{tgl}', 'update');
    Route::get('/dash/rekapbatal/ubah/{data}/{proses}/{tgl}', 'updatelagi');
    Route::get('/cetakrb', 'cetak');
})->middleware('auth');
Route::controller(RekappelimpahanController::class)->group(function () {
    Route::get('/dash/rekappelimpahan', 'index');
    Route::get('/dash/rekappelimpahan/{data}', 'tampilkan');
    Route::get('/dash/rekappelimpahan/proses/{data}', 'sumber');
    Route::get('/dash/rekappelimpahan/edit/{data}/{proses}/{tgl}', 'update');
    Route::get('/dash/rekappelimpahan/ubah/{data}/{proses}/{tgl}', 'updatelagi');
    Route::get('/cetakrp', 'cetak');
})->middleware('auth');
