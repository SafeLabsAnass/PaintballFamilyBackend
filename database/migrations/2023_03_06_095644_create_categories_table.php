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
        if (!Schema::hasTable('categoriesd_jobs')) {Schema::create('categories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->comment('image');
            $table->string('name');
            $table->timestamps();
        });
    }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('categories', function (Blueprint $table) {
            $table->dropForeign('user_id');
        });
        Schema::dropIfExists('categories');
    }
};
