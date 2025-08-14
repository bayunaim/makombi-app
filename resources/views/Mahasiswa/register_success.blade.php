<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Registrasi Berhasil!</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet" />
    <style>
        body {
            margin: 0;
            font-family: 'Roboto', sans-serif;
            background: linear-gradient(135deg, #064e3b, #065f46, #166534);
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            padding: 1rem;
            text-align: center;
            color: #fff;
        }

        .success-container {
            background: #fff;
            padding: 2.5rem;
            border-radius: 16px;
            box-shadow: 0 10px 30px rgba(16, 185, 129, 0.30);
            width: 100%;
            max-width: 450px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        /* Gaya untuk kontainer Lottie */
        #lottie-animation {
            width: 120px;
            height: 120px;
            margin-bottom: 1.5rem;
        }

        .success-container h1 {
            color: #28a745; /* Warna hijau untuk sukses */
            margin-bottom: 0.5rem;
            font-size: 2.2rem;
        }

        .success-container p {
            color: #6c757d; /* Warna abu-abu untuk sub-judul */
            font-size: 1.1rem;
            margin-bottom: 2rem;
        }

        .btn-back-to-form {
            display: inline-block;
            padding: 0.9rem 2rem;
            background: linear-gradient(90deg, #16a34a, #22c55e);
            color: #fff;
            font-size: 1.05rem;
            font-weight: 600;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            text-decoration: none;
            transition: background 0.3s ease;
        }

        .btn-back-to-form:hover {
            background: linear-gradient(90deg, #15803d, #16a34a);
        }
    </style>
    {{-- Memasukkan pustaka Lottie Web Player --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lottie-web/5.10.0/lottie.min.js"></script>
</head>
<body>



    <div class="success-container">
        <dotlottie-wc src="https://lottie.host/50aa8b3d-7302-4576-a123-ca51edefb3c5/2lpBRyZf7h.lottie" style="width: 300px;height: 300px" speed="1" autoplay loop></dotlottie-wc>

        <h1>Registrasi Berhasil!</h1>
        <p>{{ session('success_message', 'Data Anda telah berhasil disimpan.') }}</p> {{-- Menampilkan pesan dari sesi --}}

        <a href="{{ route('mahasiswa.create') }}" class="btn-back-to-form">Kembali ke Formulir Registrasi</a>
    </div>

    <script src="https://unpkg.com/@lottiefiles/dotlottie-wc@0.6.2/dist/dotlottie-wc.js" type="module"></script>
</body>
</html>
