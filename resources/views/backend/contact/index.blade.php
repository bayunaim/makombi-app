@extends('backend.layout.public')

@section('title', 'Pesan Kontak')

@section('content')
<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Pesan Kontak</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-end">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Pesan Kontak</li>
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

      <div class="card">
        <div class="card-header">
          <h3 class="card-title">
            <i class="bi bi-envelope"></i> Daftar Pesan Kontak
            <span class="badge bg-primary ms-2">{{ $contacts->total() }}</span>
            @if($contacts->where('is_read', false)->count() > 0)
              <span class="badge bg-warning ms-1">{{ $contacts->where('is_read', false)->count() }} Baru</span>
            @endif
          </h3>
        </div>
        
        <div class="card-body table-responsive p-0">
          <table class="table table-hover text-nowrap">
            <thead>
              <tr>
                <th>No</th>
                <th>Status</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Subjek</th>
                <th>Tanggal</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              @forelse ($contacts as $index => $contact)
                <tr class="{{ !$contact->is_read ? 'table-warning' : '' }}">
                  <td>{{ $contacts->firstItem() + $index }}</td>
                  <td>
                    @if($contact->is_read)
                      <span class="badge bg-success"><i class="bi bi-check-circle"></i> Dibaca</span>
                    @else
                      <span class="badge bg-warning"><i class="bi bi-envelope"></i> Baru</span>
                    @endif
                  </td>
                  <td>{{ $contact->name }}</td>
                  <td>{{ $contact->email }}</td>
                  <td>{{ Str::limit($contact->subject, 50) }}</td>
                  <td>{{ $contact->created_at->format('d/m/Y H:i') }}</td>
                  <td>
                    <div class="btn-group" role="group">
                      <a href="{{ route('contact.show', $contact->id) }}" class="btn btn-sm btn-outline-info" title="Lihat Detail">
                        <i class="bi bi-eye"></i>
                      </a>
                      @if(!$contact->is_read)
                        <button type="button" class="btn btn-sm btn-outline-success" title="Tandai Dibaca" 
                                onclick="markAsRead({{ $contact->id }})">
                          <i class="bi bi-check"></i>
                        </button>
                      @endif
                      <form action="{{ route('contact.destroy', $contact->id) }}" method="POST" style="display: inline;"
                            data-contact-name="{{ $contact->name }}">
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
                  <td colspan="7" class="text-center">Belum ada pesan kontak</td>
                </tr>
              @endforelse
            </tbody>
          </table>
        </div>
        <div class="card-footer">
          {{ $contacts->links() }}
        </div>
      </div>
    </div>
  </section>
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
</style>
@endpush

@push('scripts')
<script>
function markAsRead(id) {
    if (confirm('Tandai pesan ini sebagai sudah dibaca?')) {
        fetch(`/contact/${id}/read`, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Content-Type': 'application/json'
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                location.reload();
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Terjadi kesalahan');
        });
    }
}

// Add confirmation for delete buttons
document.addEventListener('DOMContentLoaded', function() {
    const deleteButtons = document.querySelectorAll('button[type="submit"]');
    deleteButtons.forEach(button => {
        if (button.closest('form') && button.closest('form').action.includes('destroy')) {
            button.addEventListener('click', function(e) {
                const form = this.closest('form');
                const contactName = form.getAttribute('data-contact-name') || 'pesan ini';
                
                if (!confirm(`Apakah Anda yakin ingin menghapus ${contactName}? Tindakan ini tidak dapat dibatalkan.`)) {
                    e.preventDefault();
                }
            });
        }
    });
});
</script>
@endpush



