<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user_type');
            $table->string('student_code');
            $table->string('parent_code');
            $table->string('student_name');
            $table->string('student_class');
            $table->string('student_division');
            $table->string('student_parent');
            $table->string('mobile');
            $table->string('whatsapp');
            $table->string('card_no');
//            $table->string('student_id')->unique();
            $table->string('balance');
            $table->string('added_by')->nullable();
            $table->string('email');
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
            $table->timestamp('first_payment')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
}
