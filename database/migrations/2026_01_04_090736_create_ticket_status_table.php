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
        Schema::create('ticket_status', function (Blueprint $table) {
            $table->id();
            $table->integer('price')->default(0);
            $table->enum('status', ["open","pending","close"])->default("open");
            $table->integer('kuota_ticket')->default(0);
            $table->decimal('discount')->default(0);
            $table->integer('sold_ticket')->default(0);
            $table->dateTime('auto_close_ticket_at')->nullable();
            $table->timestamp('created_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ticket_status');
    }
};
