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
        Schema::create('mealplans', function (Blueprint $table) {

            $days =  ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
            $meals = ['Breakfast', 'Lunch', 'Supper', 'Snacks'];
            $table->id();
            // request_id, Sunday,Monday,Tuesday,Wednesday,Thursday,Friday,Saturday
            
            $table->foreignId('request_id')->constrained('mealplan_requests')->onDelete('cascade');

            foreach ($days as $day) {
                foreach ($meals as $meal) {
                    $table->longText($day . '_' . $meal)->nullable();
                }
            }
            $table->foreignId('created_by')->constrained('users')->onDelete('cascade');
            $table->longText('special_instructions')->nullable();
            $table->string('status')->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mealplans');
    }
};
