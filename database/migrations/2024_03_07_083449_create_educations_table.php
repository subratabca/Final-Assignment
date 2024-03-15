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
        Schema::create('educations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('resume_id');
            $table->string('degree')->nullable();
            $table->string('institute')->nullable();
            $table->string('department')->nullable();
            $table->string('passing_year')->nullable();
            $table->string('result')->nullable();

            $table->foreign('resume_id')->references('id')->on('resumes')
                ->restrictOnDelete()->cascadeOnUpdate();
                
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('educations');
    }
};
