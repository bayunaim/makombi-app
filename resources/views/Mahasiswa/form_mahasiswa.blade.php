<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Formulir Mahasiswa</title>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet" />
  <style>
    * {
      box-sizing: border-box;
    }

    body {
      margin: 0;
      font-family: 'Roboto', sans-serif;
      background: linear-gradient(135deg, #2980f2, #6dd5fa);
      display: flex;
      align-items: center;
      justify-content: center;
      min-height: 100vh;
      padding: 1rem;
    }

    .form-container {
      background: #fff;
      padding: 2rem;
      border-radius: 16px;
      box-shadow: 0 10px 30px rgba(41, 128, 242, 0.2);
      width: 100%;
      max-width: 480px;
    }

    .form-container h2 {
      text-align: center;
      color: #2980f2;
      margin-bottom: 1.5rem;
    }

    .form-group {
      margin-bottom: 1.2rem;
    }

    label {
      display: block;
      margin-bottom: 0.5rem;
      font-weight: 500;
      color: #2c3e50;
    }

    input,
    select {
      width: 100%;
      padding: 0.75rem;
      font-size: 1rem;
      border: 1px solid #ccddee;
      border-radius: 8px;
      background-color: #f9fcff;
      transition: border 0.3s ease;
    }

    input:focus,
    select:focus {
      border-color: #2980f2;
      outline: none;
      background-color: #fff;
    }

    .btn-submit {
      width: 100%;
      padding: 0.9rem;
      background: linear-gradient(90deg, #2980f2, #6dd5fa);
      color: #fff;
      font-size: 1.05rem;
      font-weight: 600;
      border: none;
      border-radius: 8px;
      cursor: pointer;
      transition: background 0.3s ease;
    }

    .btn-submit:hover {
      background: linear-gradient(90deg, #2574d9, #4bb3e7);
    }
  </style>
</head>
<body>
  <div class="form-container">
    <h2>Formulir Mahasiswa</h2>
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
        <label for="file">Upload File (Opsional)</label>
        <input type="file" id="file" name="file" accept=".pdf,.jpg,.jpeg,.png,.doc,.docx" />
      </div>

      <button type="submit" class="btn-submit">Simpan Data</button>
    </form>
  </div>
</body>
</html>
