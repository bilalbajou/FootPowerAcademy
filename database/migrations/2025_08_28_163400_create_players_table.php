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
        Schema::create('players', function (Blueprint $table) {
            // Personal Information
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('media_id')->nullable()->constrained('media')->onDelete('set null');
            $table->string('first_name');
            $table->string('last_name');
            $table->date('birthdate');
            $table->enum('gender', ['male', 'female', 'other']);
            $table->string('nationality')->nullable();
            
            // Sports Information
            $table->enum('position', [
                'GK', // Goalkeeper
                'SW', // Sweeper
                'CB', // Center Back
                'LB', // Left Back
                'RB', // Right Back
                'LWB', // Left Wing Back
                'RWB', // Right Wing Back
                'CDM', // Center Defensive Midfielder
                'CM',  // Center Midfielder
                'CAM', // Center Attacking Midfielder
                'LM',  // Left Midfielder
                'RM',  // Right Midfielder
                'LW',  // Left Winger
                'RW',  // Right Winger
                'CF',  // Center Forward
                'ST'   // Striker
            ])->nullable();
            
            $table->enum('preferred_foot', ['left', 'right', 'both'])->nullable();
            $table->unsignedTinyInteger('shirt_number')->nullable();
            $table->date('joined_at')->nullable();
            
            // Physical Characteristics
            $table->unsignedSmallInteger('height')->nullable()->comment('Height in cm');
            $table->decimal('weight', 5, 2)->nullable()->comment('Weight in kg');
            $table->string('blood_type', 5)->nullable();
            
            // Performance Statistics
            $table->unsignedInteger('goals')->default(0);
            $table->unsignedInteger('assists')->default(0);
            $table->unsignedInteger('matches_played')->default(0);
            $table->boolean('is_injured')->default(false);
            
            // Academic/Administrative Information
            $table->string('school_name')->nullable();
            $table->string('address')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            
            // Medical Information
            $table->text('medical_notes')->nullable();
            $table->string('emergency_contact_name')->nullable();
            $table->string('emergency_contact_phone')->nullable();
            $table->text('medical_conditions')->nullable();
            $table->text('notes')->nullable();
            
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('players');
    }
};
