@extends('app')

@section('title', 'Laporan Mahasiswa')

@section('content')
<div class="row mb-4">
    <div class="col-md-12">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <div>
                <h1 class="h2 mb-0">
                    <i class="bi bi-file-earmark-text"></i> Laporan Mahasiswa
                </h1>
                <small class="text-muted">Total: <strong id="totalCount">{{ $mahasiswas->count() }}</strong> mahasiswa</small>
            </div>
            <div class="d-flex gap-2">
                <button class="btn btn-secondary btn-sm" onclick="window.print()">
                    <i class="bi bi-printer"></i> Cetak
                </button>
                <a href="{{ route('mahasiswa.index') }}" class="btn btn-primary btn-sm">
                    <i class="bi bi-grid-3x2-gap"></i> Kembali
                </a>
            </div>
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
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0"><i class="bi bi-table"></i> Data Mahasiswa</h5>
        </div>
        <div class="table-responsive">
            <table class="table table-hover mb-0" id="dataTable">
                <thead>
                    <tr>
                        <th style="width: 5%;">#</th>
                        <th style="width: 12%;">NIM</th>
                        <th style="width: 18%;">Nama</th>
                        <th style="width: 16%;">Program Studi</th>
                        <th style="width: 12%;">Jenis Kelamin</th>
                        <th style="width: 13%;">Tanggal Lahir</th>
                        <th style="width: 12%;">Aksi</th>
                    </tr>
                </thead>
                <tbody id="tableBody">
                    @foreach ($mahasiswas as $index => $mhs)
                    <tr class="table-row" 
                        data-name="{{ strtolower($mhs->nama) }}" 
                        data-nim="{{ strtolower($mhs->nim) }}" 
                        data-prodi="{{ strtolower($mhs->prodi) }}"
                        data-gender="{{ $mhs->jenis_kel }}">
                        <td>{{ $index + 1 }}</td>
                        <td><code>{{ $mhs->nim }}</code></td>
                        <td><strong>{{ $mhs->nama }}</strong></td>
                        <td>{{ $mhs->prodi }}</td>
                        <td>
                            @if ($mhs->jenis_kel === 'Laki-laki')
                                <span class="badge bg-info">
                                    <i class="bi bi-person"></i> Laki-laki
                                </span>
                            @else
                                <span class="badge bg-danger">
                                    <i class="bi bi-person-dress"></i> Perempuan
                                </span>
                            @endif
                        </td>
                        <td>{{ $mhs->tanggal_lahir->format('d M Y') }}</td>
                        <td>
                            <div class="btn-group btn-group-sm" role="group">
                                <a href="{{ route('mahasiswa.show', $mhs->id) }}" class="btn btn-info" title="Lihat Detail" data-bs-toggle="tooltip">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <a href="{{ route('mahasiswa.edit', $mhs->id) }}" class="btn btn-warning" title="Edit" data-bs-toggle="tooltip">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="{{ route('mahasiswa.destroy', $mhs->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Yakin ingin menghapus data ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" title="Hapus" data-bs-toggle="tooltip">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    
    <div id="noResultsMessage" class="card" style="display: none; margin-top: 1rem;">
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
    
    .table-row {
        transition: all 0.2s ease;
    }
    
    .table-row.hidden {
        display: none !important;
    }
    
    #resultCount {
        display: none;
    }
    
    #resultCount.show {
        display: inline-block;
    }
    
    @media print {
        .navbar, footer, #searchInput, #filterSelect, #resetBtn, #resultCount, .container-main > .row:first-child, .container-main > .row:nth-child(2) {
            display: none !important;
        }
    }
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('searchInput');
    const filterSelect = document.getElementById('filterSelect');
    const resetBtn = document.getElementById('resetBtn');
    const tableRows = document.querySelectorAll('.table-row');
    const noResultsMessage = document.getElementById('noResultsMessage');
    const resultCount = document.getElementById('resultCount');
    const totalCount = document.getElementById('totalCount');
    
    function filterTable() {
        const searchTerm = searchInput.value.toLowerCase().trim();
        const filterValue = filterSelect.value;
        let visibleCount = 0;
        
        tableRows.forEach(row => {
            const name = row.getAttribute('data-name');
            const nim = row.getAttribute('data-nim');
            const prodi = row.getAttribute('data-prodi');
            const gender = row.getAttribute('data-gender');
            
            const matchesSearch = !searchTerm || 
                name.includes(searchTerm) || 
                nim.includes(searchTerm) || 
                prodi.includes(searchTerm);
            
            const matchesFilter = filterValue === 'all' || gender === filterValue;
            
            if (matchesSearch && matchesFilter) {
                row.classList.remove('hidden');
                visibleCount++;
            } else {
                row.classList.add('hidden');
            }
        });
        
        // Show/hide no results message
        if (visibleCount === 0) {
            noResultsMessage.style.display = 'block';
            resultCount.classList.remove('show');
        } else {
            noResultsMessage.style.display = 'none';
            resultCount.classList.add('show');
            resultCount.textContent = `Menampilkan ${visibleCount} dari ${tableRows.length} data`;
        }
    }
    
    searchInput.addEventListener('input', filterTable);
    filterSelect.addEventListener('change', filterTable);
    
    resetBtn.addEventListener('click', function(e) {
        e.preventDefault();
        searchInput.value = '';
        filterSelect.value = 'all';
        resultCount.classList.remove('show');
        tableRows.forEach(row => row.classList.remove('hidden'));
        noResultsMessage.style.display = 'none';
        searchInput.focus();
    });
});
</script>

<style>
    .table td {
        vertical-align: middle;
    }
    
    .btn-group {
        display: flex;
        gap: 0.25rem;
    }
    
    .btn-group .btn {
        padding: 0.4rem 0.6rem;
        border-radius: 6px;
        font-size: 0.875rem;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        min-width: 36px;
        min-height: 32px;
    }
    
    .btn-group form {
        display: inline;
    }
</style>
@endsection
