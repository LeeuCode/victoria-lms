<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exams', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('subject_id');
            $table->bigInteger('user_id');
            $table->date('exam_date')->default(null);
            $table->string('exam_duration')->default(null);
            $table->integer('per_right_answers')->default(0);
            $table->integer('per_wrong_answers')->default(0);
            $table->string('status')->default(null);
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
        Schema::dropIfExists('exams');
    }
}
