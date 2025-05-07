@extends('layouts.app')

@section('content')

<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3><i class="bi bi-calendar3-event-fill"></i> Jadwal Kuliah Ridwan Andrian</h3>
        <a href="{{ route('jadwal_kuliah.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle-fill"></i> Tambah Jadwal
        </a>
    </div>

    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="bi bi-check-circle-fill"></i> {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @elseif(session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <i class="bi bi-x-circle-fill"></i> {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <div class="mb-3">
        <label for="searchInput" class="form-label">Cari jadwal Kuliah:</label>
        <div class="input-group">
            <span class="input-group-text">
                <i class="bi bi-search"></i>
            </span>
            <input type="text" id="searchInput" class="form-control" placeholder="Search..." aria-label="Search">
        </div>
    </div>



    <div id="noResultsAlert" class="alert alert-warning text-center d-none">
        <i class="bi bi-exclamation-circle"></i> Tidak ditemukan hasil yang cocok dengan pencarian Anda.
    </div>

    @if($jadwals->isEmpty())
        <div class="alert alert-info text-center">
            <i class="bi bi-info-circle"></i> Belum ada jadwal kuliah yang terdaftar.
        </div>
    @else
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4" id="jadwalGrid">
            @foreach($jadwals as $jadwal)
            <div class="col jadwal-card">
                <div class="card shadow-sm h-100">
                    <div class="card-header bg-primary text-white">
                        <h6 class="mb-0">{{ $jadwal->nama_mk }}</h6>
                        <small>{{ $jadwal->kode_mk }}</small>
                    </div>
                    <div class="card-body">
                        <p><i class="bi bi-mortarboard"></i> Jurusan: {{ $jadwal->jurusan }}</p>
                        <p><i class="bi bi-calendar-week"></i> Tahun Akademik: {{ $jadwal->tahun_akademik }}</p>
                        <p><i class="bi bi-layers"></i> Semester: <span class="badge bg-info">{{ $jadwal->semester }}</span></p>
                        <p><i class="bi bi-person-badge"></i> Dosen: {{ $jadwal->nama_dosen }}</p>
                        <p><i class="bi bi-geo-alt"></i> Ruang: {{ $jadwal->ruang }}</p>
                        <p><i class="bi bi-clock"></i> {{ $jadwal->hari }}, {{ \Carbon\Carbon::parse($jadwal->jam_mulai)->format('H:i') }} - {{ \Carbon\Carbon::parse($jadwal->jam_selesai)->format('H:i') }}</p>
                    </div>
                    <div class="card-footer d-flex justify-content-between">
                        <a href="{{ route('jadwal_kuliah.show', $jadwal->id) }}" class="btn btn-sm btn-outline-info" data-bs-toggle="tooltip" title="Lihat">
                            <i class="bi bi-eye-fill"></i>
                        </a>
                        <a href="{{ route('jadwal_kuliah.edit', $jadwal->id) }}" class="btn btn-sm btn-outline-warning" data-bs-toggle="tooltip" title="Edit">
                            <i class="bi bi-pencil-fill"></i>
                        </a>
                        <form action="{{ route('jadwal_kuliah.destroy', $jadwal->id) }}" method="POST" style="display:inline;">
                            @csrf @method('DELETE')
                            <button type="button" class="btn btn-sm btn-outline-danger btn-delete" data-bs-toggle="tooltip" title="Hapus">
                                <i class="bi bi-trash-fill"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    @endif
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    // Tooltip init
    const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    const tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
    });

    // Message with SweetAlert2
    @if(session('success'))
    Swal.fire({
        icon: 'success',
        title: 'BERHASIL',
        text: '{{ session('success') }}',
        showConfirmButton: false,
        timer: 2000
    });
    @elseif(session('error'))
    Swal.fire({
        icon: 'error',
        title: 'GAGAL!',
        text: '{{ session('error') }}',
        showConfirmButton: false,
        timer: 2000
    });
    @endif

    // SweetAlert2 delete confirmation
    document.querySelectorAll('.btn-delete').forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            Swal.fire({
                title: 'Yakin ingin menghapus?',
                text: "Data ini akan dihapus dan tidak dapat dikembalikan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Hapus',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    this.closest('form').submit();
                }
            });
        });
    });

    // Simple search filter with no-result message
    document.getElementById('searchInput').addEventListener('keyup', function() {
        const searchValue = this.value.toLowerCase();
        const cards = document.querySelectorAll('.jadwal-card');
        let anyVisible = false;

        cards.forEach(function(card) {
            const cardText = card.innerText.toLowerCase();
            if (cardText.includes(searchValue)) {
                card.style.display = 'block';
                anyVisible = true;
            } else {
                card.style.display = 'none';
            }
        });

        const noResultsAlert = document.getElementById('noResultsAlert');
        if (anyVisible) {
            noResultsAlert.classList.add('d-none');
        } else {
            noResultsAlert.classList.remove('d-none');
        }
    });
</script>

@endsection
