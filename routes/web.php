<?php

use App\Models\Pelaporan;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Siswa;

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

Route::get('/', function (Request $request) {
    $keyword = $request->keyword;
    $siswa = Siswa::where('nisn', 'LIKE', '%' . $keyword . '%')->orWhere('nama', 'LIKE', '%' . $keyword . '%')->latest()->get();

    return view('welcome', compact(['siswa']));
});

Route::get('/profile', function (Request $request) {
    $keyword = $request->keyword;
    $pelaporans = Pelaporan::where('siswa_id', 'LIKE', '%' . $keyword . '%')->orWhere('lokasi', 'LIKE', '%' . $keyword . '%')->latest()->get();

    return view('profile', compact(['pelaporans']));
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('siswa', 'SiswaController')->middleware('auth');

Route::get('datasiswa', 'SiswaController@show');

Route::get('/user/siswa', 'SiswaController@siswaUser')->middleware('auth');



Route::resource('kategori', 'KategoriController')->middleware('auth');

Route::resource('pelaporan', 'PelaporanController')->middleware('auth');

Route::resource('aspirasi', 'AspirasiController')->middleware('auth');


Route::get('/print', 'PelaporanController@print')->name('pelaporan.print')->middleware('auth');

Route::get('/detail', function (Request $request) {
    $keyword = $request->keyword;
    $pelaporans = Pelaporan::where('siswa_id', 'LIKE', '%' . $keyword . '%')->orWhere('lokasi', 'LIKE', '%' . $keyword . '%')->latest()->get();

    return view('detail', compact(['pelaporans']));
});
