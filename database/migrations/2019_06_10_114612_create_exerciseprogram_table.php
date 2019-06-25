<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExerciseprogramTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exerciseprogram', function (Blueprint $table) {
            $table->bigIncrements('exerciseprogramid');
                $table->integer('memberid')->references('id')->on('member');
                $table->integer('baseball')->default('0');
                $table->integer('boxing')->default('0');
                $table->integer('kickboxing')->default('0');
                $table->integer('skiing')->default('0');
                $table->integer('football')->default('0');
                $table->integer('golf')->default('0');
                $table->integer('hiking')->default('0');
                $table->integer('pilates')->default('0');
                $table->integer('racquetball')->default('0');
                $table->integer('indoorcycling')->default('0');
                $table->integer('kayaking')->default('0');
                $table->integer('rockclimbing')->default('0');
                $table->integer('running')->default('0');
                $table->integer('soccer')->default('0');
                $table->integer('swimming')->default('0');
                $table->integer('tennis')->default('0');
                $table->integer('triathlon')->default('0');
                $table->integer('walking')->default('0');
                $table->integer('weighttrainning')->default('0');
                $table->integer('yoga')->default('0');
                $table->integer('stretching')->default('0');
                $table->string('other')->default('0');
                $table->string('otheractivity')->default('0');
                $table->integer('oftenweekexercise')->null();
                $table->integer('highpriority')->default('0');
                $table->integer('mediumpriority')->default('0');
                $table->integer('lowpriority')->default('0');
                $table->integer('very')->default('0');
                $table->integer('semi')->default('0');
                $table->integer('barely')->default('0');
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
        Schema::dropIfExists('exerciseprogram');
    }
}
