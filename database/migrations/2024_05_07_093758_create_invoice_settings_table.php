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
        if(!Schema::hasTable('invoice_settings')) Schema::create('invoice_settings', function (Blueprint $table) {
            $table->id();
            $table->string('prefix_id')->nullable();
            $table->integer('initial_count')->nullable();
            $table->string('thanks_message')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoice_settings');
    }
};
