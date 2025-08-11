<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Creates the 'mahasiswa' table in the database.
        Schema::create('mahasiswa', function (Blueprint $table) {
            // Defines an auto-incrementing primary key column named 'id'.
            $table->id();
            
            // Defines a string column for the student's name.
            $table->string('nama');
            
            // Defines a unique string column for the student's ID number (NIM).
            $table->string('nim')->unique();
            
            // Defines a unique string column for the student's email.
            $table->string('email')->unique();
            
            // Defines a text column for the student's address, allowing for longer text.
            $table->text('alamat');
            
            // Defines a string column for the student's university of origin.
            $table->string('asal_kampus');
            
            // Defines a date column for the student's start date.
            $table->date('tanggal_masuk');
            
            // Defines a nullable date column for the student's end date.
            $table->date('tanggal_keluar')->nullable();
            
            // Defines a nullable string column to store a file path.
            $table->string('file')->nullable();
            
            // Adds 'created_at' and 'updated_at' timestamp columns.
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Drops the 'mahasiswa' table if it exists, to revert the migration.
        Schema::dropIfExists('mahasiswa');
    }
};