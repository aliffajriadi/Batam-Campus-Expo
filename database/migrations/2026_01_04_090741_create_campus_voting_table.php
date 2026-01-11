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
        Schema::disableForeignKeyConstraints();

        Schema::create('campus_voting', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_campus');
            $table->foreign('id_campus')->references('id')->on('campus');
            $table->unsignedBigInteger('id_user');
            $table->foreign('id_user')->references('id')->on('users');
            $table->timestamp('created_at')->useCurrent();

            $table->unique(['id_user', 'id_campus']);
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('campus_voting');
    }
};
