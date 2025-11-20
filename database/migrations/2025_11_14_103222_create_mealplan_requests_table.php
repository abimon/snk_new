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
        Schema::create('mealplan_requests', function (Blueprint $table) {
            $table->id();
            // name, email, phone, restrictions,food dislikes,primary health goal, medical condition,meal included, mode, available people
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->longText('restrictions')->nullable();
            $table->longText('food_dislikes')->nullable();
            $table->longText('primary_health_goal')->nullable();
            $table->longText('medical_condition')->nullable();
            $table->longText('meal_included')->nullable();
            $table->string('contact_mode');
            $table->text('available_people');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mealplan_requests');
    }
};
