@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8 col-md-10 col-sm-12">
            <div class="card shadow-lg border-light rounded-3">
                <div class="card-header bg-primary text-white text-center py-3">
                    <h4>Edit Jadwal Kuliah</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('jadwal_kuliah.update', $jadwal->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        @include('jadwal_kuliah._form', ['jadwal' => $jadwal])

                        <div class="d-flex justify-content-end gap-3 mt-4">
                            <a href="{{ route('jadwal_kuliah.index') }}" class="btn btn-danger px-4 py-2">
                                <i class="bi bi-x-circle"></i> Cancel
                            </a>
                            <button type="submit" class="btn btn-primary px-4 py-2">
                                <i class="bi bi-save"></i> Update
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
