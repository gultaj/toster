<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('answers', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('question_id')->unsigned()->index();
            $table->integer('user_id')->unsigned()->index();
            $table->text('body');
            $table->boolean('is_solution')->default(0);
            $table->boolean('is_published')->default(1);
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
        Schema::drop('answers');
    }
}
