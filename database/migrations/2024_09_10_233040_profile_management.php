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
        Schema::create('profile_management', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Foreign key for the user
            $table->string('type'); // 'qualification' or 'employment_history'

            // Fields for qualifications
            $table->string('degree')->nullable();
            $table->string('institution')->nullable();
            $table->integer('graduation_year')->nullable();
            $table->string('grade')->nullable();

            // Fields for employment history
            $table->string('job_title')->nullable();
            $table->string('company')->nullable();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->text('responsibilities')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
