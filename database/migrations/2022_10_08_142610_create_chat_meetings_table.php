<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChatMeetingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chat_meetings', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('country');
            $table->string('birthdate');
            $table->string('app');
            $table->text('about')->nullable();
            $table->text('goals')->nullable();
            $table->text('budget')->nullable();
            $table->text('logo-info')->nullable();
            $table->string('logo-file')->nullable();
            $table->text('more-info')->nullable();
            $table->string('more-info-files')->nullable();
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
        Schema::dropIfExists('chat_meetings');
    }
}
