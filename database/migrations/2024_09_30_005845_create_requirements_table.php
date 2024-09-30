<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requirements', function (Blueprint $table) {
            $table->boolean('pre_add_form')->default(0);  // Pre-Admission Form
            $table->boolean('psa')->default(0);           // PSA Birth Certificate
            $table->boolean('report_card')->default(0);   // High School Report Card
            $table->boolean('good_moral')->default(0);    // Good Moral Certificate
            $table->boolean('pic')->default(0);           // 2x2 Pictures
            $table->boolean('entrance_exam')->default(0); // Entrance Exam Result
            $table->boolean('enrollment_form')->default(0); // Enrollment Form
            $table->boolean('honorable_dismissal')->default(0); // Honorable Dismissal
            $table->boolean('permanent_record')->default(0);  // College Permanent Record
            $table->boolean('form_137')->default(0);          // Form-137/TOR
            $table->boolean('promissory_note')->default(0);   // Promissory Note
            $table->boolean('medical_records')->default(0);   // Medical Records
            $table->integer('student_id');
            $table->id();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('requirements');
    }
};

