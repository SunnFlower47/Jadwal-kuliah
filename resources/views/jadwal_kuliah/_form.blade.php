@php
    $jadwal = $jadwal ?? null;
@endphp

<div class="mb-3">
    <label for="kode_mk" class="form-label">Kode MK</label>
    <div class="input-group">
        <span class="input-group-text"><i class="bi bi-code-slash"></i></span>
        <input type="text" id="kode_mk" name="kode_mk" class="form-control" value="{{ old('kode_mk', $jadwal->kode_mk ?? '') }}" required>
    </div>
    @error('kode_mk')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="nama_mk" class="form-label">Nama MK</label>
    <div class="input-group">
        <span class="input-group-text"><i class="bi bi-pencil"></i></span>
        <input type="text" id="nama_mk" name="nama_mk" class="form-control" value="{{ old('nama_mk', $jadwal->nama_mk ?? '') }}" required>
    </div>
    @error('nama_mk')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="jurusan" class="form-label">Jurusan</label>
    <div class="input-group">
        <span class="input-group-text"><i class="bi bi-building"></i></span>
        <input type="text" id="jurusan" name="jurusan" class="form-control" value="{{ old('jurusan', $jadwal->jurusan ?? '') }}" required>
    </div>
    @error('jurusan')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="tahun_akademik" class="form-label">Tahun Akademik</label>
    <div class="input-group">
        <span class="input-group-text"><i class="bi bi-calendar"></i></span>
        <input type="text" id="tahun_akademik" name="tahun_akademik" class="form-control" value="{{ old('tahun_akademik', $jadwal->tahun_akademik ?? '') }}" required>
    </div>
    @error('tahun_akademik')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="semester" class="form-label">Semester</label>
    <div class="input-group">
        <span class="input-group-text"><i class="bi bi-journal-bookmark"></i></span>
        <input type="text" id="semester" name="semester" class="form-control" value="{{ old('semester', $jadwal->semester ?? '') }}" required>
    </div>
    @error('semester')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="nama_dosen" class="form-label">Nama Dosen</label>
    <div class="input-group">
        <span class="input-group-text"><i class="bi bi-person"></i></span>
        <input type="text" id="nama_dosen" name="nama_dosen" class="form-control" value="{{ old('nama_dosen', $jadwal->nama_dosen ?? '') }}" required>
    </div>
    @error('nama_dosen')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="ruang" class="form-label">Ruang</label>
    <div class="input-group">
        <span class="input-group-text"><i class="bi bi-house-door"></i></span>
        <input type="text" id="ruang" name="ruang" class="form-control" value="{{ old('ruang', $jadwal->ruang ?? '') }}" required>
    </div>
    @error('ruang')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="hari" class="form-label">Hari</label>
    <div class="input-group">
        <span class="input-group-text"><i class="bi bi-calendar-day"></i></span>
        <select id="hari" name="hari" class="form-control" required>
            <option value="">-- Pilih Hari --</option>
            @foreach(['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'] as $hari)
                <option value="{{ $hari }}" {{ old('hari', $jadwal->hari ?? '') == $hari ? 'selected' : '' }}>{{ $hari }}</option>
            @endforeach
        </select>
    </div>
    @error('hari')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="jam_mulai" class="form-label">Jam Mulai</label>
    <div class="input-group">
        <span class="input-group-text"><i class="bi bi-clock"></i></span>
        <input type="time" id="jam_mulai" name="jam_mulai" class="form-control" value="{{ old('jam_mulai', isset($jadwal) ? date('H:i', strtotime($jadwal->jam_mulai)) : '') }}" required>
    </div>
    @error('jam_mulai')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="jam_selesai" class="form-label">Jam Selesai</label>
    <div class="input-group">
        <span class="input-group-text"><i class="bi bi-clock"></i></span>
        <input type="time" id="jam_selesai" name="jam_selesai" class="form-control" value="{{ old('jam_selesai', isset($jadwal) ? date('H:i', strtotime($jadwal->jam_selesai)) : '') }}" required>
    </div>
    @error('jam_selesai')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>
