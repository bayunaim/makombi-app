<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;

    protected $table = 'mahasiswa'; // Nama tabel di database
    protected $primaryKey = 'id';   // Primary key tabel
    protected $fillable = [
        'nama',
        'nim',
        'email',
        'alamat',
        'asal_kampus',
        'tanggal_masuk',
        'tanggal_keluar',
        'file',
        // tambahkan field lain sesuai kebutuhan
    ];
}