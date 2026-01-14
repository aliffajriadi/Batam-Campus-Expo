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
        Schema::table('ticket_buyer', function (Blueprint $table) {
            $table->boolean('status_acc')->nullable()->change();
        });

        Schema::table('merchandise_buyer', function (Blueprint $table) {
            $table->boolean('status_acc')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('ticket_buyer', function (Blueprint $table) {
            $table->boolean('status_acc')->nullable(false)->change();
        });

        Schema::table('merchandise_buyer', function (Blueprint $table) {
            $table->boolean('status_acc')->nullable(false)->change();
        });
    }
};
