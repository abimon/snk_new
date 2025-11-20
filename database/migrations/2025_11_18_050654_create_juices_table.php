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
        Schema::create('juices', function (Blueprint $table) {
            $table->id();
            $table->foreignId('flavour_id')->constrained('juice_flavours')->onDelete('cascade');
            $table->decimal('price', 8, 2);
            $table->string('size');
            $table->string('image_path')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('juices');
    }
};
