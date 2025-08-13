@extends('backend.layout.public')

@section('title', 'Detail Pendaftar')

@section('content')
<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Detail Pendaftar</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-end">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('pendaftar.index') }}">Pendaftar</a></li>
            <li class="breadcrumb-item active">Detail</li>
          </ol>
        </div>
      </div>
    </div>
  </div>

  <section class="content">
    <div class="container-fluid">
      <div class="card">
        <div class="card-body">
          <dl class="row">
            <dt class="col-sm-3">Nama</dt>
            <dd class="col-sm-9">{{ $pendaftar->nama }}</dd>
            <dt class="col-sm-3">NIM</dt>
            <dd class="col-sm-9">{{ $pendaftar->nim }}</dd>
            <dt class="col-sm-3">Email</dt>
            <dd class="col-sm-9">{{ $pendaftar->email }}</dd>
            <dt class="col-sm-3">Asal Kampus</dt>
            <dd class="col-sm-9">{{ $pendaftar->asal_kampus }}</dd>
            <dt class="col-sm-3">Alamat</dt>
            <dd class="col-sm-9">{{ $pendaftar->alamat }}</dd>
            <dt class="col-sm-3">Tanggal Masuk</dt>
            <dd class="col-sm-9">{{ $pendaftar->tanggal_masuk }}</dd>
            <dt class="col-sm-3">Tanggal Keluar</dt>
            <dd class="col-sm-9">{{ $pendaftar->tanggal_keluar }}</dd>
            <dt class="col-sm-3">File</dt>
            <dd class="col-sm-9">
              @if ($pendaftar->file)
                <a href="{{ asset('storage/'.$pendaftar->file) }}" target="_blank">Lihat File</a>
              @else
                -
              @endif
            </dd>
          </dl>
          <a href="{{ route('pendaftar.edit', $pendaftar->id) }}" class="btn btn-warning">Edit</a>
          <a href="{{ route('pendaftar.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
      </div>
    </div>
  </section>
</div>
@endsection


