<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Contact;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Clear existing contacts first
        Contact::truncate();

        $contacts = [
            [
                'name' => 'John Doe',
                'email' => 'john@example.com',
                'subject' => 'Informasi Pendaftaran',
                'message' => 'Halo, saya ingin bertanya tentang proses pendaftaran mahasiswa baru. Kapan pendaftaran dibuka dan apa saja syaratnya?',
                'is_read' => false,
            ],
            [
                'name' => 'Jane Smith',
                'email' => 'jane@example.com',
                'subject' => 'Pertanyaan Biaya Kuliah',
                'message' => 'Selamat pagi, saya ingin menanyakan berapa biaya kuliah per semester dan apakah ada beasiswa yang tersedia?',
                'is_read' => false,
            ],
            [
                'name' => 'Ahmad Rahman',
                'email' => 'ahmad@example.com',
                'subject' => 'Fasilitas Kampus',
                'message' => 'Saya tertarik dengan fasilitas yang tersedia di kampus. Bisa tolong dijelaskan fasilitas apa saja yang ada?',
                'is_read' => true,
            ],
        ];

        foreach ($contacts as $contact) {
            Contact::create($contact);
        }
    }
}
