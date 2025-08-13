<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Pendaftaran Mahasiswa</title>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet" />
  <style>
    * { box-sizing: border-box; }

    :root {
      --green-50: #f0fdf4;
      --green-100: #dcfce7;
      --green-200: #bbf7d0;
      --green-300: #86efac;
      --green-400: #4ade80;
      --green-500: #22c55e;
      --green-600: #16a34a;
      --green-700: #15803d;
      --green-800: #166534;
      --green-900: #14532d;
      --text-900: #0f172a;
      --text-600: #475569;
    }

    body {
      margin: 0;
      font-family: 'Roboto', sans-serif;
      background:
        radial-gradient(900px 600px at 12% -10%, rgba(34, 197, 94, 0.25), transparent 60%),
        radial-gradient(900px 600px at 90% 110%, rgba(21, 128, 61, 0.22), transparent 60%),
        linear-gradient(135deg, #064e3b, #065f46, #166534);
      display: flex;
      align-items: center;
      justify-content: center;
      min-height: 100vh;
      padding: 1.25rem;
      color: #ffffff;
    }

    .form-container {
      width: 100%;
      max-width: 560px;
      background: #ffffff;
      border-radius: 18px;
      padding: 2rem;
      border: 1px solid var(--green-100);
      box-shadow:
        0 10px 30px rgba(34, 197, 94, 0.15),
        0 2px 10px rgba(0, 0, 0, 0.04);
      position: relative;
      overflow: hidden;
      animation: floatIn 420ms ease-out;
    }

    .form-container::before {
      content: '';
      position: absolute;
      inset: -40% -20% auto auto;
      height: 200px;
      width: 200px;
      background: radial-gradient(closest-side, var(--green-200), transparent);
      opacity: 0.35;
      filter: blur(10px);
      transform: translate(30px, -30px) rotate(25deg);
      pointer-events: none;
    }

    .form-header {
      display: flex;
      align-items: center;
      gap: 0.75rem;
      margin-bottom: 1.25rem;
    }

    .form-badge {
      display: inline-flex;
      align-items: center;
      justify-content: center;
      width: 42px;
      height: 42px;
      border-radius: 12px;
      background: linear-gradient(135deg, var(--green-500), var(--green-600));
      box-shadow: 0 6px 16px rgba(22, 163, 74, 0.35);
      color: #ffffff;
      flex: none;
    }

    .form-title {
      margin: 0;
      font-size: 1.35rem;
      line-height: 1.2;
      color: var(--green-700);
      letter-spacing: 0.2px;
    }

    .form-subtitle {
      margin: 0.25rem 0 0.75rem;
      font-size: 0.95rem;
      color: var(--text-600);
    }

    .form-group { margin-bottom: 1rem; }

    label {
      display: block;
      margin-bottom: 0.45rem;
      font-weight: 600;
      color: var(--text-900);
    }

    input,
    select {
      width: 100%;
      padding: 0.75rem 0.9rem;
      font-size: 1rem;
      border: 1.2px solid var(--green-100);
      border-radius: 10px;
      background-color: #ffffff;
      transition: border-color 0.2s ease, box-shadow 0.2s ease, background-color 0.2s ease;
    }

    input::placeholder { color: #94a3b8; }

    input:focus,
    select:focus {
      border-color: var(--green-500);
      outline: none;
      background-color: #ffffff;
      box-shadow: 0 0 0 4px rgba(34, 197, 94, 0.12);
    }

    .help-text {
      display: block;
      color: var(--text-600);
      font-size: 0.82rem;
      margin-top: 0.35rem;
    }

    .btn-submit {
      width: 100%;
      padding: 0.95rem 1rem;
      background: linear-gradient(90deg, var(--green-600), var(--green-500));
      color: #fff;
      font-size: 1.05rem;
      font-weight: 700;
      border: none;
      border-radius: 10px;
      cursor: pointer;
      transition: transform 0.08s ease, box-shadow 0.2s ease, background 0.3s ease;
      box-shadow: 0 10px 20px rgba(22, 163, 74, 0.25);
      letter-spacing: 0.2px;
    }

    .btn-submit:hover { box-shadow: 0 12px 24px rgba(22, 163, 74, 0.32); }
    .btn-submit:active { transform: translateY(1px); }

    @keyframes floatIn {
      from { transform: translateY(6px); opacity: 0; }
      to { transform: translateY(0); opacity: 1; }
    }
  </style>
</head>
<body>
  <div class="form-container">
    <div class="form-header">
      <div class="form-badge" aria-hidden="true">
        <!-- simple leaf icon -->
        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" role="img">
          <path d="M5 19c7 0 13-6 13-13 3 3 3 10-1 14s-11 4-14 1c0 0 2-2 2-2z" fill="currentColor"/>
        </svg>
      </div>
      <div>
        <h2 class="form-title">Pendaftaran Mahasiswa</h2>
        <p class="form-subtitle">Silakan lengkapi data berikut untuk registrasi.</p>
      </div>
    </div>
    {{-- Changed action to point to the 'mahasiswa.store' route --}}
    <form action="{{ route('mahasiswa.store') }}" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="form-group">
        <label for="nama">Nama Lengkap</label>
        <input type="text" id="nama" name="nama" placeholder="Masukkan nama lengkap" required />
      </div>

      <div class="form-group">
        <label for="nim">NIM</label>
        <input type="text" id="nim" name="nim" placeholder="Masukkan NIM" required />
      </div>

      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" placeholder="Contoh: email@domain.com" />
      </div>

      <div class="form-group">
        <label for="alamat">Alamat</label>
        <input type="text" id="alamat" name="alamat" placeholder="Masukkan alamat" />
      </div>

      <div class="form-group">
        <label for="asal_kampus">Asal Kampus</label>
        <input type="text" id="asal_kampus" name="asal_kampus" placeholder="Contoh: Universitas ABC" />
      </div>

      <div class="form-group">
        <label for="tanggal_masuk">Tanggal Masuk</label>
        <input type="date" id="tanggal_masuk" name="tanggal_masuk" />
      </div>

      <div class="form-group">
        <label for="tanggal_keluar">Tanggal Keluar</label>
        <input type="date" id="tanggal_keluar" name="tanggal_keluar" />
      </div>

      <div class="form-group">
        <label for="file">Surat Izin Magang</label>
        <input type="file" id="file" name="file" accept=".pdf,.jpg,.jpeg,.png,.doc,.docx" />
        <small class="help-text">Format diperbolehkan: PDF, JPG, JPEG, PNG, DOC, DOCX</small>
      </div>

      <button type="submit" class="btn-submit">Simpan Data</button>
    </form>
  </div>
</body>
</html>
