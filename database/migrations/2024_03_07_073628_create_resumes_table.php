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
        Schema::create('resumes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('name');
            $table->string('fathers_name');
            $table->string('mothers_name');
            $table->string('dob');
            $table->string('present_address')->nullable();
            $table->string('permanent_address')->nullable();
            $table->string('blood_group')->nullable();
            $table->string('nid')->nullable();
            $table->string('passport')->nullable();
            $table->string('phone');
            $table->string('emergency_contact_no');
            $table->string('email');
            $table->text('carrer_objective')->nullable();
            $table->string('profile_picture');

            $table->string('present_salary');
            $table->string('expected_salary');
            $table->string('skills')->nullable();
            $table->string('hobbies')->nullable();

            $table->string('whatsapp')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('facebook')->nullable();
            $table->string('github')->nullable();
            $table->string('behance')->nullable();
            $table->string('portfolio_website')->nullable();

            $table->foreign('user_id')->references('id')->on('users')
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
        Schema::dropIfExists('resumes');
    }
};
