@extends('backend.layout.public')

@section('title', 'Pendaftar Diterima')

@section('content')
<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Pendaftar Diterima</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-end">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Diterima</li>
          </ol>
        </div>
      </div>
    </div>
  </div>

  <section class="content">
    <div class="container-fluid">
      @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          {{ session('success') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      @endif

      @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          {{ session('error') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      @endif

             <div class="card">
         <div class="card-header">
           <h3 class="card-title">
             <i class="bi bi-check-circle"></i> Daftar Pendaftar Diterima
             <span class="badge bg-success ms-2">{{ $pendaftarDiterima->total() }}</span>
           </h3>
         </div>
         
         <!-- Search Form -->
         <div class="card-body border-bottom">
           @if(isset($search) && !empty($search))
             <div class="alert alert-info alert-dismissible fade show mb-3" role="alert">
               <i class="bi bi-info-circle"></i> 
               Menampilkan hasil pencarian untuk: <strong>"{{ $search }}"</strong> 
               ({{ $pendaftarDiterima->total() }} hasil ditemukan)
               <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
             </div>
           @endif
           <form method="GET" action="{{ route('pendaftar.diterima.index') }}" class="row g-3">
             <div class="col-md-8">
               <div class="input-group">
                 <span class="input-group-text"><i class="bi bi-search"></i></span>
                 <input type="text" class="form-control" name="search" placeholder="Cari berdasarkan NIM, nama, email, alamat, asal kampus, tanggal..." value="{{ $search ?? '' }}">
                 <button class="btn btn-outline-secondary" type="submit">Cari</button>
                 @if(isset($search) && !empty($search))
                   <a href="{{ route('pendaftar.diterima.index') }}" class="btn btn-outline-danger">Reset</a>
                 @endif
               </div>
             </div>
             <div class="col-md-4">
               <div class="d-flex gap-2">
                 <span class="text-muted align-self-center">Status:</span>
                 <span class="badge bg-success align-self-center">Diterima</span>
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
              @forelse ($pendaftarDiterima as $index => $m)
                <tr>
                  <td>{{ $pendaftarDiterima->firstItem() + $index }}</td>
                  <td>{{ $m->nama }}</td>
                  <td>{{ $m->nim }}</td>
                  <td>{{ $m->email }}</td>
                  <td>{{ $m->asal_kampus }}</td>
                  <td>{{ $m->tanggal_masuk }}</td>
                  <td>{{ $m->tanggal_keluar}}</td>
                  <td>
                    @if ($m->file)
                      <a href="{{ asset('storage/'.$m->file) }}" target="_blank" class="btn btn-sm btn-outline-primary">
                        <i class="bi bi-file-earmark-text"></i> Lihat File
                      </a>
                    @else
                      <span class="text-muted">-</span>
                    @endif
                  </td>
                  <td>
                    <div class="btn-group" role="group">
                      <button type="button" class="btn btn-sm btn-outline-info" title="Detail" 
                              onclick="showDetail({{ $m->id }}, '{{ $m->nama }}')">
                        <i class="bi bi-eye"></i>
                      </button>
                      <form action="{{ route('pendaftar.diterima.destroy', $m->id) }}" method="POST" style="display: inline;"
                            data-pendaftar-name="{{ $m->nama }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-outline-danger" title="Hapus">
                          <i class="bi bi-trash"></i>
                        </button>
                      </form>
                    </div>
                  </td>
                </tr>
              @empty
                <tr>
                  <td colspan="9" class="text-center">Belum ada pendaftar yang diterima</td>
                </tr>
              @endforelse
            </tbody>
          </table>
        </div>
                 <div class="card-footer">
           {{ $pendaftarDiterima->appends(['search' => $search ?? ''])->links() }}
         </div>
      </div>
    </div>
  </section>
</div>

<!-- Modal Detail Pendaftar -->
<div class="modal fade" id="detailModal" tabindex="-1" aria-labelledby="detailModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="detailModalLabel">Detail Pendaftar</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" id="detailModalBody">
        <!-- Content will be loaded here -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>
@endsection

@push('styles')
<style>
.btn-group .btn {
    margin-right: 2px;
}

.btn-group .btn:last-child {
    margin-right: 0;
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

.modal-lg {
    max-width: 800px;
}

.table-borderless td {
    padding: 0.5rem 0;
    border: none;
}

.table-borderless td:first-child {
    font-weight: 600;
    color: #495057;
    width: 40%;
}

.modal-body h6 {
    color: #007bff;
    border-bottom: 2px solid #e9ecef;
    padding-bottom: 0.5rem;
    margin-bottom: 1rem;
}

.input-group-text {
    background-color: #f8f9fa;
    border-color: #ced4da;
}

.card-body.border-bottom {
    background-color: #f8f9fa;
    border-bottom: 1px solid #dee2e6;
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
// Data pendaftar untuk detail modal
const pendaftarData = {
    @foreach($pendaftarDiterima as $m)
        {{ $m->id }}: {
            nama: '{{ $m->nama }}',
            nim: '{{ $m->nim }}',
            email: '{{ $m->email ?? '' }}',
            alamat: '{{ $m->alamat ?? '' }}',
            asal_kampus: '{{ $m->asal_kampus ?? '' }}',
            tanggal_masuk: '{{ $m->tanggal_masuk ?? '' }}',
            tanggal_keluar: '{{ $m->tanggal_keluar ?? '' }}',
            file: '{{ $m->file ?? '' }}',
            diterima: {{ $m->diterima ? 'true' : 'false' }}
        },
    @endforeach
};

function showDetail(id, nama) {
    // Get data from local variable
    const data = pendaftarData[id];
    
    if (!data) {
        alert('Data pendaftar tidak ditemukan!');
        return;
    }
    
    // Update modal title
    document.getElementById('detailModalLabel').textContent = 'Detail Pendaftar - ' + nama;
    
    // Show modal
    const modal = new bootstrap.Modal(document.getElementById('detailModal'));
    modal.show();
    
    // Update modal content
    const modalBody = document.getElementById('detailModalBody');
    modalBody.innerHTML = `
        <div class="row">
            <div class="col-md-6">
                <h6><i class="bi bi-person"></i> Informasi Pribadi</h6>
                <table class="table table-borderless">
                    <tr><td><strong>Nama:</strong></td><td>${data.nama || '-'}</td></tr>
                    <tr><td><strong>NIM:</strong></td><td>${data.nim || '-'}</td></tr>
                    <tr><td><strong>Email:</strong></td><td>${data.email || '-'}</td></tr>
                    <tr><td><strong>Alamat:</strong></td><td>${data.alamat || '-'}</td></tr>
                </table>
            </div>
            <div class="col-md-6">
                <h6><i class="bi bi-mortarboard"></i> Informasi Akademik</h6>
                <table class="table table-borderless">
                    <tr><td><strong>Asal Kampus:</strong></td><td>${data.asal_kampus || '-'}</td></tr>
                    <tr><td><strong>Tanggal Masuk:</strong></td><td>${data.tanggal_masuk || '-'}</td></tr>
                    <tr><td><strong>Tanggal Keluar:</strong></td><td>${data.tanggal_keluar || '-'}</td></tr>
                    <tr><td><strong>Status:</strong></td><td><span class="badge bg-success"><i class="bi bi-check-circle"></i> Diterima</span></td></tr>
                </table>
            </div>
        </div>
        <div class="mt-3">
            <h6><i class="bi bi-file-earmark"></i> File Lampiran</h6>
            ${data.file ? `<a href="/storage/${data.file}" target="_blank" class="btn btn-primary btn-sm"><i class="bi bi-file-earmark-text"></i> Lihat File</a>` : '<span class="text-muted">Tidak ada file lampiran</span>'}
        </div>
    `;
}



// Add confirmation for individual delete buttons
document.addEventListener('DOMContentLoaded', function() {
    const deleteButtons = document.querySelectorAll('button[type="submit"]');
    deleteButtons.forEach(button => {
        if (button.closest('form') && button.closest('form').action.includes('destroy')) {
            button.addEventListener('click', function(e) {
                const form = this.closest('form');
                const pendaftarName = form.getAttribute('data-pendaftar-name') || 'pendaftar ini';
                
                if (!confirm(`Apakah Anda yakin ingin menghapus ${pendaftarName}? Tindakan ini tidak dapat dibatalkan.`)) {
                    e.preventDefault();
                }
            });
        }
    });
});

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



