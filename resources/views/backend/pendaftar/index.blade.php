@extends('backend.layout.public')

@section('title', 'Pendaftar')

@section('content')
<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Pendaftar</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-end">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Pendaftar</li>
          </ol>
        </div>
      </div>
    </div>
  </div>

  <section class="content">
    <div class="container-fluid">
      @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
      @endif

      <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
          <h3 class="card-title">
            <i class="bi bi-people"></i> Daftar Pendaftar
            <span class="badge bg-primary ms-2">{{ $pendaftar->total() }}</span>
          </h3>
          <div class="d-flex gap-2">
            <a href="{{ route('pendaftar.create') }}" class="btn btn-primary"><i class="bi bi-plus"></i> Tambah</a>
          </div>
        </div>
        
                 <!-- Search Form -->
         <div class="card-body border-bottom">
           @if(isset($search) && !empty($search))
             <div class="alert alert-info alert-dismissible fade show mb-3" role="alert">
               <i class="bi bi-info-circle"></i> 
               Menampilkan hasil pencarian untuk: <strong>"{{ $search }}"</strong> 
               ({{ $pendaftar->total() }} hasil ditemukan)
               <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
             </div>
           @endif
           <form method="GET" action="{{ route('pendaftar.index') }}" class="row g-3">
            <div class="col-md-8">
              <div class="input-group">
                <span class="input-group-text"><i class="bi bi-search"></i></span>
                <input type="text" class="form-control" name="search" placeholder="Cari berdasarkan NIM, nama, email, alamat, asal kampus, tanggal..." value="{{ $search ?? '' }}">
                <button class="btn btn-outline-secondary" type="submit">Cari</button>
                @if(isset($search) && !empty($search))
                  <a href="{{ route('pendaftar.index') }}" class="btn btn-outline-danger">Reset</a>
                @endif
              </div>
            </div>
            <div class="col-md-4">
              <div class="d-flex gap-2">
                <span class="text-muted align-self-center">Status:</span>
                <span class="badge bg-warning align-self-center">Pendaftar</span>
              </div>
            </div>
          </form>
        </div>
        <div class="card-body table-responsive p-0">
          <table class="table table-hover text-nowrap">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama</th>
                <th>NIM</th>
                <th>Email</th>
                <th>Asal Kampus</th>
                <th>Tanggal Masuk</th>
                <th>Tanggal Keluar</th>
                <th>File</th>
                 <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              @forelse ($pendaftar as $index => $m)
                <tr>
                  <td>{{ $pendaftar->firstItem() + $index }}</td>
                  <td>{{ $m->nama }}</td>
                  <td>{{ $m->nim }}</td>
                  <td>{{ $m->email }}</td>
                  <td>{{ $m->asal_kampus }}</td>
                  <td>{{ $m->tanggal_masuk }}</td>
                  <td>{{ $m->tanggal_keluar}}</td>
                  <td>
              @if ($m->file)
                <a href="{{ asset('storage/'.$m->file) }}" target="_blank">Lihat File</a>
              @else
                -
              @endif
</td>
                  <td>
                    <a href="{{ route('pendaftar.show', $m->id) }}" class="btn btn-sm btn-info"><i class="bi bi-eye"></i></a>
                    <a href="{{ route('pendaftar.edit', $m->id) }}" class="btn btn-sm btn-warning"><i class="bi bi-pencil"></i></a>
                    @if(!$m->diterima)
                    <form action="{{ route('pendaftar.accept', $m->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Terima pendaftar ini?')">
                      @csrf
                      <button type="submit" class="btn btn-sm btn-success"><i class="bi bi-check"></i></button>
                    </form>
                    @endif
                    <form action="{{ route('pendaftar.destroy', $m->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus data ini?')">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></button>
                    </form>
                  </td>
                </tr>
              @empty
                <tr>
                  <td colspan="7" class="text-center">Belum ada data</td>
                </tr>
              @endforelse
            </tbody>
          </table>
        </div>
        <div class="card-footer">
          {{ $pendaftar->appends(['search' => $search ?? ''])->links() }}
        </div>
      </div>
    </div>
  </section>
</div>
@endsection

@push('styles')
<style>
.input-group-text {
    background-color: #f8f9fa;
    border-color: #ced4da;
}

.card-body.border-bottom {
    background-color: #f8f9fa;
    border-bottom: 1px solid #dee2e6;
}

.table th {
    background-color: #f8f9fa;
    border-bottom: 2px solid #dee2e6;
}

.table-hover tbody tr:hover {
    background-color: rgba(0, 123, 255, 0.05);
}

.card-header {
    background-color: #f8f9fa;
    border-bottom: 1px solid #dee2e6;
}

.badge {
    font-size: 0.75em;
}

.btn-group .btn {
    margin-right: 2px;
}

.btn-group .btn:last-child {
    margin-right: 0;
}

/* Search result highlighting */
.highlight {
    background-color: #fff3cd;
    padding: 2px 4px;
    border-radius: 3px;
}
</style>
@endpush

@push('scripts')
<script>
// Auto-submit form when pressing Enter
document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.querySelector('input[name="search"]');
    if (searchInput) {
        searchInput.addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                e.preventDefault();
                this.closest('form').submit();
            }
        });
    }
    
    // Highlight search terms in table
    const searchTerm = '{{ $search ?? "" }}';
    if (searchTerm) {
        const tableCells = document.querySelectorAll('tbody td');
        tableCells.forEach(cell => {
            const text = cell.textContent;
            if (text.toLowerCase().includes(searchTerm.toLowerCase())) {
                const regex = new RegExp(`(${searchTerm})`, 'gi');
                cell.innerHTML = text.replace(regex, '<span class="highlight">$1</span>');
            }
        });
    }
});
</script>
@endpush


