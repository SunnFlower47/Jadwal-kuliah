<?php

namespace App\Http\Controllers;

use App\Models\JadwalKuliahRidwan;
use Illuminate\Http\Request;

class JadwalKuliahController extends Controller
{
    public function index()
    {
        $jadwals = JadwalKuliahRidwan::all(  ); // ambil semua data
        return view('jadwal_kuliah.index', compact('jadwals')); // kirim ke view
    }

    public function create()
    {
        return view('jadwal_kuliah.create'); // form tambah
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'kode_mk' => 'required',
            'nama_mk' => 'required',
            'jurusan' => 'required',
            'tahun_akademik' => 'required',
            'semester' => 'required',
            'nama_dosen' => 'required',
            'ruang' => 'required',
            'hari' => 'required',
            'jam_mulai' => 'required|date_format:H:i',
            'jam_selesai' => 'required|date_format:H:i|after:jam_mulai',
        ]);

        // Simpan data ke database
        JadwalKuliahRidwan::create([
            'kode_mk' => $request->kode_mk,
            'nama_mk' => $request->nama_mk,
            'jurusan' => $request->jurusan,
            'tahun_akademik' => $request->tahun_akademik,
            'semester' => $request->semester,
            'nama_dosen' => $request->nama_dosen,
            'ruang' => $request->ruang,
            'hari' => $request->hari,
            'jam_mulai' => $request->jam_mulai,
            'jam_selesai' => $request->jam_selesai,
        ]);

        return redirect()->route('jadwal_kuliah.index')->with('success', 'Jadwal berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $jadwal = JadwalKuliahRidwan::findOrFail($id);
        return view('jadwal_kuliah.edit', compact('jadwal'));
    }

    public function update(Request $request, $id)
    {
        $jadwal = JadwalKuliahRidwan::findOrFail($id);

        $jadwal->update($request->all());

        return redirect()->route('jadwal_kuliah.index')->with('success', 'Jadwal berhasil diupdate.');
    }

    public function destroy($id)
    {
        $jadwal = JadwalKuliahRidwan::findOrFail($id);
        $jadwal->delete();

        return redirect()->route('jadwal_kuliah.index')->with('success', 'Jadwal berhasil dihapus.');
    }
    public function show($id)
{
    $jadwal = JadwalKuliahRidwan::findOrFail($id);
    return view('jadwal_kuliah.show', compact('jadwal'));
}

}
