<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHiringRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hiring_requests', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('country');
            $table->string('applying_for');
            $table->string('birthdate');
            $table->text('question_one')->nullable();
            $table->text('question_two')->nullable();
            $table->text('question_three')->nullable();
            $table->text('question_four')->nullable();
            $table->text('question_five')->nullable();
            $table->text('question_six')->nullable();
            $table->text('question_seven')->nullable();
            $table->text('question_eight')->nullable();
            $table->text('question_nine')->nullable();
            $table->string('files_link')->nullable();
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
        Schema::dropIfExists('hiring_requests');
    }
}
