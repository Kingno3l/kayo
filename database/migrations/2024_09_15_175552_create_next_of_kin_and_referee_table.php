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
        Schema::create('next_of_kin_and_referee', function (Blueprint $table) {
            // Next of Kin fields
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('next_of_kin_full_name')->nullable();
            $table->enum('next_of_kin_relationship', ['Parent', 'Sibling', 'Spouse', 'Child', 'Friend', 'Colleague', 'Other'])->nullable();
            $table->string('next_of_kin_email')->nullable();
            $table->string('next_of_kin_phone')->nullable();
            $table->text('next_of_kin_address')->nullable();

            // Referee 1 fields
            $table->string('referee1_full_name')->nullable();
            $table->enum('referee1_relationship', ['Parent', 'Sibling', 'Spouse', 'Child', 'Friend', 'Colleague', 'Other'])->nullable();
            $table->string('referee1_email')->nullable();
            $table->string('referee1_phone')->nullable();
            $table->text('referee1_address')->nullable();

            // Referee 2 fields
            $table->string('referee2_full_name')->nullable();
            $table->enum('referee2_relationship', ['Parent', 'Sibling', 'Spouse', 'Child', 'Friend', 'Colleague', 'Other'])->nullable();
            $table->string('referee2_email')->nullable();
            $table->string('referee2_phone')->nullable();
            $table->text('referee2_address')->nullable();

            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('next_of_kin_and_referee');
    }
};
