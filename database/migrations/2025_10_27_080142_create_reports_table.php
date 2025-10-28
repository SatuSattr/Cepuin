<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Jalankan migrasinya.
     */
    public function up(): void
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->string('reported_name');
            $table->string('reported_class');
            $table->dateTime('incident_time');
            $table->string('description');
            $table->string('photo_path')->nullable();
            $table->enum('status', ['dilaporkan', 'direview', 'diproses', 'selesai'])->default('dilaporkan');
            $table->string('counselor_note')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Rollback migrasi (hapus tabel).
     */
    public function down(): void
    {
        Schema::dropIfExists('reports');
    }
};
