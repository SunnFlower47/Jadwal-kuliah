<?php
use App\Http\Controllers\JadwalKuliahController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('jadwal_kuliah');
});

Route::resource('jadwal_kuliah', JadwalKuliahController::class);
