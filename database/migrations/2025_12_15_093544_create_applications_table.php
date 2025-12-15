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
        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            $table->string('student_name');
            $table->date('birth_date');
            $table->enum('gender', ['male', 'female']);
            $table->string('parent_name');
            $table->string('parent_phone');
            $table->string('parent_email');
            $table->text('address');
            $table->text('medical_notes')->nullable();
            $table->enum('status', ['pending', 'approved', 'rejected', 'missing_documents'])->default('pending');
            $table->text('admin_notes')->nullable();
            $table->string('student_photo')->nullable();
            $table->string('birth_certificate')->nullable();
            $table->string('civil_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applications');
    }
};
