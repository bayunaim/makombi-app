# Sistem Contact Form - Makombi App

## Cara Kerja Sistem

### 1. User Mengirim Pesan
- Buka halaman utama website
- Scroll ke bagian Contact
- Isi form dengan data lengkap (nama, email, subjek, pesan)
- Klik "Send Message"
- Pesan akan dikirim via AJAX ke endpoint `/contact`
- Data tersimpan di database dengan status `is_read = false`

### 2. Pesan Masuk ke Dashboard
- Admin login ke dashboard
- Dashboard akan menampilkan:
  - Widget "Pesan Kontak Baru" dengan jumlah pesan yang belum dibaca
  - Tabel "Pesan Kontak Terbaru" dengan 5 pesan terbaru
- Klik "More info" pada widget untuk ke halaman manajemen lengkap

### 3. Admin Mengelola Pesan
- **Dashboard**: Melihat ringkasan pesan baru
- **Halaman Manajemen**: Daftar semua pesan dengan pagination
- **Detail Pesan**: Lihat isi lengkap pesan
- **Mark as Read**: Otomatis saat dibuka detail
- **Delete**: Hapus pesan yang tidak diperlukan

## File yang Dimodifikasi

### Backend
- `app/Models/Contact.php` - Model Contact
- `app/Http/Controllers/ContactController.php` - Controller untuk contact
- `app/Http/Controllers/DashboardController.php` - Update untuk dashboard
- `database/migrations/2025_08_13_053456_create_contacts_table.php` - Migration tabel

### Frontend
- `resources/views/welcome.blade.php` - Form contact dengan AJAX
- `resources/views/backend/dashboard/dashboard.blade.php` - Widget dan tabel contact

### Routes
- Routes sudah ada di `routes/web.php`

## Testing

### Jalankan Seeder
```bash
php artisan db:seed --class=ContactSeeder
```

### Test Form
1. Buka halaman utama
2. Isi form contact
3. Submit dan lihat apakah masuk ke database
4. Login ke dashboard dan lihat apakah pesan muncul

## Troubleshooting

- **Form tidak submit**: Pastikan JavaScript enabled
- **Pesan tidak masuk**: Cek log Laravel dan pastikan migration sudah dijalankan
- **Dashboard error**: Pastikan semua variabel tersedia di controller

Sistem ini sederhana dan langsung - user kirim pesan dari welcome page, pesan masuk ke database, dan admin bisa lihat di dashboard!

