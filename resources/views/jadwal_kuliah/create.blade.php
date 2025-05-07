@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8 col-md-10 col-sm-12">
            <div class="card shadow-lg border-light rounded-3">
                <div class="card-header bg-primary text-white text-center py-3">
                    <h4>Tambah Jadwal Kuliah</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('jadwal_kuliah.store') }}" method="POST">
                        @csrf
                        @include('jadwal_kuliah._form')

                        <!-- Tombol-tombol action, sekarang di kanan dengan gap kecil -->
                        <div class="d-flex justify-content-end gap-2 mt-4">

                            <a href="{{ route('jadwal_kuliah.index') }}" class="btn btn-danger px-4 py-2">
                                <i class="bi bi-x-circle"></i> Cancel
                            </a>
                            <button type="reset" class="btn btn-warning px-4 py-2">
                                <i class="bi bi-arrow-clockwise"></i> Reset
                            </button>
                            <button type="submit" class="btn btn-success px-4 py-2">
                                <i class="bi bi-save"></i> Save
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
