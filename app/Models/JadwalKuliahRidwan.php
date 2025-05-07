<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
class JadwalKuliahRidwan extends Model
{
    use HasFactory;

    // kalau nama tabel di database kamu bukan 'jadwal_kuliahs', tulis manual
    protected $table = 'jadwal_kuliahs';

    protected $fillable = [
        'kode_mk',
        'nama_mk',
        'jurusan',
        'tahun_akademik',
        'semester',
        'nama_dosen',
        'ruang',
        'hari',
        'jam_mulai',
        'jam_selesai',
    ];
    public function getJamMulaiAttribute($value)
{
    return Carbon::parse($value)->format('H:i');
}

public function getJamSelesaiAttribute($value)
{
    return Carbon::parse($value)->format('H:i');
}
}
