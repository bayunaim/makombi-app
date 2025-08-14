@extends('backend.layout.public')

@section('title', 'Tambah Pendaftar')

@section('content')
<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Tambah Pendaftar</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-end">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('pendaftar.index') }}">Pendaftar</a></li>
            <li class="breadcrumb-item active">Tambah</li>
          </ol>
        </div>
      </div>
    </div>
  </div>

  <section class="content">
    <div class="container-fluid">
      <div class="card">
        <div class="card-body">
          <form action="{{ route('pendaftar.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row g-3">
              <div class="col-md-6">
                <label class="form-label">Nama</label>
                <input type="text" name="nama" class="form-control" value="{{ old('nama') }}" required>
                @error('nama')<div class="text-danger small">{{ $message }}</div>@enderror
              </div>
              <div class="col-md-6">
                <label class="form-label">NIM</label>
                <input type="text" name="nim" class="form-control" value="{{ old('nim') }}" required>
                @error('nim')<div class="text-danger small">{{ $message }}</div>@enderror
              </div>
              <div class="col-md-6">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
                @error('email')<div class="text-danger small">{{ $message }}</div>@enderror
              </div>
              <div class="col-md-6">
                <label class="form-label">Asal Kampus</label>
                <input type="text" name="asal_kampus" class="form-control" value="{{ old('asal_kampus') }}">
                @error('asal_kampus')<div class="text-danger small">{{ $message }}</div>@enderror
              </div>
              <div class="col-md-6">
                <label class="form-label">Alamat</label>
                <textarea name="alamat" class="form-control" rows="2">{{ old('alamat') }}</textarea>
                @error('alamat')<div class="text-danger small">{{ $message }}</div>@enderror
              </div>
              <div class="col-md-3">
                <label class="form-label">Tanggal Masuk</label>
                <input type="date" name="tanggal_masuk" class="form-control" value="{{ old('tanggal_masuk') }}">
                @error('tanggal_masuk')<div class="text-danger small">{{ $message }}</div>@enderror
              </div>
              <div class="col-md-3">
                <label class="form-label">Tanggal Keluar</label>
                <input type="date" name="tanggal_keluar" class="form-control" value="{{ old('tanggal_keluar') }}">
                @error('tanggal_keluar')<div class="text-danger small">{{ $message }}</div>@enderror
              </div>
              <div class="col-md-6">
                <label class="form-label">File (opsional)</label>
                <input type="file" name="file" class="form-control" accept=".pdf,.jpg,.jpeg,.png,.doc,.docx">
                @error('file')<div class="text-danger small">{{ $message }}</div>@enderror
              </div>
            </div>
            <div class="mt-3">
              <a href="{{ route('pendaftar.index') }}" class="btn btn-secondary">Batal</a>
              <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
</div>
@endsection


