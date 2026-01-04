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

        Schema::create('ticket_buyer', function (Blueprint $table) {
            $table->unsignedBigInteger('id_user')->unique();
            $table->foreign('id_user')->references('id')->on('users');
            $table->id();
            $table->unsignedBigInteger('id_ticket');
            $table->foreign('id_ticket')->references('id')->on('ticket_status');
            $table->integer('total_price');
            $table->boolean('status_acc');
            $table->string('photo_transfer');
            $table->boolean('done_check');
            $table->dateTime('check_at');
            $table->timestamp('created_at')->useCurrent();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ticket_buyer');
    }
};
