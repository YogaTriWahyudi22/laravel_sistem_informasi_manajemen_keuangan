<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BiayaLainController;
use App\Http\Controllers\DSPController;
use App\Http\Controllers\GajiController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\KelolaAkunController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\PKLController;
use App\Http\Controllers\SeragamController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\Uang_SPPController;
use App\Http\Controllers\UjianController;

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

Route::get('/', function () {
    return view('halaman_utama.index');
});

Route::prefix('auth')->group(function () {
    Route::get('login', [AuthController::class, 'login'])->name('login');
    Route::POST('proses_login', [AuthController::class, 'proses_login'])->name('proses_login');
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
});

Route::get('logout', [AuthController::class, 'logout'])->name('logout');

Route::group(['middleware' => 'auth'], function () {
    Route::get('admin', [AuthController::class, 'admin'])->name('admin');
    Route::get('bendahara', [AuthController::class, 'bendahara'])->name('bendahara');
    Route::get('kepsek', [AuthController::class, 'kepsek'])->name('kepsek');
    Route::get('ketua_yayasan', [AuthController::class, 'ketua_yayasan'])->name('ketua_yayasan');
    Route::POST('logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('dashboard', [KelolaAkunController::class, 'dashboard'])->name('dashboard');

    Route::prefix('kelola_akun')->group(function () {
        Route::get('index', [KelolaAkunController::class, 'index'])->name('kelola_akun');
        Route::get('tambah', [KelolaAkunController::class, 'create'])->name('akun_tambah');
        Route::POST('tambah', [KelolaAkunController::class, 'store'])->name('akun_tambah');
        Route::get('edit/{id}', [KelolaAkunController::class, 'edit'])->name('akun_edit');
        Route::POST('edit/{id}', [KelolaAkunController::class, 'update'])->name('akun_edit');
        Route::DELETE('hapus/{id}', [KelolaAkunController::class, 'destroy'])->name('akun_hapus');
    });

    Route::prefix('siswa')->group(function () {
        Route::get('index', [SiswaController::class, 'index'])->name('siswa');
        Route::get('tambah', [SiswaController::class, 'create'])->name('siswa_tambah');
        Route::POST('tambah', [SiswaController::class, 'store'])->name('siswa_tambah');
        Route::get('edit/{id}', [SiswaController::class, 'edit'])->name('siswa_edit');
        Route::POST('edit/{id}', [SiswaController::class, 'update'])->name('siswa_edit');
        Route::DELETE('hapus/{id}', [SiswaController::class, 'destroy'])->name('siswa_hapus');
    });

    Route::prefix('guru')->group(function () {
        Route::get('index', [GuruController::class, 'index'])->name('guru');
        Route::get('tambah', [GuruController::class, 'create'])->name('guru_tambah');
        Route::POST('tambah', [GuruController::class, 'store'])->name('guru_tambah');
        Route::get('edit/{id}', [GuruController::class, 'edit'])->name('guru_edit');
        Route::POST('edit/{id}', [GuruController::class, 'update'])->name('guru_edit');
        Route::DELETE('hapus/{id}', [GuruController::class, 'destroy'])->name('guru_hapus');
    });

    Route::prefix('kelas')->group(function () {
        Route::get('index', [KelasController::class, 'index'])->name('kelas');
        Route::get('tambah', [KelasController::class, 'create'])->name('kelas_tambah');
        Route::POST('tambah', [KelasController::class, 'store'])->name('kelas_tambah');
        Route::get('edit/{id}', [KelasController::class, 'edit'])->name('kelas_edit');
        Route::POST('edit/{id}', [KelasController::class, 'update'])->name('kelas_edit');
        Route::DELETE('hapus/{id}', [KelasController::class, 'destroy'])->name('kelas_hapus');
    });

    Route::prefix('jurusan')->group(function () {
        Route::get('index', [JurusanController::class, 'index'])->name('jurusan');
        Route::get('tambah', [JurusanController::class, 'create'])->name('jurusan_tambah');
        Route::POST('tambah', [JurusanController::class, 'store'])->name('jurusan_tambah');
        Route::get('edit/{id}', [JurusanController::class, 'edit'])->name('jurusan_edit');
        Route::POST('edit/{id}', [JurusanController::class, 'update'])->name('jurusan_edit');
        Route::DELETE('hapus/{id}', [JurusanController::class, 'destroy'])->name('jurusan_hapus');
    });

    Route::prefix('pendaftaran')->group(function () {
        Route::get('index', [PendaftaranController::class, 'index'])->name('pendaftaran');
        Route::get('tambah', [PendaftaranController::class, 'create'])->name('pendaftaran_tambah');
        Route::POST('tambah', [PendaftaranController::class, 'store'])->name('pendaftaran_tambah');
        Route::get('edit/{id}', [PendaftaranController::class, 'edit'])->name('pendaftaran_edit');
        Route::POST('edit/{id}', [PendaftaranController::class, 'update'])->name('pendaftaran_edit');
        Route::POST('bayar/{id}', [PendaftaranController::class, 'bayar'])->name('bayar');
        Route::POST('siswa/{id}', [PendaftaranController::class, 'siswa'])->name('pendaftaran_siswa');
        Route::DELETE('hapus/{id}', [PendaftaranController::class, 'destroy'])->name('pendaftaran_hapus');
    });

    Route::prefix('pembayaran')->group(function () {
        Route::get('index', [PembayaranController::class, 'index'])->name('pembayaran');
        Route::get('tambah', [PembayaranController::class, 'create'])->name('pembayaran_tambah');
        Route::POST('tambah', [PembayaranController::class, 'store'])->name('pembayaran_tambah');
        Route::POST('ajax_tambah', [PembayaranController::class, 'ajax_tambah'])->name('ajax_tambah');
        Route::get('edit/{id}', [PembayaranController::class, 'edit'])->name('pembayaran_edit');
        Route::POST('edit/{id}', [PembayaranController::class, 'update'])->name('pembayaran_edit');
        Route::DELETE('hapus/{id}', [PembayaranController::class, 'destroy'])->name('pembayaran_hapus');
    });

    Route::prefix('uang_spp')->group(function () {
        Route::get('index', [Uang_SPPController::class, 'index'])->name('uang_spp');
        Route::POST('cari', [Uang_SPPController::class, 'cari'])->name('cari');
        Route::POST('bayar_spp', [Uang_SPPController::class, 'bayar_spp'])->name('bayar_spp');
        Route::get('detail/{id}', [Uang_SPPController::class, 'detail'])->name('detail');
    });

    Route::prefix('uang_ujian')->group(function () {
        Route::get('index', [UjianController::class, 'index'])->name('uang_ujian');
        Route::POST('cari', [UjianController::class, 'cari'])->name('uang_ujian_cari');
        Route::POST('bayar_spp', [UjianController::class, 'bayar_spp'])->name('bayar_uang_ujian');
        Route::get('detail/{id}', [UjianController::class, 'detail'])->name('uang_ujian_detail');
    });

    Route::prefix('seragam')->group(function () {
        Route::get('index', [SeragamController::class, 'index'])->name('uang_seragam');
        Route::POST('cari', [SeragamController::class, 'cari'])->name('uang_seragam_cari');
        Route::POST('bayar_spp', [SeragamController::class, 'bayar_spp'])->name('uang_seragam_ujian');
        Route::get('detail/{id}', [SeragamController::class, 'detail'])->name('uang_seragam_detail');
    });

    Route::prefix('dsp')->group(function () {
        Route::get('index', [DSPController::class, 'index'])->name('dsp');
        Route::POST('uang_dsp', [DSPController::class, 'uang_dsp'])->name('uang_dsp');
        Route::get('detail/{id}', [DSPController::class, 'detail'])->name('dsp_detail');
    });

    Route::prefix('pkl')->group(function () {
        Route::get('index', [PKLController::class, 'index'])->name('pkl');
        // Route::POST('cari', [PKLController::class, 'cari'])->name('pkl_cari');
        Route::POST('uang_pkl', [PKLController::class, 'uang_pkl'])->name('uang_pkl');
        Route::get('detail/{id}', [PKLController::class, 'detail'])->name('pkl_detail');
    });

    Route::prefix('pembayaran_gaji')->group(function () {
        Route::get('index', [GajiController::class, 'index'])->name('pembayaran_gaji');
        Route::get('tambah', [GajiController::class, 'tambah'])->name('pembayaran_gaji_tambah_get');
        Route::POST('uang_gaji', [GajiController::class, 'store'])->name('pembayaran_gaji_tambah');
        Route::get('detail/{id}', [GajiController::class, 'detail'])->name('pembayaran_gaji_detail');
    });

    Route::prefix('pembayaran_lain')->group(function () {
        Route::get('index', [BiayaLainController::class, 'index'])->name('pembayaran_lain');
        Route::POST('uang_gaji', [BiayaLainController::class, 'tambah'])->name('pembayaran_lain_tambah');
        Route::get('detail/{id}', [BiayaLainController::class, 'detail'])->name('pembayaran_lain_detail');
    });

    Route::prefix('laporan')->group(function () {
        Route::get('index', [LaporanController::class, 'index'])->name('laporan');
        Route::get('detail/{id}', [LaporanController::class, 'detail'])->name('laporan_detail');
    });
});
