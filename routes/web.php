<?php

use App\Http\Controllers\AbsenController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MapelController;
use App\Http\Controllers\SiswaController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//login
Route::get('/', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

// logout
Route::get('/logout', [LoginController::class, 'logout']);


Route::middleware('auth')->group(function () {
    // dashboard
    Route::get('/dashboard', [LoginController::class, 'dashboard']);

    // guru
    Route::get('/guru', [GuruController::class, 'index'])->name('tambahguru');
    Route::post('/guru/tambah', [GuruController::class, 'insert']);
    Route::get('/guru/data', [GuruController::class, 'data'])->name('dataguru');
    Route::get('/guru/edit/{id}', [GuruController::class, 'edit'])->name('editguru');
    Route::post('/guru/edit', [GuruController::class, 'update']);
    Route::get('/guru/delete/{id}', [GuruController::class, 'hapus']);

    // jurusan
    Route::get('/jurusan', [JurusanController::class, 'index'])->name('jurusan');
    Route::post('/jurusan/tambah', [JurusanController::class, 'insert']);
    Route::get('/jurusan/data', [JurusanController::class, 'data'])->name('datajurusan');
    Route::get('/jurusan/edit/{id}', [JurusanController::class, 'edit'])->name('editjurusan');
    Route::post('/jurusan/update', [JurusanController::class, 'update']);
    Route::get('/jurusan/hapus/{id}', [JurusanController::class, 'delete']);

    // kelas
    Route::get('/kelas', [KelasController::class, 'index'])->name('kelastambah');
    Route::post('/kelas/tambah', [KelasController::class, 'insert']);
    Route::get('/kelas/edit/{id}', [KelasController::class, 'edit'])->name('kelasEdit');
    Route::post('/kelas/update', [KelasController::class, 'update']);
    Route::get('/kelas/hapus/{id}', [KelasController::class, 'delete']);

    // mapel
    Route::get('/mapel', [MapelController::class, 'index'])->name('mapel');
    Route::get('/mapel/tam', [MapelController::class, 'create']);
    Route::post('/mapel/tambah', [MapelController::class, 'insert']);
    Route::get('/mapel/edit/{id}', [MapelController::class, 'edit'])->name('mapelEdit');
    Route::post('/mapel/update', [MapelController::class, 'update']);
    Route::get('/mapel/hapus/{id}', [MapelController::class, 'delete']);

    // siswa
    Route::get('/siswa', [SiswaController::class, 'index'])->name('siswa');
    Route::post('/siswa', [SiswaController::class, 'insert']);
    Route::get('/siswa/data', [SiswaController::class, 'data'])->name('siswaData');
    Route::get('/siswa/edit/{id}', [SiswaController::class, 'edit'])->name('editSiswa');
    Route::post('/siswa/update', [SiswaController::class, 'update']);
    Route::get('/siswa/hapus/{id}', [SiswaController::class, 'delete']);

    // absen
    Route::get('/absensi', [AbsenController::class, 'index']);
    Route::get('/data-kelas/{id}', [AbsenController::class, 'kelas']);
    Route::get('/absen-murid/{id}', [AbsenController::class, 'datasiswa'])->name('dataabsen');
    Route::get('/absen-jurusan', [AbsenController::class, 'lap_jurusan']);
    Route::get('/absen-kelas/{id}', [AbsenController::class, 'lap_kelas']);
    Route::get('/data-absen/{id}', [AbsenController::class, 'dataabsen']);
    Route::get('/absensi/data/absen/alfa/{id}', [AbsenController::class, 'absenalfa']);
    Route::get('/absensi/data/absen/izin/{id}', [AbsenController::class, 'absenizin']);
    Route::get('/absensi/data/absen/hadir/{id}', [AbsenController::class, 'absenhadir']);
    Route::get('/absensi/data/absen/sakit/{id}', [AbsenController::class, 'absensakit']);

    // export
    Route::get('/export/{kelas}', [AbsenController::class, 'export_excel']);
});
