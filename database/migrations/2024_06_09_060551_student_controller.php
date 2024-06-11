<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('name');
            $table->string('middlename')->nullable();
            $table->string('lastname');
            $table->string('matric_number');
            $table->string('college_name');
            $table->string('student_dept');
            $table->string('student_level');
            $table->string('student_origin');
            $table->string('student_address');
            $table->string('student_email')->unique();
            $table->date('student_dob');
            $table->string('student_hostel');
            $table->string('student_room_num');
            $table->string('student_title');
            $table->string('student_marital_status');
            $table->string('student_clinic_card');
            $table->string('student_passport');
            $table->string('student_signature');
            $table->string('legal_document_url')->nullable(); // New column for the document URL
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
