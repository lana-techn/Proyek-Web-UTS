@extends('app')

@section('title', 'Detail Mahasiswa - ' . $mahasiswa->nama)

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h4 class="mb-0">
                    <i class="bi bi-person-vcard"></i> Detail Mahasiswa
                </h4>
            </div>
            <div class="card-body p-4">
                <div class="row mb-4">
                    <div class="col-md-4 text-center">
                        <div style="width: 140px; height: 140px; margin: 0 auto; background-color: var(--primary-light); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; font-size: 3rem;">
                            <i class="bi bi-person-circle"></i>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <h2 class="mb-2">{{ $mahasiswa->nama }}</h2>
                        <p class="text-muted mb-3"><strong>NIM:</strong> <code>{{ $mahasiswa->nim }}</code></p>
                        
                        @if ($mahasiswa->jenis_kel === 'Laki-laki')
                            <span class="badge bg-info" style="display: inline-block; padding: 0.6rem 1.2rem;">
                                <i class="bi bi-person"></i> Laki-laki
                            </span>
                        @else
                            <span class="badge bg-danger" style="display: inline-block; padding: 0.6rem 1.2rem;">
                                <i class="bi bi-person-dress"></i> Perempuan
                            </span>
                        @endif
                    </div>
                </div>

                <hr>

                <div class="row mb-4">
                    <div class="col-md-6">
                        <div class="mb-4">
                            <label class="form-label text-muted">
                                <i class="bi bi-book"></i> Program Studi
                            </label>
                            <p class="h6 mb-0">{{ $mahasiswa->prodi }}</p>
                        </div>

                        <div class="mb-4">
                            <label class="form-label text-muted">
                                <i class="bi bi-calendar-event"></i> Tanggal Lahir
                            </label>
                            <p class="h6 mb-0">{{ $mahasiswa->tanggal_lahir->format('d F Y') }}</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-4">
                            <label class="form-label text-muted">
                                <i class="bi bi-hash"></i> Nomor Induk Mahasiswa
                            </label>
                            <p class="h6 mb-0"><code>{{ $mahasiswa->nim }}</code></p>
                        </div>

                        <div class="mb-4">
                            <label class="form-label text-muted">
                                <i class="bi bi-calendar-check"></i> Ditambahkan pada
                            </label>
                            <p class="h6 mb-0">{{ $mahasiswa->created_at->format('d F Y H:i') }}</p>
                        </div>
                    </div>
                </div>

                <div class="mb-4">
                    <label class="form-label text-muted">
                        <i class="bi bi-house"></i> Alamat
                    </label>
                    <p class="h6 border-start ps-3 py-2" style="border-left: 3px solid var(--primary-light); margin-bottom: 0;">
                        {{ $mahasiswa->alamat }}
                    </p>
                </div>

                <hr>

                <div class="d-flex gap-2 justify-content-between" style="flex-wrap: wrap;">
                    <div>
                        <a href="{{ route('mahasiswa.edit', $mahasiswa->id) }}" class="btn btn-warning">
                            <i class="bi bi-pencil"></i> Edit Data
                        </a>
                        <a href="{{ route('mahasiswa.index') }}" class="btn btn-secondary">
                            <i class="bi bi-arrow-left"></i> Kembali
                        </a>
                    </div>
                    <form action="{{ route('mahasiswa.destroy', $mahasiswa->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Yakin ingin menghapus data ini? Aksi ini tidak dapat dibatalkan.');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">
                            <i class="bi bi-trash"></i> Hapus Data
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
