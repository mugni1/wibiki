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
        Schema::create('animes', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->enum('status', ['Ongoing', 'Completed']);
            $table->string('studio', 100);
            $table->string('producer', 100);
            $table->text('description');
            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('animes');
    }
};