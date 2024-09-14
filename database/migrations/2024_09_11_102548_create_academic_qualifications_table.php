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
        Schema::create('academic_qualifications', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->unsignedBigInteger('user_id'); // Foreign key to users table
            $table->string('degree'); // Degree name
            $table->string('institution'); // Educational institution
            $table->year('graduation_year'); // Year of graduation
            $table->string('grade')->nullable(); // Grade (nullable)
            $table->timestamps(); // Created_at and updated_at columns

            // Foreign key constraint with users table
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('academic_qualifications');
    }
};
