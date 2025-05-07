@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8 col-md-10 col-sm-12">
            <div class="card shadow-lg border-light rounded-3">
                <div class="card-header bg-primary text-white text-center py-3">
                    <h4>Detail Jadwal Kuliah</h4>
                </div>
                <div class="card-body">
                    <!-- Tabel Detail Jadwal -->
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered">
                            <tr>
                                <th class="bg-light">Kode MK</th>
                                <td>{{ $jadwal->kode_mk }}</td>
                            </tr>
                            <tr>
                                <th class="bg-light">Nama MK</th>
                                <td>{{ $jadwal->nama_mk }}</td>
                            </tr>
                            <tr>
                                <th class="bg-light">Jurusan</th>
                                <td>{{ $jadwal->jurusan }}</td>
                            </tr>
                            <tr>
                                <th class="bg-light">Tahun Akademik</th>
                                <td>{{ $jadwal->tahun_akademik }}</td>
                            </tr>
                            <tr>
                                <th class="bg-light">Semester</th>
                                <td>{{ ucfirst($jadwal->semester) }}</td>
                            </tr>
                            <tr>
                                <th class="bg-light">Dosen</th>
                                <td>{{ $jadwal->nama_dosen }}</td>
                            </tr>
                            <tr>
                                <th class="bg-light">Ruang</th>
                                <td>{{ $jadwal->ruang }}</td>
                            </tr>
                            <tr>
                                <th class="bg-light">Hari</th>
                                <td>{{ $jadwal->hari }}</td>
                            </tr>
                            <tr>
                                <th class="bg-light">Jam</th>
                                <td>
                                    {{ \Carbon\Carbon::parse($jadwal->jam_mulai)->format('H:i') }} -
                                    {{ \Carbon\Carbon::parse($jadwal->jam_selesai)->format('H:i') }}
                                </td>
                            </tr>
                        </table>
                    </div>

                    <!-- Tombol untuk kembali ke halaman daftar -->
                    <div class="d-flex justify-content-end mt-4">
                        <a href="{{ route('jadwal_kuliah.index') }}" class="btn btn-secondary px-4 py-2">
                            <i class="bi bi-arrow-left-circle"></i> Kembali
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
