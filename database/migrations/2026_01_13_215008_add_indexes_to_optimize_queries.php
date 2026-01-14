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
            $table->index('name_campus');
            $table->index('singkatan');
            $table->index('status');
        });

        Schema::table('posts', function (Blueprint $table) {
            $table->index('created_at');
        });

        Schema::table('merchandise_product', function (Blueprint $table) {
            $table->index('price');
        });

        Schema::table('kegiatan', function (Blueprint $table) {
            $table->index('order');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('campus', function (Blueprint $table) {
            $table->dropIndex(['name_campus']);
            $table->dropIndex(['singkatan']);
            $table->dropIndex(['status']);
        });

        Schema::table('posts', function (Blueprint $table) {
            $table->dropIndex(['created_at']);
        });

        Schema::table('merchandise_product', function (Blueprint $table) {
            $table->dropIndex(['price']);
        });

        Schema::table('kegiatan', function (Blueprint $table) {
            $table->dropIndex(['order']);
        });
    }
};
