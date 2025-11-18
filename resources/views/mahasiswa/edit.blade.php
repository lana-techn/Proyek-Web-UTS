@extends('app')

@section('title', 'Edit Mahasiswa')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h4 class="mb-0">
                    <i class="bi bi-pencil-square"></i> Edit Data Mahasiswa
                </h4>
            </div>
            <div class="card-body p-4">
                <form action="{{ route('mahasiswa.update', $mahasiswa->id) }}" method="POST" novalidate>
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label for="nim" class="form-label">
                            <i class="bi bi-hash"></i> Nomor Induk Mahasiswa (NIM)
                        </label>
                        <input type="text" class="form-control @error('nim') is-invalid @enderror" 
                               id="nim" name="nim" value="{{ old('nim', $mahasiswa->nim) }}" required>
                        @error('nim')
                            <div class="invalid-feedback d-block">
                                <i class="bi bi-exclamation-circle"></i> {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="nama" class="form-label">
                            <i class="bi bi-person"></i> Nama Lengkap
                        </label>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" 
                               id="nama" name="nama" value="{{ old('nama', $mahasiswa->nama) }}" required>
                        @error('nama')
                            <div class="invalid-feedback d-block">
                                <i class="bi bi-exclamation-circle"></i> {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="alamat" class="form-label">
                            <i class="bi bi-house"></i> Alamat
                        </label>
                        <textarea class="form-control @error('alamat') is-invalid @enderror" 
                                  id="alamat" name="alamat" rows="3" required>{{ old('alamat', $mahasiswa->alamat) }}</textarea>
                        @error('alamat')
                            <div class="invalid-feedback d-block">
                                <i class="bi bi-exclamation-circle"></i> {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <label for="tanggal_lahir" class="form-label">
                                <i class="bi bi-calendar"></i> Tanggal Lahir
                            </label>
                            <input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror" 
                                   id="tanggal_lahir" name="tanggal_lahir" value="{{ old('tanggal_lahir', $mahasiswa->tanggal_lahir->format('Y-m-d')) }}" required>
                            @error('tanggal_lahir')
                                <div class="invalid-feedback d-block">
                                    <i class="bi bi-exclamation-circle"></i> {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-4">
                            <label for="jenis_kel" class="form-label">
                                <i class="bi bi-gender-ambiguous"></i> Jenis Kelamin
                            </label>
                            <select class="form-select @error('jenis_kel') is-invalid @enderror" 
                                    id="jenis_kel" name="jenis_kel" required>
                                <option value="">-- Pilih Jenis Kelamin --</option>
                                <option value="Laki-laki" {{ old('jenis_kel', $mahasiswa->jenis_kel) === 'Laki-laki' ? 'selected' : '' }}>
                                    Laki-laki
                                </option>
                                <option value="Perempuan" {{ old('jenis_kel', $mahasiswa->jenis_kel) === 'Perempuan' ? 'selected' : '' }}>
                                    Perempuan
                                </option>
                            </select>
                            @error('jenis_kel')
                                <div class="invalid-feedback d-block">
                                    <i class="bi bi-exclamation-circle"></i> {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-4">
                        <label for="prodi" class="form-label">
                            <i class="bi bi-book"></i> Program Studi
                        </label>
                        <input type="text" class="form-control @error('prodi') is-invalid @enderror" 
                               id="prodi" name="prodi" value="{{ old('prodi', $mahasiswa->prodi) }}" required>
                        @error('prodi')
                            <div class="invalid-feedback d-block">
                                <i class="bi bi-exclamation-circle"></i> {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <hr>

                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-check-circle"></i> Perbarui Data
                        </button>
                        <a href="{{ route('mahasiswa.index') }}" class="btn btn-secondary">
                            <i class="bi bi-x-circle"></i> Batal
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
