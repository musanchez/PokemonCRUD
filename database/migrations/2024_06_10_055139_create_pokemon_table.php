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
        Schema::create('pokemon', function (Blueprint $table) {
            $table->integer('pokemon_id')->primary();
            $table->smallInteger('generation');
            $table->string('entry');
            $table->string('name')->unique();
            $table->string('type1');
            $table->string('type2')->nullable();
            $table->string('url_image');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pokemon');
    }
};
