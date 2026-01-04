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
        // INI EVENT NYA CUMA 1 ROW UTAMA DOANG NANTI
        Schema::disableForeignKeyConstraints();

        Schema::create('event_setting', function (Blueprint $table) {
            $table->id();
            $table->string('name_event');
            $table->dateTime('start_event');
            $table->dateTime('end_event');
            $table->string('location_event');
            $table->string('no_contact');
            $table->text('google_maps')->nullable();
            $table->text('desc_event');
            $table->boolean('open_voting')->default(false);
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('event_setting');
    }
};
