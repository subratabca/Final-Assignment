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
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('company_id');
            $table->unsignedBigInteger('category_id');
            $table->string('title');
            $table->string('vacancy')->nullable();
            $table->string('education')->nullable();
            $table->text('description')->nullable();
            $table->text('requirements')->nullable();
            $table->text('responsibility')->nullable();
            $table->text('benefits')->nullable();
            $table->text('company_description');
            $table->string('job_nature');
            $table->date('deadline');
            $table->string('skills')->nullable();
            $table->string('job_type')->nullable();
            $table->string('salary');

            $table->string('address');
            $table->string('city');
            $table->string('country');
            $table->string('zip_code');

            $table->boolean('status')->default(0);

            $table->foreign('company_id')->references('id')->on('companies')
                ->restrictOnDelete()->cascadeOnUpdate();

            $table->foreign('category_id')->references('id')->on('categories')
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
        Schema::dropIfExists('jobs');
    }
};
