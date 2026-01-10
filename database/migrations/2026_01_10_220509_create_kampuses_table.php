<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('kampuses', function (Blueprint $table) {
            $table->id();
            $table->string('nama_kampus');
            $table->string('singkatan')->nullable();
            $table->string('kota');
            $table->string('provinsi');
            $table->text('deskripsi');
            $table->string('website')->nullable();
            $table->string('logo')->nullable();
            $table->string('akreditasi')->default('B');
            $table->enum('status', ['negeri', 'swasta']);
            $table->year('tahun_berdiri')->nullable();
            $table->integer('jumlah_mahasiswa')->nullable();
            $table->json('fakultas')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kampuses');
    }
};
