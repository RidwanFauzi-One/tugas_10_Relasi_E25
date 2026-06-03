<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Jalankan migrasi untuk membuat tabel.
     */
    public function up(): void
    {
        Schema::create('keluhans', function (Blueprint $table) {
            $table->id(); // Baris 15 di foto
            
            // Kolom isi keluhan
            $table->text('keluhan'); // Baris 16 di foto
            
            // Baris 17 di foto: Status keluhan
            $table->enum('status', [
                'sent', 
                'reviewed', 
                'on progress', 
                'rejected', 
                'approved'
            ])->default('sent');

            // Baris 18 di foto: Relasi ke tabel masyarakats
            // Gunakan nullable() karena Anda menggunakan onDelete('set null')
            $table->foreignId('masyarakat_id')
                  ->nullable()
                  ->constrained('masyarakats')
                  ->onDelete('set null');

            $table->timestamps(); // Baris 19 di foto
        });
    }

    /**
     * Batalkan migrasi (Hapus tabel).
     */
    public function down(): void
    {
        Schema::dropIfExists('keluhans');
    }
};