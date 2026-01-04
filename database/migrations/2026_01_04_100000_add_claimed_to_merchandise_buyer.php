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
        Schema::table('merchandise_buyer', function (Blueprint $table) {
            $table->boolean('claimed')->default(false)->after('status_acc');
            $table->dateTime('claimed_at')->nullable()->after('claimed');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('merchandise_buyer', function (Blueprint $table) {
            $table->dropColumn(['claimed', 'claimed_at']);
        });
    }
};
