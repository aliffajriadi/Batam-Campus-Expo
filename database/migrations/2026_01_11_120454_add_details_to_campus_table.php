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
        Schema::table('campus', function (Blueprint $table) {
            $table->string('singkatan')->nullable()->after('name_campus');
            $table->string('akreditasi')->default('B')->after('singkatan');
            $table->enum('status', ['negeri', 'swasta'])->default('swasta')->after('akreditasi');
            $table->year('tahun_berdiri')->nullable()->after('status');
            $table->integer('jumlah_mahasiswa')->nullable()->after('tahun_berdiri');
            $table->json('fakultas')->nullable()->after('jumlah_mahasiswa');
            $table->string('website')->nullable()->after('fakultas');
            $table->text('deskripsi')->nullable()->after('website');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('campus', function (Blueprint $table) {
            $table->dropColumn([
                'singkatan',
                'akreditasi',
                'status',
                'tahun_berdiri',
                'jumlah_mahasiswa',
                'fakultas',
                'website',
                'deskripsi'
            ]);
        });
    }
};
