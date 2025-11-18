@extends('app')

@section('title', 'Daftar Mahasiswa')

@section('content')
<div class="row mb-4">
    <div class="col-md-12">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <div>
                <h1 class="h2 mb-0">
                    <i class="bi bi-grid-3x2-gap"></i> Daftar Mahasiswa
                </h1>
                <small class="text-muted">Total: <strong id="totalCount">{{ $mahasiswas->count() }}</strong> mahasiswa</small>
            </div>
            <a href="{{ route('mahasiswa.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-circle"></i> Tambah Mahasiswa Baru
            </a>
        </div>
    </div>
</div>

<!-- Search & Filter Form -->
<div class="row mb-4">
    <div class="col-md-12">
        <div class="d-flex gap-2 align-items-center flex-wrap">
            <div style="position: relative; flex: 1; min-width: 250px; max-width: 400px;">
                <input type="text" class="form-control form-control-sm" id="searchInput" 
                    placeholder="Cari nama, NIM, atau prodi..." 
                    style="padding-right: 35px;">
                <i class="bi bi-search" style="position: absolute; right: 10px; top: 50%; transform: translateY(-50%); color: #6c757d; pointer-events: none;"></i>
            </div>
            
            <select class="form-select form-select-sm" id="filterSelect" style="max-width: 140px;">
                <option value="all">Semua Jenis</option>
                <option value="Laki-laki">Laki-laki</option>
                <option value="Perempuan">Perempuan</option>
            </select>
            
            <button class="btn btn-sm btn-outline-secondary" id="resetBtn" title="Reset Filter">
                <i class="bi bi-arrow-clockwise"></i>
            </button>
            
            <span class="text-muted" id="resultCount" style="font-size: 0.9rem;"></span>
        </div>
    </div>
</div>

@if ($mahasiswas->isEmpty())
    <div class="card">
        <div class="card-body">
            <div class="no-data">
                <i class="bi bi-inbox"></i>
                <p class="mt-3">Belum ada data mahasiswa. <a href="{{ route('mahasiswa.create') }}">Tambahkan sekarang</a></p>
            </div>
        </div>
    </div>
@else
    <div class="row" id="cardContainer">
        @foreach ($mahasiswas as $mhs)
        <div class="col-md-6 col-lg-4 mb-4 card-item" 
            data-name="{{ strtolower($mhs->nama) }}" 
            data-nim="{{ strtolower($mhs->nim) }}" 
            data-prodi="{{ strtolower($mhs->prodi) }}"
            data-gender="{{ $mhs->jenis_kel }}">
            <div class="card h-100">
                <div class="card-header">
                    <h5 class="mb-0">
                        <i class="bi bi-person-circle"></i> {{ $mhs->nama }}
                    </h5>
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-5 fw-bold text-muted">NIM:</div>
                        <div class="col-7"><strong>{{ $mhs->nim }}</strong></div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-5 fw-bold text-muted">Program Studi:</div>
                        <div class="col-7">{{ $mhs->prodi }}</div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-5 fw-bold text-muted">Jenis Kelamin:</div>
                        <div class="col-7">
                            @if ($mhs->jenis_kel === 'Laki-laki')
                                <span class="badge bg-info">
                                    <i class="bi bi-person"></i> L
                                </span>
                            @else
                                <span class="badge bg-danger">
                                    <i class="bi bi-person-dress"></i> P
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-5 fw-bold text-muted">Tanggal Lahir:</div>
                        <div class="col-7">{{ $mhs->tanggal_lahir->format('d/m/Y') }}</div>
                    </div>
                    <div class="row">
                        <div class="col-5 fw-bold text-muted">Alamat:</div>
                        <div class="col-7">
                            <small>{{ Str::limit($mhs->alamat, 50) }}</small>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="action-buttons">
                        <a href="{{ route('mahasiswa.show', $mhs->id) }}" class="btn btn-sm btn-info" title="Lihat Detail">
                            <i class="bi bi-eye"></i> Lihat
                        </a>
                        <a href="{{ route('mahasiswa.edit', $mhs->id) }}" class="btn btn-sm btn-warning" title="Edit">
                            <i class="bi bi-pencil"></i> Edit
                        </a>
                        <form action="{{ route('mahasiswa.destroy', $mhs->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Yakin ingin menghapus data ini?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" title="Hapus">
                                <i class="bi bi-trash"></i> Hapus
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    
    <div id="noResultsMessage" class="card" style="display: none;">
        <div class="card-body">
            <div class="no-data">
                <i class="bi bi-search"></i>
                <p class="mt-3">Tidak ada data yang sesuai dengan pencarian Anda.</p>
            </div>
        </div>
    </div>
@endif

<style>
    #searchInput {
        transition: all 0.3s ease;
        border: 1px solid #e2e8f0;
    }
    
    #searchInput:focus {
        border-color: #6366f1;
        box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.1);
    }
    
    .card-item {
        transition: all 0.3s ease;
    }
    
    .card-item.hidden {
        display: none !important;
    }
    
    #resultCount {
        display: none;
    }
    
    #resultCount.show {
        display: inline-block;
    }
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('searchInput');
    const filterSelect = document.getElementById('filterSelect');
    const resetBtn = document.getElementById('resetBtn');
    const cardItems = document.querySelectorAll('.card-item');
    const noResultsMessage = document.getElementById('noResultsMessage');
    const resultCount = document.getElementById('resultCount');
    const totalCount = document.getElementById('totalCount');
    
    function filterCards() {
        const searchTerm = searchInput.value.toLowerCase().trim();
        const filterValue = filterSelect.value;
        let visibleCount = 0;
        
        cardItems.forEach(card => {
            const name = card.getAttribute('data-name');
            const nim = card.getAttribute('data-nim');
            const prodi = card.getAttribute('data-prodi');
            const gender = card.getAttribute('data-gender');
            
            const matchesSearch = !searchTerm || 
                name.includes(searchTerm) || 
                nim.includes(searchTerm) || 
                prodi.includes(searchTerm);
            
            const matchesFilter = filterValue === 'all' || gender === filterValue;
            
            if (matchesSearch && matchesFilter) {
                card.classList.remove('hidden');
                visibleCount++;
            } else {
                card.classList.add('hidden');
            }
        });
        
        // Show/hide no results message
        if (visibleCount === 0) {
            noResultsMessage.style.display = 'block';
            resultCount.classList.remove('show');
        } else {
            noResultsMessage.style.display = 'none';
            resultCount.classList.add('show');
            resultCount.textContent = `Menampilkan ${visibleCount} dari ${cardItems.length} data`;
        }
    }
    
    searchInput.addEventListener('input', filterCards);
    filterSelect.addEventListener('change', filterCards);
    
    resetBtn.addEventListener('click', function(e) {
        e.preventDefault();
        searchInput.value = '';
        filterSelect.value = 'all';
        resultCount.classList.remove('show');
        cardItems.forEach(card => card.classList.remove('hidden'));
        noResultsMessage.style.display = 'none';
        searchInput.focus();
    });
});
</script>
@endsection
