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
        Schema::create('doctors', function (Blueprint $table) {
            $table->id();
            $table->string('firstName');
            $table->string('lastName');
            $table->enum('specialty', ['Cardiology', 'Orthopedics','Pediatrics', 'Neurology', 'Oncology', 'Gynecology', 'Dermatology', 'Psychiatry', 'Ophthalmology', 'Gastroenterology', 'Pulmonology', 'Endocrinology', 'Urology', 'Rheumatology', 'Geriatrics']);
            $table->integer('floor');
            $table->enum('status', ['Available', 'On Call', 'Off Duty', 'In Surgery', 'In Rounds', 'On Vacation']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doctors');
    }
};
