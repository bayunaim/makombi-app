@extends('backend.layout.public')

@section('title', 'Detail Pesan Kontak')

@section('content')
<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Detail Pesan Kontak</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-end">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('contact.index') }}">Pesan Kontak</a></li>
            <li class="breadcrumb-item active">Detail</li>
          </ol>
        </div>
      </div>
    </div>
  </div>

  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-8">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">
                <i class="bi bi-envelope"></i> Detail Pesan
                @if(!$contact->is_read)
                  <span class="badge bg-warning ms-2">Baru</span>
                @endif
              </h3>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-md-6">
                  <h6><i class="bi bi-person"></i> Informasi Pengirim</h6>
                  <table class="table table-borderless">
                    <tr><td><strong>Nama:</strong></td><td>{{ $contact->name }}</td></tr>
                    <tr><td><strong>Email:</strong></td><td>{{ $contact->email }}</td></tr>
                    <tr><td><strong>Tanggal:</strong></td><td>{{ $contact->created_at->format('d/m/Y H:i') }}</td></tr>
                    <tr><td><strong>Status:</strong></td>
                      <td>
                        @if($contact->is_read)
                          <span class="badge bg-success"><i class="bi bi-check-circle"></i> Dibaca</span>
                        @else
                          <span class="badge bg-warning"><i class="bi bi-envelope"></i> Baru</span>
                        @endif
                      </td>
                    </tr>
                  </table>
                </div>
                <div class="col-md-6">
                  <h6><i class="bi bi-chat"></i> Informasi Pesan</h6>
                  <table class="table table-borderless">
                    <tr><td><strong>Subjek:</strong></td><td>{{ $contact->subject }}</td></tr>
                    <tr><td><strong>ID Pesan:</strong></td><td>#{{ $contact->id }}</td></tr>
                  </table>
                </div>
              </div>
              
              <div class="mt-4">
                <h6><i class="bi bi-chat-text"></i> Isi Pesan</h6>
                <div class="alert alert-info">
                  {{ $contact->message }}
                </div>
              </div>
            </div>
            <div class="card-footer">
              <div class="d-flex justify-content-between">
                <div>
                  <a href="mailto:{{ $contact->email }}?subject=Re: {{ $contact->subject }}" class="btn btn-primary">
                    <i class="bi bi-reply"></i> Balas Email
                  </a>
                  @if(!$contact->is_read)
                    <button type="button" class="btn btn-success" onclick="markAsRead({{ $contact->id }})">
                      <i class="bi bi-check"></i> Tandai Dibaca
                    </button>
                  @endif
                </div>
                <div>
                  <a href="{{ route('contact.index') }}" class="btn btn-secondary">
                    <i class="bi bi-arrow-left"></i> Kembali
                  </a>
                  <form action="{{ route('contact.destroy', $contact->id) }}" method="POST" style="display: inline;"
                        data-contact-name="{{ $contact->name }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">
                      <i class="bi bi-trash"></i> Hapus
                    </button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
        
        <div class="col-md-4">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">
                <i class="bi bi-info-circle"></i> Informasi
              </h3>
            </div>
            <div class="card-body">
              <p><strong>Email Pengirim:</strong><br>
                <a href="mailto:{{ $contact->email }}">{{ $contact->email }}</a>
              </p>
              <p><strong>Waktu Pengiriman:</strong><br>
                {{ $contact->created_at->format('d/m/Y H:i') }}
              </p>
              <p><strong>Durasi:</strong><br>
                {{ $contact->created_at->diffForHumans() }}
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
@endsection

@push('styles')
<style>
.table-borderless td {
    padding: 0.5rem 0;
    border: none;
}

.table-borderless td:first-child {
    font-weight: 600;
    color: #495057;
    width: 40%;
}

.card-header {
    background-color: #f8f9fa;
    border-bottom: 1px solid #dee2e6;
}

.badge {
    font-size: 0.75em;
}

.alert-info {
    background-color: #f8f9fa;
    border-color: #dee2e6;
    color: #495057;
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

// Add confirmation for delete button
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



